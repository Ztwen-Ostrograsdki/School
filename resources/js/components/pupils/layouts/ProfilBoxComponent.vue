<template>
	<div class="container-profil m-0 p-0">
		<div id="text-profil-container-opac">
			<h3 class="text-profil-opac mx-auto text-center">

			</h3>
		</div>
		<div class="justify-content-center w-100 m-0 p-0">
			<transition name="fade" appear>
				<pupil-profil-main></pupil-profil-main>
			</transition>
		</div>
		<div class="mt-5" id="pupil-profil">
			<div class="d-flex justify-content-between">
				<div class="d-flex justify-content-between"  style="width:63% ;">
					<transition name="fade" appear>
						<pupil-perso-data></pupil-perso-data>
					</transition>
					<transition name="scale" appear>
						<pupil-parents-data></pupil-parents-data>
					</transition>
				</div>
				<div class="d-flex justify-content-between" style="width: 35%;">
					<transition name="fade" appear>
						<pupil-marks-data></pupil-marks-data>
					</transition>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: [],

		data(){
			return {
				classe : '',
				visible : true,
			}
		},

		methods: {
			
		}
	}

</script>
<style>

</style>
