<template lang="jade">
	
.List
	.Single.col-md-6(v-for="single in list")
		h1 {{ single.nazivu }}
		h3 {{ single.adresa }}

</template>


<script>

export default {

	props: ['list'],

}

</script>


<style lang="sass">

.List

</style>