<template lang="jade">
	
.List-Study
	.Single.col-md-6(v-for="single in list")
		.row
			.Single__Content.col-xs-9
				h1 
					a {{ single.naziv }}
				h3 
					| {{ single.nivo }}, {{ single.trajanje }} ESPB
			.Single__Go.col-xs-3
				h3 {{ single.skolarina }} RSD

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

.List-Study

	.heading
		display: inline-block
		color: #fdff56
		margin: 0 0 0 20px
		vertical-align: middle

	.Single
		padding-bottom: 30px
		height: 140px

		&:hover
			h1 a
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
			margin-top: 25px
			text-align: center

			h3
				color: #fdff56
				font-size: 20px


</style>