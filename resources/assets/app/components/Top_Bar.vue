<template lang="jade">
	
header.Top-Bar
	.container

		.col-xs-7
			ul.Top-Bar__Nav
				li.Top-Bar__Nav_Item
					h3 
						a(href="#") Info
				li.Top-Bar__Nav_Item
					h3 
						a(href="#") Kontakt
				li.Top-Bar__Nav_Item
					h3 
						a(href="#") Uputstvo
		.col-xs-5.ta-right
			profile

</template>


<script>

import Profile from './Profile.vue';

export default {

	data() {
		return {
			
		};
	},

	components: {
		profile: Profile
	}

}

</script>


<style lang="sass">

.Top-Bar

	.Top-Bar__Nav

		.Top-Bar__Nav_Item
			display: inline-block
			padding-right: 20px
			@media screen and (min-width: 768px)
				padding-right: 35px

			h3
				line-height: 80px
				font-weight: 400
				font-size: 20px

				a, a:hover
					color: #333

</style>