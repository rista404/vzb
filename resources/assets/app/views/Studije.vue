<template lang="jade">
	
.Studije
	list(:list="res")

</template>


<script>

import List from '../components/List.vue';

export default {

	route: {
		data(transition) {

			var type = transition.to.params.type;

			var url = "/api/v1/schools/type/" + type;

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

.Studije


pre
	color: white
</style>