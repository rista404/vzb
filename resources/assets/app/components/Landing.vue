<template lang="jade">
	
.Landing
	h1 Greeting message

	tips

</template>


<script>

import Tips from './Tips.vue';

export default {
	components: {
		tips: Tips
	}
}

</script>


<style lang="sass">

.Landing
	h1
		font-weight: 300
		color: white


</style>