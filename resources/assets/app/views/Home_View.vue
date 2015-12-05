<template lang="jade">
	
.Home_View
	top-bar

	.Landing_Section
		.container
			.row
				.col-sm-12.col-md-3.col-lg-2
					side-menu

</template>


<script>

import TopBar from '../components/Top_Bar.vue';
import SideMenu from '../components/Side_Menu.vue';

export default {

	data() {
		return {
			
		};
	},

	components: {
		"top-bar": TopBar,
		"side-menu": SideMenu
	}

}

</script>


<style lang="sass">

.Home_View

	.Landing_Section
		padding: 30px 0
		background-color: #21c3eb


</style>