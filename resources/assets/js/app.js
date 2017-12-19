
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue/dist/vue.js'
import books from './components/Books.vue'
import topmenu from './components/Topmenu.vue'
import topmenulogged from './components/Topmenulogged.vue'
import userdetails from './components/Userdetails.vue'
import userdashboardloginedit from './components/Userdashboardloginedit.vue'
window.Vue = Vue;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
    components: { books, topmenu, topmenulogged, userdetails, userdashboardloginedit}
});


