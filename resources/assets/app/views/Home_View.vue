<template lang="jade">
	
.Home_View
	//- top-bar

	.Landing_Section
		.container
			.row
				.col-md-3.col-lg-2
					side-menu
				.View_Frame__holder.col-md-9.col-lg-10
					.View_Frame
						router-view
</template>


<script>

import TopBar from '../components/Top_Bar.vue';
import SideMenu from '../components/Side_Menu.vue';

export default {

	components: {
		"top-bar": TopBar,
		"side-menu": SideMenu
	}

}

</script>


<style lang="sass">

.Home_View
	height: 100%
	.Landing_Section
		position: relative
		height: 100%
		background-color: #21c3eb

		& > .container	
			height: 100%

			& > .row
				height: 100%

	.View_Frame__holder
		padding-left: 0
		padding-right: 0
		height: 100%

	.View_Frame
		height: 100%
		min-height: 650px
		padding: 70px 40px
		background-color: #31363c


</style>