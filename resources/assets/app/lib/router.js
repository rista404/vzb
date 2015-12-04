var Vue = require('vue');
var VueRouter = require('vue-router');

// Set up router
Vue.use(VueRouter);
var router = new VueRouter({
	linkActiveClass: "active"
});

// Include Views
var HelloWorld = require('../views/hello_world.vue');

// Router paths
router.map({

	'/': {
		component: HelloWorld
	}

});

// Create an empty component to hold views
var App = Vue.extend({});

// Fire up the router
router.start(App, '#app');
