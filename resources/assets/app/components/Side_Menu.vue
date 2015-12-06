<template lang="jade">

.Side_Menu
	.Side_Menu__Logo

		a.Side_Menu__Title(v-link="{ path: '/' }")
			|Vodic 
			span za 
			br
			|brucose

		.Side_Menu__Search
			img(src="public/img/loop.png")

	ul.Side_Menu__Items

		li.Side_Menu__Item
			h3 
				a(v-link="{ path: '/fakulteti' }") Fakulteti

		li.Side_Menu__Item
			h3 
				a(v-link="{ path: '/domovi' }") Domovi

		li.Side_Menu__Item
			h3 
				a(v-link="{ path: '/menze' }") Menze

		li.Side_Menu__Item
			h3 
				a(v-link="{ path: '/zanimljivosti' }") Zanimljivosti

</template>


<script>

export default {

	data() {
		return {
			
		};
	}

}

</script>


<style lang="sass">

.Side_Menu
	padding: 70px 0 40px 0
	text-align: center
	@media screen and (min-width: 768px)
		padding: 70px 0
		padding-right: 15px
		text-align: right

	.Side_Menu__Logo
		.Side_Menu__Title
			display: inline-block
			vertical-align: middle
			text-transform: uppercase
			padding-right: 15px
			font-size: 22px
			line-height: 1
			font-weight: 500
			letter-spacing: 1px
			color: #333

			&:hover
				color: #fdff56

		.Side_Menu__Search
			display: inline-block
			vertical-align: middle
			cursor: pointer

	.Side_Menu__Items
		padding: 20px 0

		@media screen and (min-width: 768px)
			padding: 40px 0
		
		.Side_Menu__Item
			// display: inline-block
			padding: 0 40px

			@media screen and (min-width: 768px)
				padding-bottom: 25px
				display: inline


			h3
				font-size: 22px
				font-weight: 400

				a
					color: #333

					&.active
						color: #fdff56



</style>