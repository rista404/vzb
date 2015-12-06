<template lang="jade">
	
.Fakultet
	a(href="#!/fakulteti")
		img(src="/public/img/left.png")
	h1.heading {{ res.nazivu }}
	a(href="#!/fakulteti").close
		img(src="/public/img/close.png")
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
	.heading
		display: inline-block
		color: #fdff56
		margin: 0 0 0 20px
		vertical-align: middle

	.close
		float: right

</style>