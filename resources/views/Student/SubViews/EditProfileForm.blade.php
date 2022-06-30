<form class="col-md-5 border-right" enctype="multipart/form-data" method="post"
      action="{{route("updateStudent")}}">

    @csrf
    <input type="hidden" name="student_id" value="student_id"/>

    <div class="p-3 py-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="text-right">Edit your profile</h6>
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <label class="labels">Name</label>
                <input type="text"  name="name" class="form-control" placeholder="Your Name" :value="student.name">
            </div>
            <div class="col-md-6">
                <label class="labels">E-Mail</label>
                <input type="email" name="email" class="form-control" :value="student.email" placeholder="Phone">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <label class="labels">Mobile</label>
                <input type="phone" name="mobile" class="form-control" placeholder="Mobile" :value="student.mobile">
            </div>

            <div class="col-md-12">
                <label class="labels">Phone</label>
                <input type="phone" name="phone" class="form-control" placeholder="Phone" :value="student.phone">
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <label class="labels">
                    Image
                </label>
                <input type="file" name="image" class="form-control" placeholder="country" value="USA">
            </div>
        </div>

        <div class="mt-5 text-center">
            <button class="btn btn-primary profile-button" type="submit">Update Profile</button>
        </div>
    </div>

</form>
