<template lang="jade">
	
.List
	h1.heading {{ $route.params.type }}
	hr
	.Single.col-md-6(v-for="single in list")
		.row
			.Single__Content.col-xs-10
				h1 
					a(href="#!/fakultet/{{single.id}}") {{ single.nazivu }}
				h3 
					{{ single.adresa }}
			.Single__Go.col-xs-1
				img(src="/img/right.png")

</template>


<script>

export default {

	props: ['list'],

	data() {
		return;
	}

}

</script>


<style lang="sass">

.List
	.Single
		padding-bottom: 50px
		height: 180px

		&:hover
			h1 a, h3
				color: #fdff56

		h1
			font-size: 22px
			font-weight: 500

			a
				color: white

		h3
			color: #21c3eb
			font-weight: 300
			font-size: 18px

		.Single__Go
			margin-top: 55px


</style>