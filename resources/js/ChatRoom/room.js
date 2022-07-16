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

let displayFrame = document.getElementById("stream__box");//main stream box
let videoFrames = document.getElementsByClassName("video__container");//video containers inside #streams__container
let userIDInDisplayFrame = null;

let expandVideoFrame = (e)=>{
  //video-container in the main box
  let child = displayFrame.children[0];
  //add to the streams-container if exist
  if(child){
    document.getElementById(`streams__container`).appendChild(child);
  }
  //change style  and add new container(e.currentTarget) to main box
  displayFrame.style.display = 'block';
  displayFrame.appendChild(e.currentTarget);


  //
  userIDInDisplayFrame = e.currentTarget.id;

  //add all videoFrames(containers) to streams--container except the frame in the mainBox(stream--box)
  for(let i =0; videoFrames.length>i;i++){
    if(videoFrames[i].id !== userIDInDisplayFrame){
      videoFrames[i].style.height = "100px";
      videoFrames[i].style.width = "100px";
    }

  }

}

let hideDisplayFrame= ()=>{
  userIDInDisplayFrame = null;
  displayFrame.style.display = null;
  let child = displayFrame.children[0];

  document.getElementById(`streams__container`).appendChild(child);
  for(let i = 0; videoFrames.length>i;i++){
    videoFrames[i].style.height="300px";
    videoFrames[i].style.width="300px";
  }

}

for(let i =0; videoFrames.length>i;i++){
    videoFrames[i].addEventListener('click',expandVideoFrame);
}

let setUserID_Display_Frame=(value)=>{
    userIDInDisplayFrame=value;
}

let getUserID_Display_frame=()=>{
    return userIDInDisplayFrame;
}
displayFrame.addEventListener("click",hideDisplayFrame);


export {expandVideoFrame,hideDisplayFrame,displayFrame,videoFrames
    ,setUserID_Display_Frame,getUserID_Display_frame};
