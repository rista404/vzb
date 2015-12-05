<template lang="jade">
	
.Profile
	.Profile__Name
		h3 Debeli Gmaz
	.Profile__Image
		img(src="http://www.radfaces.com/images/avatars/eddie-gelfen.png") 


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

.Profile
	.Profile__Name
		display: inline-block
		vertical-align: middle
		padding-right: 20px

		h3
			font-size: 22px
			font-weight: 500
			line-height: 80px


	.Profile__Image
		display: inline-block
		vertical-align: middle

		img
			border: 2px solid #21c3eb
			border-radius: 21px
			width: 42px
			cursor: pointer


</style>