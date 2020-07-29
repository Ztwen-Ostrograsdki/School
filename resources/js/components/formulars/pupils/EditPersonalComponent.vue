<template>
	<div class="modal fade" id="editPupilPersoModal" tabindex="-1" role="dialog" aria-labelledby="editPupilPersoModalLabel" aria-hidden="true" v-show="!errors.status">
  		<div class="modal-dialog modal-lg" role="document" style="background-image: url(/media/silouhette.jpg) !important; width: 100%; background-position: -200px -400px; padding: 0px;">
	    	<div class="bg-linear-official-50 modal-content" style="border-style: solid; border-radius: 0;">
		    	<span class="d-inline-block text-white close py-2 px-3 align-self-end modalCloser" data-dismiss="modal" aria-label="Close" style="" @click="resetEditedPupil()">x</span>
		      	<div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
			        <div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
		                <h4 class="modal-title w-100 mb-0 text-left pr-2">Edition des informations de l'apprenant <i class="float-right text-white-50">{{ editedPupil.name }}</i></h4>
		            </div>
		      	</div>
	      		<div class="modal-body">
	      		<h5 class="w-100 mx-auto p-1 h5-title text-danger text-center" v-if="invalidInputs !== undefined">
	      			Le formulaire est invalid
	      		</h5>
		        <form class="opac-form" id="pupil-perso-edit" style="display: none;" method="post">
		        	<input type="text" name="token" v-model="token" hidden="hidden">
			        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                        <div class="mx-auto" style="width: 100%">
                            <label for="ed_p_name" class="m-0 p-0">Nom et Prénoms de l'apprenant</label>
                            <input type="text" class="m-0 p-0 form-control p-1" :class="getInvalids('name', invalidInputs)" name="name" id="ed_p_name" placeholder="Veuillez renseigner le nom et les prénoms de l'apprenant" v-model.lazy="editedPupil.name">
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.name !== undefined"> {{ invalidInputs.name[0] }} </i>
                        </div>
                    </div>
			        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
			        	<div style="width: 50%;">
                            <label for="ed_p_classe" class="mb-0">La classe</label>
                            <select name="classe_id" id="ed_p_classe" class="custom-select" :class="getInvalids('classe_id', invalidInputs)" v-model="editedPupil.classe_id">
                                <option value="">Choisissez la classe</option>
                                <option :value="classe.id" v-for="classe in secondaryClasses" v-if="editedPupil.level == 'secondary'">{{classe.name}}</option>
                                <option :value="classe.id" v-for="classe in primaryClasses" v-if="editedPupil.level == 'primary'">{{classe.name}}</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.classe_id !== undefined"> La classe choisie est invalide </i>
                        </div>
                        <div style="width: 49%;">
                            <label for="ed_p_birth" class="mb-0">La date de naissance</label>
                            <input v-model="editedPupil.birth" type="date" name="birth" class="m-0 p-0 form-control p-1" :class="getInvalids('birth', invalidInputs)" id="ed_p_birth">
                             <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.birth !== undefined"> {{ invalidInputs.birth[0] }} </i>
                        </div>
                    </div>
                    <div class=" mx-auto mt-2 d-flex justify-content-around" style="width: 85%">
                        <div style="width: 31.3%;">
                            <label for="ed_p_month" class="m-0 p-0">Le mois d'inscription</label>
                            <select name="month" id="ed_p_month" class="custom-select" :class="getInvalids('month', invalidInputs)" v-model="editedPupil.month">
                                <option value="">Choisissez le mois</option>
                                <option :value="month" v-for="month in months" > {{ month }} </option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.month !== undefined"> {{ invalidInputs.month[0] }} </i>
                        </div>
                        <div style="width: 31.3%;">
                            <label for="ed_p_year" class="mb-0">L'année d'inscription</label>
                            <select name="year" id="ed_p_year" class="custom-select" :class="getInvalids('year', invalidInputs)" v-model="editedPupil.year">
                                <option value="">Choisissez l'année</option>
                                <option :value="year" v-for="year in getYears()">{{ year }}</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.year !== undefined"> {{ invalidInputs.year[0] }} </i>
                        </div>
                        <div class="" style="width: 31.3%;">
                            <label for="ed_p_sexe" class="m-0 p-0">Sexe</label>
                            <select name="sexe" id="ed_p_sexe" class="custom-select" :class="getInvalids('sexe', invalidInputs)" v-model="editedPupil.sexe">
                                <option value="">Choisir le sexe</option>
                                <option value="male" >Masculin</option>
                                <option value="female">Féminin</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.sexe !== undefined"> {{ invalidInputs.sexe[0] }} </i>
                        </div>
                        
                    </div>
			    </form>
	      		</div>
			    <div class="mx-auto mt-2 p-1 pb-2 buttons-div" style="width: 85%">
			        <button type="button" class="btn btn-secondary mx-1 float-right" data-dismiss="modal" @click="resetEditedPupil()">Annuler</button>
			        <button type="button" class="btn btn-primary float-right" @click="updateEdited(editedPupil, token)">Mettre à jour</button>
			    </div>
			    <div class="mx-auto mt-2 p-1 pb-2 div-success" style="width: 85%; display: none">
			    	<div class="d-flex justify-content-center w-100 p-2 my-1">
			    		<h4></h4>
			    	</div>
			        <div class="w-75 mx-auto d-flex justify-content-center">
			        	<button type="button" class="btn w-50 bg-transparent border shadow mx-1 px-1" data-dismiss="modal">Terminer</button>
			        </div>
			    </div>
	    	</div>
	  	</div>
	</div>
</template>

<script>
	import { mapState } from 'vuex'
	
	export default{
		props: [],
		data(){
			return {
				show: true,
			}
		},
		created(){
            
        },

		
		methods: {
			resetEditedPupil(){
				this.$store.commit('RESET_EDITED_PUPIL')
			},

			wasSelected(tag, target){
				return tag == target ? 'selected' : ''
			},

			updateEdited(pupil, token){
				this.$store.dispatch('updateAPupilData', {pupil, token})
			},
			getYears(){
				let $tab = []
				let now = (new Date).getFullYear()
				for (var i = 1995; i <= now; i++) {
					$tab.push(i)
				}
				return $tab
			},
			getInvalids(input, invalids = this.invalidInputs){

				if(invalids !== undefined && invalids[input] !== undefined){
					return 'is-invalid'
				}
				else{
					return ''
				}
				
			}
			
		},

		computed: mapState([
            'editedPupil', 'invalidInputs', 'successed', 'token', 'errors', 'months', 'primaryClasses', 'secondaryClasses'
        ]),



	}



</script>

<style>
	input + i, select + i{
		color: rgb(160, 0, 0);
		font-style: normal;
		text-shadow: 0 1px 1px gray;
	}
</style>

