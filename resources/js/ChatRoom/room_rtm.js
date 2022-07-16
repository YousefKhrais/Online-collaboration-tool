import {Members} from "pusher-js";
import {getChannel , getRTMClient , getUserID} from "./room_rtc"

let handleMemberJoined = async(MemberID)=>{
    console.log("new member joined with id " + MemberID);
    addMembertoDom(MemberID);
    let members = getChannel().getMembers();
    updateMemberTotal(members);

}
let name = document.getElementById("name").value;

let addMembertoDom = async (MemberID)=>{
    let {name} = await getRTMClient().getUserAttributesByKeys(MemberID,["name"]);

     let member=`
             <div class="member__wrapper" id="member__${MemberID}__wrapper">
                 <span class="green__icon"></span>
                 <p class="member_name">${name}</p>
             </div>
    `;

     document.getElementById("member__list").insertAdjacentHTML("beforeend",member);

}

let handelMemberLeft = async (MemberID)=>{
    console.log("new member joined with id " + MemberID);

    removeMemberFromDom(MemberID);

    let members = getChannel().getMembers();
    await updateMemberTotal(members);
}

let removeMemberFromDom = async (MemberID)=>{
    let memberWrapper = document.getElementById(`member__${MemberID}__wrapper`);
    memberWrapper.remove();

}

let leaveChannel = async ()=>{
    await getChannel().leave();
    await getRTMClient().logout();
}

let getMembers = async ()=>{

    console.log("run get memebers");
    let members = await getChannel().getMembers();
    updateMemberTotal(members);

    for(let i =0; i<members.length;i++){
        addMembertoDom(members[i]);
    }
}

let updateMemberTotal = async(members)=>{
    let count = members.length;
    document.getElementById("members__count").innerText = count;
}

let sendMessage = async(e)=>{
    e.preventDefault();
    console.log("send message ");

    // let {displayName} = await getRTMClient().getUserAttributesByKeys(getRTMClient().uid,["name"]);
    let displayName = name;
    console.log("display name is " , displayName);
    console.log("uid is " , getUserID());

    let message = e.target.message.value;

    getChannel().sendMessage({
        text:JSON.stringify({    'type':'chat',
            'message':message,
            'displayName':displayName
        })
    });

    console.log("message sended ");
    addMessageToDoms(displayName,message);

    e.target.reset();
}


let handleChannelMessage = async (messageData , memberID)=>{
    console.log("a new message recieved  ");
    let data = JSON.parse(messageData.text);
    if(data.type ==='chat'){
        addMessageToDoms(data.displayName,data.message)
    }

}

let addMessageToDoms = (name,message)=>{
    let messageWrapper = document.getElementById("messages");
    let new_message = `
               <div class="message__wrapper">
            <div class="message__body__bot">
                <strong class="message__author__bot">${name}</strong>
                <p class="message__text__bot">${message}</p>
            </div>
        </div>
    `;
    messageWrapper.insertAdjacentHTML("beforeend",new_message);
    let lastMessage = document.querySelector("#messages .message__wrapper:last-child");
    if(lastMessage){
        lastMessage.scrollIntoView();
    }

}

let messageForm = document.getElementById("message__form");
messageForm.addEventListener("submit",sendMessage);

export {
    handleMemberJoined
    ,handelMemberLeft
    ,leaveChannel
    ,getMembers
    ,handleChannelMessage
}
