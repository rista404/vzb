<template lang="jade">
	
.Studije
	list(list="{{ res }}")

	pre {{ $data | json }}

</template>


<script>

import List from '../components/List.vue';

export default {

	route: {
		data(transition) {

			var type = transition.to.params.type;

			var url = "http://localhost:8000/api/v1/schools/type/" + type;

			console.log(url);

			this.$http.get(url, function (res, status, request) {

				console.log(res);

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