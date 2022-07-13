

<!-- Tools -->
<div id="tools" >
    <!-- Color Change -->
    <div id="colorChangeDiv">
        <button id="colorChange"  class="btn waves-effect colorBtn z-depth-0 my-2"><i
                class="material-icons">color_lens</i></button>
        <input type="color" id="colorPicker" class="d-none" value="#000000">
    </div>
    <!-- Eraser -->
    <div id="clearScreenDiv">
        <button id="eraseColor" class="btn   waves-effect eraserBtn z-depth-0 my-2">
            <img width="20px" height="10px" src="data:image/jpeg;base64,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">
        </button>
    </div>

</div>

<!-- Div to Center -->
<div class="center p-20">
    <!-- Canvas -->
    <div id="outer-div">
        <canvas id="whiteboard-canvas">
            Your browser does not support the canvas element.
        </canvas>
    </div>
</div>

<!-- Channel Join Modal -->
<div id="joinChannelModal" class="modal">
    <div class="modal-content">
        <h4 class="center">Join Channel</h4>
        <label for="appid">Agora App ID</label>
        <input type="text" placeholder="Agora App ID" id="appid" />
        <label for="accountName">User Name</label>
        <input type="text" placeholder="User Name" id="accountName" />
        <label for="channelNameInput">Channel Name</label>
        <input type="text" placeholder="Channel Name" id="channelNameInput" />
    </div>
    <div class="modal-footer">
        <button id="joinChannelBtn" class="modal-close btn waves-effect">Join Channel</button>
    </div>
</div>


