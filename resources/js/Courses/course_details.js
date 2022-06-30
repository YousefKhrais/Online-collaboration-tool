window.Vue = require('vue').default;

const axios = require("axios").default;

const app = new Vue({
    el:"#myApp",
    data:{
        course:{},
        course_id:1,
    },

    methods:{
        getCourseDetails(){
            axios.get("/api/courses/getCourseDetails",{params:{  course_id:this.course_id } })
                .then((res)=>{
                    this.course =res.data.course;
                    console.log(res.data.course);
                    console.log(res.data.course.name);
                })
                .catch((err)=>{
                    console.log(err.message);
                });

        }
    },

    mounted() {
        this.course_id= document.getElementById("course_id").value;
        this.getCourseDetails();
    }

});


