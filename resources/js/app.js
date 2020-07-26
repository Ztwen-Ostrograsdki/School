require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import store from './stores/store.js'
Vue.use(VueRouter)
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//ERRORS COMPONENTS
let error404 = Vue.component('error404', require('./components/errors/Errors404Component.vue').default)
let error419 = Vue.component('error419', require('./components/errors/Errors419Component.vue').default)


//ADMINS COMPONENTS
let admin_sidebar = Vue.component('admin-sidebar', require('./components/admin/SidebarComponent.vue').default)
let admin_menu = Vue.component('admin-menu', require('./components/admin/AsideMenuComponent.vue').default)
let admin_defaultDashboard = Vue.component('admin-dashboard-default', require('./components/admin/HomeDashboardComponent.vue').default)

//PUPILS COMPONENTS
let pupils_home = Vue.component('pupils-home', require('./components/pupils/HomeComponent.vue').default)
let listing_pupils = Vue.component('listing-component-pupils', require('./components/pupils/ListingComponent.vue').default)
let pupils_redList = Vue.component('pupils-redList', require('./components/pupils/RedListComponent.vue').default)

let pupils_profil = Vue.component('profil-component-pupils', require('./components/pupils/ProfilComponent.vue').default)
let pupils_profil_main = Vue.component('pupil-profil-main', require('./components/pupils/layouts/MainProfilComponent.vue').default)
let pupils_perso_data = Vue.component('pupil-perso-data', require('./components/pupils/layouts/PersonalBoxComponent.vue').default)
let pupils_parents_data = Vue.component('pupil-parents-data', require('./components/pupils/layouts/ParentalBoxComponent.vue').default)
let pupils_marks_data = Vue.component('pupil-marks-data', require('./components/pupils/layouts/MarksBoxComponent.vue').default)
let pupils_profil_box = Vue.component('profil-pupil-box', require('./components/pupils/layouts/ProfilBoxComponent.vue').default)

//FORMULARS COMPONENTS

let pupils_perso_edit = Vue.component('pupil-perso', require('./components/formulars/pupils/EditPersonalComponent.vue').default)


let default_success = Vue.component('default-success', require('./components/success/SuccessComponent.vue').default)


//TEACHERS COMPONENTS
let listing_teachers = Vue.component('listing-component-teachers', require('./components/teachers/ListingComponent.vue').default)



const routes = [
	{
		path: '/admin/director/master',
		component: admin_defaultDashboard,
		name: 'adminHome'
	},
	{
		path: '/admin/director/pupilsm',
		component: pupils_home,
		name: 'pupilsIndex',
		children: [
			{
				path: '/admin/director/pupilsm',
				component: listing_pupils,
			},
			{
				path: '/admin/director/pupilsm/redList',
				component: pupils_redList,
				name: 'pupilsRedList'

			},
			{
				path: '/admin/director/pupilsm/:id',
				component: pupils_profil,
				name: 'pupilsProfil'

			}
			
		]
	},
	{
		path: '/admin/director/teachersm',
		component: listing_teachers
	}
]

const router = new VueRouter({mode: 'history', routes})
new Vue({
	store,
	router: router,
	el: ".app",
	components: {
		admin_sidebar,
		pupils_perso_edit,
		error404,
		error419
	}
})



window._ = require('lodash');
window.Popper = require('popper.js').default;
try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}