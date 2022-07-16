
import AgoraRTM, {RtmClient} from "agora-rtm-sdk";

let  agoraAppId = "ac979d7c604741cb9092d472236c7a4d";
var isLoggedIn = false;

const client = AgoraRTM.createInstance(agoraAppId, { enableLogUpload: false });
let channelName =document.getElementById("roomID").value;

let accountName = String(Math.floor(Math.random()*100));

var color = "#000000";
// Set up the canvas
var canvas = document.getElementById("whiteboard-canvas");
var dpr = window.devicePixelRatio || 1;
var ctx = canvas.getContext("2d");
ctx.canvas.width = window.innerWidth * dpr;
ctx.canvas.height = window.innerHeight * dpr;
ctx.strokeStyle = color;
ctx.lineWidth = 4;
let  dataUrl = canvas.toDataURL();
let AppID = ""

function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
        x: mouseEvent.clientX - rect.left,
        y: mouseEvent.clientY - rect.top
    };
}

// Get a regular interval for drawing to the screen
window.requestAnimFrame = (function (callback) {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimaitonFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();


function renderCanvas() {
    if (drawing) {
        ctx.beginPath();
        ctx.moveTo(lastPos.x, lastPos.y);
        ctx.lineTo(mousePos.x, mousePos.y);
        ctx.stroke();
        lastPos = mousePos;
        ctx.closePath();
    }
}


(function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
})();

// Color picker
function changeColor() {
    erasing = false;
    ctx.strokeStyle = color;
    ctx.lineWidth = 4;
    document.getElementById("colorPicker").click();
    document.getElementById("colorPicker").onchange = function () {
        color = this.value;
        console.log("Color changed to: " + color);
        ctx.strokeStyle = color;
        ctx.lineWidth = 4;
    }
}

// Eraser
function startErasing() {
    color = "#FFFFFF";
    console.log("Erasing.");
    ctx.strokeStyle = "#FFFFFF";
    ctx.lineWidth = 50;
    erasing = true;
}


var drawing = false;
var erasing = false;
var x, y;
var mousePos = { x: x, y: y };
var lastPos = mousePos;
canvas.addEventListener("mousedown", function (e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
    canvas.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas, e);
    }, false);
}, false);
canvas.addEventListener("mouseup", function (e) {
    drawing = false;
}, false);


canvas.addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var mouseEvent = new MouseEvent("mousedown", {
        clientX: touch.clientX,
        clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchend", function (e) {
    var mouseEvent = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchmove", function (e) {
    var touch = e.touches[0];
    var mouseEvent = new MouseEvent("mousemove", {
        clientX: touch.clientX,
        clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
}, false);

// Get the position of a touch relative to the canvas
function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
        x: touchEvent.touches[0].clientX - rect.left,
        y: touchEvent.touches[0].clientY - rect.top
    };
}

// Prevent scrolling when touching the canvas
document.body.addEventListener("touchstart", function (e) {
    if (e.target == canvas) {
        e.preventDefault();
    }
}, false);
document.body.addEventListener("touchend", function (e) {
    if (e.target == canvas) {
        e.preventDefault();
    }
}, false);
document.body.addEventListener("touchmove", function (e) {
    if (e.target == canvas) {
        e.preventDefault();
    }
}, false);

M.AutoInit();


client.login({ uid: accountName }).then(() => {
    console.log('AgoraRTM client login success. Username: ' + accountName);
    isLoggedIn = true;

    // Channel Join
    let  channel = client.createChannel(channelName);
    channel.join().then(() => {

        canvas.addEventListener("mousedown", function () {
            // Mouse Move
            canvas.addEventListener("mousemove", function () {
                if (drawing == true) {
                    // Mouse Positions
                    var lastPosNow = { x: lastPos.x, y: lastPos.y };
                    var mousePosNow = { x: mousePos.x, y: mousePos.y };
                    // Final Message
                    var finalMsg = { lastPosNow: lastPosNow, mousePosNow: mousePosNow, drawing: drawing, color: color, erasing: erasing };
                    // console.log(finalMsg);
                    let msg = { description: 'Coordinates where drawing is taking place.', messageType: 'TEXT', rawMessage: undefined, text: JSON.stringify(finalMsg) }
                    channel.sendMessage(msg).then(() => {
                        console.log("Your message was: " + JSON.stringify(finalMsg) + " by " + accountName);
                    }).catch(error => {
                        console.log("Message wasn't sent due to an error: ", error);
                    });
                }
            });
        });

        // Receive Channel Message
        channel.on('ChannelMessage', ({ text }, senderId) => {
            console.log("The message is: " + text + " by " + senderId);
            let parsedFinalNow = JSON.parse(text);

            if (parsedFinalNow.drawing == true) {
                if (parsedFinalNow.erasing == true) {
                    console.log("Erasing for others.");
                    color = "#FFFFFF";
                    ctx.strokeStyle = "#FFFFFF";
                    ctx.lineWidth = 50;
                    ctx.beginPath();
                    ctx.moveTo(parsedFinalNow.lastPosNow.x, parsedFinalNow.lastPosNow.y);
                    ctx.lineTo(parsedFinalNow.mousePosNow.x, parsedFinalNow.mousePosNow.y);
                    ctx.stroke();
                    parsedFinalNow.lastPosNow = parsedFinalNow.mousePosNow;
                    ctx.closePath();
                }
                else {
                    console.log("Drawing for others.");
                    ctx.lineWidth = 4;
                    ctx.strokeStyle = parsedFinalNow.color;
                    ctx.beginPath();
                    ctx.moveTo(parsedFinalNow.lastPosNow.x, parsedFinalNow.lastPosNow.y);
                    ctx.lineTo(parsedFinalNow.mousePosNow.x, parsedFinalNow.mousePosNow.y);
                    ctx.stroke();
                    parsedFinalNow.lastPosNow = parsedFinalNow.mousePosNow;
                    ctx.closePath();
                }
            }
        });

    }).catch(error => {
        console.log('AgoraRTM client channel join failed: ', error);
    }).catch(err => {
        console.log('AgoraRTM client login failure: ', err);
    });
});

document.getElementById("colorChange").addEventListener("click",changeColor);
document.getElementById("eraseColor").addEventListener("click",startErasing);

export {changeColor , startErasing}
