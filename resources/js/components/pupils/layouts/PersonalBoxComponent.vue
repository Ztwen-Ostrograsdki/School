<template>
	<div class="onetable" style="width:48%">
		<div class="w-100 m-0 p-0">
			<h5>Les infos personelles</h5>
			<table class="table-profil ">
				<tr>
					<td>Nom:</td>
					<td> {{ targetPupilLastName }} </td>
				</tr>
				<tr>
					<td>Prénoms:</td>
					<td>{{ targetPupilFirstName }}</td>
				</tr>
				<tr>
					<td>Age:</td>
					<td>12</td>
				</tr>
				<tr>
					<td>Date de Naissance:</td>
					<td>{{ targetPupilBirthFMT }}</td>
				</tr>
				<tr>
					<td>Sexe:</td>
					<td>M</td>
				</tr>
				<tr>
					<td>Classe:</td>
					<td>
						{{targetPupilClasseFMT.name}}<sup>{{ targetPupilClasseFMT.sup }}</sup> {{ targetPupilClasseFMT.idc }}
					</td>
				</tr>
			</table>
			<span>
				<i class="btn btn-news my-1 p-1 pr-2 float-right" data-toggle="modal" data-target="#editPupilPersoModal" @click="openEdited()"> <i class="fa fa-edit mr-2"></i>Mettre à jour</i>
			</span>
		</div>
	</div>


</template>

<script>
	import { mapState } from 'vuex'
	// import helpers from '../../../helpers/helpers'
	export default{
		props: ['visible'],
		data() {
            return {
				preEdited: {}                
            }   
        },

		


		methods: {
			openEdited(){
				axios.get('/admin/director/pupilsm/get&classe&of&pupil&with&data&credentials/id=' + this.$route.params.id)
	                .then(response => {
	                    this.preEdited = response.data.p
	                    this.$store.commit('SET_TOKEN', response.data.token)
	                    this.$store.commit('SET_EDITED_PUPIL', this.preEdited)
	                })
	            
                
                $('#editPupilPersoModal .div-success').hide('slide', 'up')
                $('#editPupilPersoModal .div-success h4').text('')
                $('#editPupilPersoModal').animate({
                    top: '100'
                })
                
                $('#editPupilPersoModal form').show('slide', {direction: 'up'}, 1, function(){
                    $('#editPupilPersoModal form').animate({
                        opacity: '0'
                    }, function(){
                        $('#editPupilPersoModal form').animate({
                            opacity: '1'
                        }, 800)
                        $('#editPupilPersoModal .buttons-div').show('fade')
                    })
                })
            },
		},
		computed: mapState([
           'editedPupil', 'errors', 'targetPupilLastName', 'targetPupilFirstName', 'targetPupilClasseFMT', 'targetPupilBirthFMT'
        ])

	}
</script>