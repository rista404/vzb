<template lang="jade">
	
.Fakultet.fadeInDown
	a(href="#!/fakulteti")
		img(src="/public/img/left.png")
	h1.heading {{ res.nazivu }}

	a(href="#!/fakulteti").close
		img(src="/public/img/close.png")
	hr
	.row
		.Tab.col-xs-3
			h2(@click="currentTab = 1" v-bind:class="{ 'active':  currentTab == 1}") SMEROVI
		.Tab.col-xs-3
			h2(@click="currentTab = 2" v-bind:class="{ 'active':  currentTab == 2}") LOKACIJA
		.Tab.col-xs-3
			h2(@click="currentTab = 3" v-bind:class="{ 'active':  currentTab == 3}") KONTAKT
		.Tab.col-xs-3
			h2(@click="currentTab = 4" v-bind:class="{ 'active':  currentTab == 4}") GALERIJA

	.Info.row
		.Smerovi.col-sm-12.fadeInDown(v-show="currentTab == 1")
			list(:list="res.study_programs")

		.col-sm-12.fadeInDown(v-show="currentTab == 2")
			.row
				.col-xs-12
					#map
						h1 To be done!
		.Kontakt.col-sm-12.fadeInDown(v-show="currentTab == 3")
			.row
				.col-xs-12
					h2 Email: {{ res.email }}
					h2 Broj Telefona: {{ res.tel }}
					h2 Website: 
						a(href="{{ res.www }}"){{ res.www }}
		.col-sm-12.fadeInDown(v-show="currentTab == 4")
			h1 To be done!

	//- script(async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcbw2QedscN39nlh_-EQbGf-FqrO3EUg4&callback=initMap")

</template>


<script>

import List from '../components/StudyList.vue';

export default {

	route: {
		data(transition) {

			var id = transition.to.params.id;

			var url = "http://localhost:8000/api/v1/schools/" + id;

			console.log(url);

			this.$http.get(url, function (res, status, request) {

				transition.next({res: res});

			});
		}
	},

	activate(done) {	

			this.$http.get("https://maps.googleapis.com/maps/api/js?key=AIzaSyDcbw2QedscN39nlh_-EQbGf-FqrO3EUg4&callback=initMap", function (res, status, request) {

				console.log(res);

			});

		  function initMap() {
		  	// Create a map object and specify the DOM element for display.
		  	var map = new google.maps.Map(document.getElementById('map'), {
		  	  center: {lat: -34.397, lng: 150.644},
		  	  scrollwheel: false,
		  	  zoom: 8
		  	});
		  }
	},

	data() {
		return {
			res: {},
			currentTab: 1
		};
	},

	components: {
		list: List
	}

}

</script>


<style lang="sass">

.Fakultet
	.heading
		display: inline-block
		color: #fdff56
		margin: 0 0 0 20px
		font-size: 24px
		vertical-align: middle

	.close
		float: right

	#map
		width: 100%
		height: 400px

	.Tab 
		text-align: center

		h2
			color: white
			font-weight: 400
			font-size: 20px
			cursor: pointer

			&.active
				color: #fdff56

	.Kontakt
		h2
			color: white
			padding: 20px 0
			font-weight: 200

			a, a:hover
				color: #fdff56

	.Info
		padding-top: 40px


</style>