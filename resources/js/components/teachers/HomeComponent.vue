<template>
	<div v-if="!errors.status">
		<router-view></router-view>
	</div>
</template>

<script>

	import { mapState } from 'vuex'
	export default {

		computed: mapState([
           'errors', 'teachersArray'
        ])
	}
</script>