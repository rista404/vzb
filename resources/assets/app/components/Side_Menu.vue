<template lang="jade">

.Side_Menu
	.Side_Menu__Logo

		h2.Side_Menu__Title 
			|Vodic 
			span za 
			br
			|brucose

		.Side_Menu__Search
			img(src="public/img/loop.png")

	ul.Side_Menu__Items

		li.Side_Menu__Item
			h3 
				a(href="#") Fakulteti

		li.Side_Menu__Item
			h3 
				a(href="#") Domovi

		li.Side_Menu__Item
			h3 
				a(href="#") Menze

		li.Side_Menu__Item
			h3 
				a(href="#") Zanimljivosti

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
	padding: 40px 0
	text-align: center
	@media screen and (min-width: 992px)
		text-align: right

	.Side_Menu__Logo
		.Side_Menu__Title
			display: inline-block
			vertical-align: middle
			text-transform: uppercase
			padding-right: 15px
			line-height: 1
			font-weight: 500
			letter-spacing: 1px

		.Side_Menu__Search
			display: inline-block
			vertical-align: middle
			cursor: pointer

	.Side_Menu__Items
		padding: 40px 0
		
		.Side_Menu__Item
			display: inline-block
			padding: 0 10px

			@media screen and (min-width: 992px)
				padding-bottom: 25px
				display: inline


			h3
				font-size: 22px
				font-weight: 400

				a
					color: #333



</style>