/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/ChatRoom/room.js ***!
  \***************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "displayFrame": () => (/* binding */ displayFrame),
/* harmony export */   "expandVideoFrame": () => (/* binding */ expandVideoFrame),
/* harmony export */   "getUserID_Display_frame": () => (/* binding */ getUserID_Display_frame),
/* harmony export */   "hideDisplayFrame": () => (/* binding */ hideDisplayFrame),
/* harmony export */   "setUserID_Display_Frame": () => (/* binding */ setUserID_Display_Frame),
/* harmony export */   "videoFrames": () => (/* binding */ videoFrames)
/* harmony export */ });
// let messagesContainer = document.getElementById('messages');
// messagesContainer.scrollTop = messagesContainer.scrollHeight;
// const memberContainer = document.getElementById('members__container');
// const memberButton = document.getElementById('members__button');
// const chatContainer = document.getElementById('messages__container');
// const chatButton = document.getElementById('chat__button');
// let activeMemberContainer = false;
// memberButton.addEventListener('click', () => {
//   if (activeMemberContainer) {
//     memberContainer.style.display = 'none';
//   } else {
//     memberContainer.style.display = 'block';
//   }
//   activeMemberContainer = !activeMemberContainer;
// });
// let activeChatContainer = false;
// chatButton.addEventListener('click', () => {
//   if (activeChatContainer) {
//     chatContainer.style.display = 'none';
//   } else {
//     chatContainer.style.display = 'block';
//   }
//   activeChatContainer = !activeChatContainer;
// });
var displayFrame = document.getElementById("stream__box"); //main stream box

var videoFrames = document.getElementsByClassName("video__container"); //video containers inside #streams__container

var userIDInDisplayFrame = null;

var expandVideoFrame = function expandVideoFrame(e) {
  //video-container in the main box
  var child = displayFrame.children[0]; //add to the streams-container if exist

  if (child) {
    document.getElementById("streams__container").appendChild(child);
  } //change style  and add new container(e.currentTarget) to main box


  displayFrame.style.display = 'block';
  displayFrame.appendChild(e.currentTarget); //

  userIDInDisplayFrame = e.currentTarget.id; //add all videoFrames(containers) to streams--container except the frame in the mainBox(stream--box)

  for (var i = 0; videoFrames.length > i; i++) {
    if (videoFrames[i].id !== userIDInDisplayFrame) {
      videoFrames[i].style.height = "100px";
      videoFrames[i].style.width = "100px";
    }
  }
};

var hideDisplayFrame = function hideDisplayFrame() {
  userIDInDisplayFrame = null;
  displayFrame.style.display = null;
  var child = displayFrame.children[0];
  document.getElementById("streams__container").appendChild(child);

  for (var i = 0; videoFrames.length > i; i++) {
    videoFrames[i].style.height = "300px";
    videoFrames[i].style.width = "300px";
  }
};

for (var i = 0; videoFrames.length > i; i++) {
  videoFrames[i].addEventListener('click', expandVideoFrame);
}

var setUserID_Display_Frame = function setUserID_Display_Frame(value) {
  userIDInDisplayFrame = value;
};

var getUserID_Display_frame = function getUserID_Display_frame() {
  return userIDInDisplayFrame;
};

displayFrame.addEventListener("click", hideDisplayFrame);

/******/ })()
;