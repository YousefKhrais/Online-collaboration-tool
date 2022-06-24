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
p
//
// import {Multipane,MultipaneResizer} from "vue-multipane";
// Vue.component('multi-pane', Multipane);
// Vue.component("multi-pane-resizer",MultipaneResizer);
// import  StudentLearnPane from "/components/StudentLearnPane";

const app3 = new Vue({
        el:"#session",
    // components:{StudentLearnPane},
        data:{

        },
        mounted() {
            console.log("start Learn session ");
        },
    }
);
