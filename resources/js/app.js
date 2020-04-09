import VueAwesomeSwiper from "vue-awesome-swiper";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

Vue.component('list-tournaments', require('./components/ListTournaments.vue').default);
Vue.component('search-city', require('./components/searchCity.vue').default);
Vue.component('brawl-datepicker', require('./components/brawlDatepicker.vue').default);
Vue.component('brawl-toast', require('./components/Toast.vue').default);
Vue.component('tooltip-button', require('./components/TooltipButton.vue').default);
Vue.component('tournaments-slider', require('./components/TournamentsSlider.vue').default);
Vue.component('page-dashboard', require('./pages/Dashboard.vue').default);
Vue.component('brawl-search', require('./components/SearchModal.vue').default);

Vue.component('edit-page', require('./components/tournament/Edit.vue').default);
Vue.component('tournament-settings', require('./components/tournament/edit/Settings.vue').default);
Vue.use(VueAwesomeSwiper)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

var timepickerOptions = { twelveHour: false }
var dropdownOptions = {
    constrainWidth: false,
    alignment: 'left'
}
var modalOptions = {
    onOpenEnd: function(el) {

        if ($(el).is('#search_modal')) {
            $('#searchInput').focus();
        }

    }
}
var navTooltipsOptions = {
    inDuration: 300,
    outDuration: 200,
    // margin: 0
}


$(document).ready(function () {
    $('.collapsible').collapsible();
    $('select').formSelect();
    $('.carousel').carousel();
    $('.sidenav').sidenav();
    $('.nav-tooltipped').tooltip(navTooltipsOptions);
    $('.modal').modal(modalOptions);
    $('.timepicker').timepicker(timepickerOptions);
    $('.dropdown-trigger').dropdown(dropdownOptions);
});


