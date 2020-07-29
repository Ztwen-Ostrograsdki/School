<template>
	<div class="bg-linear-official-180 p-2 px-3 border border-white" style="height: 560px;">
		<profil-teacher-box></profil-teacher-box>
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
            axios.get('/admin/director/teachersm/get&classe&of&pupil&with&data&credentials/id=' + this.$route.params.id)
                .then(response => {
                    this.$store.commit('UPDATE_TARGET_TEACHER', {teacher: response.data.p, dataFMT: {classe: '', birth: response.data.birthFMT, fist: response.data.firstName, last: response.data.lastName}})
                }
            )
        },

        computed: mapState([
           'editedTeacher', 'targetTeacher', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects', 'allSubjects', 'allRoles', 'allClasses', 'months', 'successed', 'invalidInputs', 'errors', 'targetTeacherLastName', 'targetTeacherFirstName', 'targetTeacherClasseFMT', 'targetTeacherBirthFMT'
        ])




	}
	
</script>