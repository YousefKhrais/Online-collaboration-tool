/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//
// import {Multipane,MultipaneResizer} from "vue-multipane";
// Vue.component('multi-pane', Multipane);
// Vue.component("multi-pane-resizer",MultipaneResizer);
// import  StudentLearnPane from "/components/StudentLearnPane";
const axios = require('axios').default;

const app = new Vue({
        el:"#coursesPage",
        // components:{StudentLearnPane},
        data:{
            courses:{}
        },
        mounted() {
            this.fetchCourses();
        },
        methods:{
            fetchCourses(){
                axios.get("api/courses/getCourses").then((res)=>{
                    // this.courses=res.data;
                    this.courses=res.data.courses;
                }).catch((err)=>{
                    console.log(err.message())
                });

            }

        },

    }
);
