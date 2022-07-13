window.Vue = require("vue").default;

const axios = require("axios").default;

const app = new Vue({
    el:"#editProfileMainSection",
    data: {
        teacher: {},
        socialMedia:{},
        teacher_id:null,
    },
    methods:{
        async fetchTeacher(){
            axios.get("/api/teacher/fetchTeacher",{params:{teacher_id:this.teacher_id}})
                .then((res)=>{
                    console.log("recieved teacher object");
                    console.log(res.data.teacher);
                    this.teacher = res.data.teacher;
                })
                .catch((err)=>{console.log(err.messageerror)});
        },

        async fetchTeacherSocialMedia(){
            axios.get("/api/teacher/fetchTeacherSocialMedia",{params:{teacher_id:this.teacher_id}})
                .then((res)=>{
                    console.log("recieved social media object ");
                    console.log(res.data.social_media);
                    this.socialMedia = res.data.social_media;

                })
                .catch((err)=>{
                    console.log(err.messageerror);
                })
        }

    }
    ,
    mounted() {
        this.teacher_id = document.getElementById("teacher_id").value;
        this.fetchTeacher();
        this.fetchTeacherSocialMedia();
    }

});

