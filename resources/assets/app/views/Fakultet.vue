<template lang="jade">
	
.Fakultet
	img(src="/public/img/left.png")
	h1.heading Fakultet
	hr


</template>


<script>

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

	data() {
		return {
			res: {}
		};
	},

}

</script>


<style lang="sass">

.Fakultet

</style>