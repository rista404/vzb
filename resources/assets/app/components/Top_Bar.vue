<template lang="jade">
	
header.Top-Bar
	.container

		.col-sm-8
			ul.Top-Bar__Nav
				li.Top-Bar__Nav_Item
					h3 Info
				li.Top-Bar__Nav_Item
					h3 Kontakt
				li.Top-Bar__Nav_Item
					h3 Uputstvo
		.col-sm-4.ta-right
			profile

</template>


<script>

import Profile from './Profile.vue';

export default {

	data() {
		return {
			
		};
	},

	components {
		profile: Profile
	}

}

</script>


<style lang="sass">

.Top-Bar

	.Top-Bar__Nav

		.Top-Bar__Nav_Item
			display: inline-block
			padding-right: 35px

			h3
				line-height: 80px
				font-weight: 400
				font-size: 20px

</style>