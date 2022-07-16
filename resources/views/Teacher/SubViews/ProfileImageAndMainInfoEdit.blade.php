<div class="card col-4 " style="padding:0px">

    <div class="card-body row justify-content-center" style="padding: 0px">
        <div class="card-img col-8">
            <img :src="teacher.profile_image" style="width: 100%; height:300px; padding: 0px" >

            <div class="card-link row justify-content-center mt-2">
                <input  type="submit"   value="Change" class="btn btn-primary col-3 ">
            </div>

        </div>

{{--        <div class="text text-center text-secondary h4">or</div>--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="form-group col-10">--}}
{{--                <label for="profile_image">--}}
{{--                    Image Url--}}
{{--                </label>--}}
{{--                <input type="url" class="form-control">--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

    <div class="card-footer">
        <div class="card-body p-0" >
            <div class="card-link row justify-content-center">
                <button class="btn btn-primary col-3"> Save</button>
            </div>
        </div>
    </div>

</div>
