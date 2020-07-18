require('./bootstrap');
require('./helpers/Formattor.js');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

let success = Vue.component('success-component-pupils', require('./components/SuccessComponent.vue').default);
let listing_pupils = Vue.component('listing-component-pupils', require('./components/pupils/ListingComponent.vue').default);
let profil_pupils = Vue.component('profil-component-pupils', require('./components/pupils/ProfilComponent.vue').default);

let listing_pupils_dashboard = Vue.component('component-pupils-dashboard', require('./components/pupils/DashboardComponent.vue').default);

const routes = [
	{
		path: '/pupilsm/profil',
		component: profil_pupils
	}
]

const router = new VueRouter({routes})

new Vue({
	router: router,
	el: "#pupilsCMP",
	components: {listing_pupils},
})


window._ = require('lodash');
window.Popper = require('popper.js').default;
try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}