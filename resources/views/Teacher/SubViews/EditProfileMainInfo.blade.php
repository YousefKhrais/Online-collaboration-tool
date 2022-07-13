
    <!-- card 1  -->
    <div class="card col-6 ">

        <div class="card-header row justify-content-center" id="mainInfoHeader">
            <div class="card-title col-auto " id="mainInfoTitle">
                Main Information
            </div>

        </div>

        <form class="card-body">

            <div class="form-group">
                <label for="name"> Name</label>
                <input type="text"  :value="teacher.name" id="name" class="form-control" placeholder="Enter Your Name">
            </div>

            <div class="form-group" >
                <label for="email">E-Mail</label>
                <input type="text" :value="teacher.email" id="email" class="form-control" placeholder="Enter Your Name">
            </div>

            <div class="form-group" >
                <label for="message">Message</label>
                <textarea  id="message" class="form-control" placeholder="Message Here">@{{ teacher.description }}</textarea>
            </div>

            <div class="form-group" >
                <label for="phone">Phone</label>
                <input type="phone"   :value="teacher.phone" id="phone" class="form-control" placeholder="Phone Here"/>
            </div>

            <div class="form-group" >
                <label for="mobile">Mobile</label>
                <input type="phone"   :value="teacher.mobile" id="mobile" class="form-control" placeholder="Mobile Here"/>
            </div>

        </form>

        <div class="card-footer">
            <div class="card-link">
                <button class="btn btn-primary ">Done</button>
            </div>
        </div>
    </div>


