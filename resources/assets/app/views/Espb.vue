<template lang="jade">
	
.Espb
	list(:list="res")

</template>


<script>

import List from '../components/List.vue';

export default {

	route: {
		data(transition) {

			var points = transition.to.params.number;

			var url = "http://localhost:8000/api/v1/schools/espb/" + points;

			console.log(url);

			this.$http.get(url, function (res, status, request) {

				transition.next({res: res});

			});
		}
	},

	data() {
		return {
			res: {}
		};
	},

	components: {
		"list": List
	}
}

</script>


<style lang="sass">

.Espb

</style>