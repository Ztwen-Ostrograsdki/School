<template>
	<div class="container-profil m-0 p-0">
		<div id="text-profil-container-opac">
			<h3 class="text-profil-opac mx-auto text-center">

			</h3>
		</div>
		<div class="justify-content-center w-100 m-0 p-0">
			<transition name="fade" appear>
				<teacher-profil-main></teacher-profil-main>
			</transition>
		</div>
		<div class="mt-5" id="teacher-profil">
			<div class="d-flex justify-content-between">
				<div class="d-flex justify-content-between"  style="width:63% ;">
					<transition name="fade" appear>
						<teacher-perso-data></teacher-perso-data>
					</transition>
				</div>
				<div class="d-flex justify-content-between" style="width: 35%;">
					<transition name="fade" appear>
						<teacher-marks-data></teacher-marks-data>
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
	.fade-enter-active, .fade-leave-active{
		transition: opacity 2s, transform 1s;
	}

	.fade-enter, .fade-leave-active{
		opacity: 0;
		transform: translateY(-30px); 
	}

	.scale-enter-active, .scale-leave-active{
		transition: opacity 2s, transform 2s;
	}

	.scale-enter, .scale-leave-active{
		opacity: 0;
		transform: scale(0.7);
	}
	.fadelow-enter-active, .fadelow-leave-active{
        transition: opacity 7s, transform 2s;
    }

    .fadelow-enter, .fadelow-leave-active{
        opacity: 0;
        -webkit-transform: scale(0.1);
        -ms-transform: scale(0.1);
        -o-transform: scale(0.1);
        transform: scale(0.1);
    }
    .bodyfade-enter-active, .bodyfade-leave-active{
        transition: opacity 7s, transform 2s;
    }

    .bodyfade-enter, .bodyfade-leave-active{
        opacity: 0;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        -o-transform: translateY(20px);
        transform: translateY(20px);
    }
</style>
