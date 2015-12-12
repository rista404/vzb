<template lang="jade">
	
.Filter_Fakulteta.fadeInDown
	h2 Pronadji fakultet:
	hr
	.row
		.indent.col-xs-6.col-md-4
			h2.head Studije
			hr
			h2
				a(v-link="'studije/strukovne'") Strukovne
			h2
				a.clickable(@click="showMore = ! showMore") Akademske
			h2.head ESPB
			hr
			h2
				a(v-link="'/espb/180'") 180
			h2
				a(v-link="'/espb/240'") 240
			h2
				a(v-link="'/espb/300'") 300
			h2
				a(v-link="'/espb/360'") 360

		.indent.col-xs-6.col-md-4(v-show="showMore")
			h2.head Akademske
			hr
			h2
				a(v-link="'studije/umetnost'") Umetnost
			h2
				a(v-link="'studije/tehnicke'") Tehnicke
			h2
				a(v-link="'studije/prirodne'") Prirodne
			h2
				a(v-link="'studije/drustvene'") Drustvene
			h2
				a(v-link="'studije/medicinske'") Medicinske
			//- h2
				//- a(v-link="{ path='/' }") Vojne

</template>


<script>

export default {

	data() {
		return {
			showMore: false
		};
	}

}

</script>


<style lang="sass">

.Filter_Fakulteta

	h2
		color: white
		font-weight: 400
		margin-bottom: 8px

		&.head
			margin-top: 15px
			color: #21c3eb

		a
			margin-down: 10px
			color: white

	hr
		margin: 10px 0

	.indent
		@media screen and (min-width: 768px)
			margin-left: 30px

</style>