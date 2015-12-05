<template lang="jade">
	
.Home_View
	top-bar

	.Landing_Section
		.container
			.row
				.col-md-3.col-lg-2
					side-menu
				.View_Frame__holder.col-md-9.col-lg-10
					.View_Frame
						router-view
	pre
		list(list="{{ res }}")
		{{ $data | json }}

</template>


<script>

import TopBar from '../components/Top_Bar.vue';
import SideMenu from '../components/Side_Menu.vue';
import List from './List.vue';

export default {

	route: {
		data(transition) {

			var url = "http://localhost:8000/api/v1/schools";

			this.$http.get(url, function (res, status, request) {

				transition.next({res: res});

			});
		}
	},

	data() {
		return {
			res: {}
		};
	},

	components: {
		"top-bar": TopBar,
		"side-menu": SideMenu,
		"list": List
	}

}

</script>


<style lang="sass">

.Home_View

	.Landing_Section
		position: relative
		background-color: #21c3eb

	.View_Frame__holder
		padding-left: 0
		padding-right: 0

	.View_Frame
		min-height: 650px
		padding: 70px 40px
		background-color: #31363c


</style>