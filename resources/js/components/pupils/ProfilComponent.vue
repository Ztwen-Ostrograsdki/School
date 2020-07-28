<template>
	<div class="bg-linear-official-180 p-2 px-3 border border-white" style="height: 560px;">
		<profil-pupil-box></profil-pupil-box>
	</div>
</template>

<script>
    import { mapState } from 'vuex'
	export default{


		data() {
            return {
                
                
            }   
        },
        created(){
            axios.get('/admin/director/pupilsm/get&classe&of&pupil&with&data&credentials/id=' + this.$route.params.id)
                .then(response => {
                    this.$store.commit('UPDATE_TARGET_PUPIL', {pupil: response.data.p, dataFMT: {classe: response.data.classeFMT, birth: response.data.birthFMT, fist: response.data.firstName, last: response.data.lastName}})
                }
            )
        },

        computed: mapState([
           'editedPupil', 'targetPupil', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects', 'allSubjects', 'allRoles', 'allClasses', 'months', 'successed', 'invalidInputs', 'errors', 'targetPupilLastName', 'targetPupilFirstName', 'targetPupilClasseFMT', 'targetPupilBirthFMT'
        ])




	}
	
</script>