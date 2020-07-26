<template>
	<div class="bg-linear-official-180 p-2 px-3 border border-white" style="height: 560px;">
		<profil-pupil-box :pupilData="pupil"></profil-pupil-box>
	</div>
</template>

<script>

	export default{


			data() {
            return {
                pupil: {},
                name: '',
                id: this.$route.params.id,
                classe: '',
                classeFMT: '',
                age: '',
                age: '',
                alert: "Tous les apprenants",
                months : [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre"

                ]
            }   
        },
        created(){
            axios.get('/admin/director/pupilsm/get&classe&of&pupil&with&data&credentials/id=' + this.$route.params.id)
                .then(response => {
                    this.pupil = response.data.p
                    this.classeFMT = response.data.classeFMT
                }
            )
        },

        methods: {
        	getProfilData(pupil){
                
            }
        },




	}
	
</script>