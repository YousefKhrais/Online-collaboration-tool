<div class="col-md-4">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center experience">
            <span>Edit Experience</span>
            <span class="border px-3 p-1 add-experience">
                <i class="fa fa-plus"></i>&nbsp;Experience
            </span>
        </div>

        <div class="d-flex flex-row mt-3 exp-container" v-if="socialMedia.Facebook">
            <img src="data:image/jpeg;base64,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" width="45" height="45">
            <div class="work-experience ml-1 col-6">
                <span class="font-weight-bold d-block">Facebook</span>
                <span class="d-block text-black-50 labels">@{{teacher.name}}</span>
                <span class="d-block text-black-50 labels">
                            <a :href="socialMedia.Facebook">
                                Visit
                            </a>
                        </span>
            </div>
        </div>

        <hr>

        <div class="d-flex flex-row mt-3 exp-container" v-if="socialMedia.Instagram">
            <img src="data:image/jpeg;base64,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" width="45" height="45">
            <div class="work-experience ml-1">
                <span class="font-weight-bold d-block">Instagram</span>
                <span class="d-block text-black-50 labels">@{{teacher.name}}</span>
                <span class="d-block text-black-50 labels">
                            <a :href="socialMedia.Instagram">
                                Visit
                            </a>
                        </span>
            </div>
        </div>

        <hr>

        <div class="d-flex flex-row mt-3 exp-container" v-if="socialMedia.Twitter">
            <img src="data:image/png;base64,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" width="45" height="45">
            <div class="work-experience ml-1">
                <span class="font-weight-bold d-block">
                    Twitter
                </span>
                <span class="d-block text-black-50 labels">
                    @{{teacher.name}}
                </span>
                <span class="d-block text-black-50 labels">
                            <a :href="socialMedia.Twitter">
                                Visit
                            </a>
                </span>
            </div>
        </div>

        <hr>
        <div class="d-flex flex-row mt-3 exp-container" v-if="socialMedia.LinkedIn">
            <img src="data:image/jpeg;base64,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" width="45" height="45">
            <div class="work-experience ml-1">
                <span class="font-weight-bold d-block">Linkedin</span>
                <span class="d-block text-black-50 labels">@{{teacher.name}}</span>
                <span class="d-block text-black-50 labels">
                            <a :href="socialMedia.LinkedIn">
                                Visit
                            </a>
                        </span>
            </div>
        </div>

    </div>

</div>
