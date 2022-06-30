window.Vue = require("vue").default;

const axios = require("axios").default;


const app = new Vue({
    el:"#profile",
    data: {
        student: {},
        socialMedia:{},
        student_id:null,
    },
    methods:{
        async fetchStudent(){

            axios.get("/api/student/fetchStudent",{params:{student_id:this.student_id}})
                .then((res)=>{
                    console.log("recieved student object");
                    console.log(res.data.student);
                    this.student = res.data.student;
                })
                .catch((err)=>{console.log(err.messageerror)});
        },

         async fetchStudentSocialMedia(){
           axios.get("/api/student/fetchStudentSocialMedia",{params:{student_id:this.student_id}})
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
        this.student_id = document.getElementById("student_id").value;
        this.fetchStudent();
        this.fetchStudentSocialMedia()
    }

});

