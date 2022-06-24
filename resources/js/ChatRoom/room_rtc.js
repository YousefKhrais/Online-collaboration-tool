
import AgoraRTC from "agora-rtc-sdk-ng";
import {expandVideoFrame,hideDisplayFrame,displayFrame,videoFrames} from "./room";
const   APP_ID="18c455e4f5e84408b1fb8758fa0c1585";
//store id in session storage
let uid = sessionStorage.getItem("uid");

if(!uid){
    uid = String(Math.floor(Math.random()*10000));
    sessionStorage.setItem("uid",uid);
}

let token = null;
let client; //
let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let roomID = document.getElementById("roomID").value;

if(!roomID){
    roomID ='main';
}

let localTracks = [];
let remoteUsers = {};

let joinRoomInit = async()=>{
    //vp8 ??
    client =   AgoraRTC.createClient({mode:"rtc" , codec:"vp8"});

    await client.join(APP_ID,roomID,token);//login and join room
    client.on("user-published",handleUserPublish);
    client.on("user-left",handleUserLeft);
    joinStream();
}

let joinStream = async()=>{

    localTracks = await  AgoraRTC.createMicrophoneAndCameraTracks({},

        {encoderConfig:{
            width:{min:640,ideal:1920,max:1920},
                height:{mix:480,ideal:1080,max:1080}
            }

        },

    );

    let player =`
       <div class="video__container" id="user-container-${uid}">
                      <div class="video-player" id="user-${uid}" >

                        </div>
        </div>
     `;

        document.getElementById("streams__container").insertAdjacentHTML("beforeend",player);
        document.getElementById(`user-container-${uid}`).addEventListener("click",expandVideoFrame);
        localTracks[1].play(`user-${uid}`);//connect tracks  video to local video stream
        await client.publish([localTracks[0],localTracks[1]]);//publish to all users [0],[1] video and audio
}

let handleUserPublish = async (user,mediaType)=>{
    remoteUsers[user.uid] = user;
    await client.subscribe(user,mediaType);
    let player =  document.getElementById(`user-container-${user.uid}`);

    if(player===null){

        player =`
               <div class="video__container" id="user-container-${user.uid}">
                              <div class="video-player" id="user-${user.uid}" >

                                </div>
                </div>
     `;
        
        document.getElementById("streams__container").insertAdjacentHTML("beforeend",player);
        document.getElementById(`user-container-${user.uid}`).addEventListener("click",expandVideoFrame);
    }

    if(displayFrame.style.display){
        let videoFrame = document.getElementById(`user-container-${user.uid}`);
        videoFrame.style.height='100px';
        videoFrame.style.width='100px';
    }

    if(mediaType==="video"){
        user.videoTrack.play(`user-${user.uid}`);
    }
    if(mediaType==="audio"){
        user.audioTrack.play();//miss user id !!!!
    }

}

let handleUserLeft = async(user)=>{
    delete remoteUsers[user.uid];
    document.getElementById(`user-container-${user.uid}`).remove();
    if(userIDInDisplayFrame===`user-container-${user.uid}`){
        displayFrame.style.display=null;
        let videoFrames = document.getElementsByClassName(`video__container`);
        for(let i = 0; videoFrames.length>i;i++){
            videoFrames[i].style.height="300px";
            videoFrames[i].style.width="300px";
        }
    }
}

let ToggleCamera = async (e)=>{
    let button = e.currentTarget;

    if(localTracks[1].muted){
        await localTracks[1].setMuted(false);
        button.classList.add("active");
    }else{
        await localTracks[1].setMuted(true);
        button.classList.remove("active");
    }

}

let ToggleMic= async (e)=>{
    let button = e.currentTarget;

    if(localTracks[0].muted){
        await localTracks[0].setMuted(false);
        button.classList.add("active");
    }else{
        await localTracks[0].setMuted(true);
        button.classList.remove("active");
    }

}

document.getElementById("camera-btn").addEventListener("click",ToggleCamera);
document.getElementById("mic-btn").addEventListener("click",ToggleMic);
joinRoomInit();
