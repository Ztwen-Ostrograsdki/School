<template>
	<div class="container-profil m-0 p-0">
		<div id="text-profil-container-opac">
			<h3 class="text-profil-opac mx-auto text-center">
				Profil Apprenant {{ pupilData.id }}
			</h3>
		</div>
		<div class="justify-content-center w-100 m-0 p-0">
			<pupil-profil-main></pupil-profil-main>
		</div>
		<div class="mt-5" id="pupil-profil">
			<div class="d-flex justify-content-between">
				<div class="d-flex justify-content-between"  style="width:63% ;">
					<pupil-perso-data></pupil-perso-data>
					<pupil-parents-data></pupil-parents-data>
				</div>
				<div class="d-flex justify-content-between" style="width: 35%;">
					<pupil-marks-data></pupil-marks-data>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['pupilData'],

		data(){
			return {
				classe : '',
				classeFMT : '',
			}
		},
		created() {
			axios.get('/admin/director/pupilsm/get&classe&of&pupil&with&data&credentials/id=' + this.pupilData.id)
                .then(response => {
                    this.classeFMT = response.data.classeFMT
                    this.classe = response.data.classeName
                }
            )

		},

		methods: {
			
		}
	}

</script>
