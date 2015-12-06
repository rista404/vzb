<template lang="jade">
	
.Home_View
	//- top-bar

	.Landing_Section
		.Side_Menu_Holder
			side-menu
		.View_Frame__holder
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

	.Side_Menu_Holder
		width: 100%

	.View_Frame__holder
		width: 100%
		padding-left: 0
		padding-right: 0
		height: 100%

	@media screen and (min-width: 768px)
		.Side_Menu_Holder
			width: 30%
			float: left

		.View_Frame__holder
			width: 70%
			float: left

	.View_Frame
		height: 100%
		min-height: 650px
		padding: 70px 40px
		background-color: #31363c

	h1
		color: white
		font-weight: 300


</style>