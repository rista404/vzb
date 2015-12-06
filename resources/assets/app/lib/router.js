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

			'/fakulteti': {
				component: require('../components/Filter_Fakulteta.vue')
			},

			'studije/:type': {
				component: require('../views/Studije.vue')
			}
		}
	},

	

});

// Create an empty component to hold views
var App = Vue.extend({});

// Fire up the router
router.start(App, '#app');
