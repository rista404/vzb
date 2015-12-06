var Vue = require('vue');
var VueRouter = require('vue-router');

// Set up router
Vue.use(VueRouter);
var router = new VueRouter({
	linkActiveClass: "active"
});

// Include Views

// Router paths
router.map({

	'/': {
		component: require('../views/Home_View.vue'),

		subRoutes: {

			'/': {
				component: require('../components/Landing.vue')
			},

			'/fakulteti': {
				component: require('../components/Filter_Fakulteta.vue')
			},

			'/studije/:type': {
				component: require('../views/Studije.vue')
			},

			'/espb/:number': {
				component: require('../views/Studije.vue')
			},

			'/domovi': {
				component: require('../views/Domovi.vue')
			},

			'/menze': {
				component: require('../views/Menze.vue')
			},

			'/zanimljivosti': {
				component: require('../views/Zanimljivosti.vue')
			}
		}
	},

	

});

// Create an empty component to hold views
var App = Vue.extend({});

// Fire up the router
router.start(App, '#app');
