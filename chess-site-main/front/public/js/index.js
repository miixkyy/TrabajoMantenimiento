
let gameHasStarted = false;
var board = null
var game = new Chess()
var $status = $('#status')
var $pgn = $('#pgn')
let gameOver = false;
// Define un conjunto de símbolos de ajedrez
const chessSymbols = ['♚', '♛', '♜', '♝', '♞', '♟', '♙', '♘', '♗', '♖', '♕', '♔'];
// Variable para rastrear el índice actual del símbolo de ajedrez
let currentChessSymbolIndex = 0;

function onDragStart (source, piece, position, orientation) {
    // do not pick up pieces if the game is over
    if (game.game_over()) return false
    if (!gameHasStarted) return false;
    if (gameOver) return false;

    if ((playerColor === 'black' && piece.search(/^w/) !== -1) || (playerColor === 'white' && piece.search(/^b/) !== -1)) {
        return false;
    }

    // only pick up pieces for the side to move
    if ((game.turn() === 'w' && piece.search(/^b/) !== -1) || (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
        return false
    }
}

function onDrop (source, target) {
    let theMove = {
        from: source,
        to: target,
        promotion: 'q' // NOTE: always promote to a queen for simplicity
    };
    // see if the move is legal
    var move = game.move(theMove);


    // illegal move
    if (move === null) return 'snapback'

    socket.emit('move', theMove);

    updateStatus()
}

socket.on('newMove', function(move) {
    game.move(move);
    board.position(game.fen());
    updateStatus();
});

// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd () {
    board.position(game.fen())
}

function updateStatus () {
    var status = ''

    var moveColor = 'White'
    if (game.turn() === 'b') {
        moveColor = 'Black'
    }

    // checkmate?
    if (game.in_checkmate()) {
        status = 'Juego terminado, ' + moveColor + ' esta en jaque mate'
    }

    // draw?
    else if (game.in_draw()) {
        status = 'Empate'
    }

    else if (gameOver) {
        status = 'Tu oponente se ha desconectado, tu ganas!'
    }

    else if (!gameHasStarted) {
        status = 'Esperando a un jugador '

        // ESTO ES PARA Q EL SIMBOLO DEL AJEDREZ SE MUEVA
        function startChangingChessSymbol() {
            const chessSymbolElement = document.getElementById('chessSymbol');
            
            setInterval(() => {
                chessSymbolElement.textContent = getNextChessSymbol();
            }, 900); // Cambia el símbolo cada segundo (ajusta según tus preferencias)
        }
        
        // Función para obtener el próximo símbolo de ajedrez y actualizar el índice
        function getNextChessSymbol() {
            const currentSymbol = chessSymbols[currentChessSymbolIndex];
            currentChessSymbolIndex = (currentChessSymbolIndex + 1) % chessSymbols.length;
            return currentSymbol;
        }
        
        // Llama a la función para comenzar la animación
        startChangingChessSymbol();
    }

    // game still on
    else {
        status = moveColor + ' to move'

        // check?
        if (game.in_check()) {
            status += ', ' + moveColor + ' is in check'
        }
        
    }

    $status.html(status)
    $pgn.html(game.pgn())
}

var config = {
    draggable: true,
    position: 'start',
    onDragStart: onDragStart,
    onDrop: onDrop,
    onSnapEnd: onSnapEnd,
    pieceTheme: '/public/img/chesspieces/wikipedia/{piece}.png'
}
board = Chessboard('myBoard', config)
if (playerColor == 'black') {
    board.flip();
}

updateStatus()

var urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('code')) {
    socket.emit('joinGame', {
        code: urlParams.get('code')
    });
}

socket.on('startGame', function() {
    gameHasStarted = true;
    updateStatus()
});

socket.on('gameOverDisconnect', function() {
    gameOver = true;
    updateStatus()
});