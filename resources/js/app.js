/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import StarRating from 'vue-star-rating'

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('covid-chat', require('./components/CovidChat.vue').default);
Vue.component('star-rating', StarRating);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    methods: {
        setRating(element, value) {
            $('#' + element).val(value);
        },
        toggleSidebar() {
            if(document.getElementById("mobileSidebar").style.width == "0px") {
                document.getElementById("mobileSidebar").style.width = "100%";
                document.getElementById("main").style.display = "none";
            } else {
                document.getElementById("mobileSidebar").style.width = "0px";
                document.getElementById("main").style.display = "block";
            }
          

        },
        closeNav() {
            document.getElementById("mobileSidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
          }
    }
});
