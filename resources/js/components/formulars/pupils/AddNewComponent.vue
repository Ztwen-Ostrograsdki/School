<template>
	<div class="modal fade" id="newPupilPersoModal" tabindex="-1" role="dialog" aria-labelledby="newPupilPersoModalLabel" aria-hidden="true" v-show="!errors.status">
  		<div class="modal-dialog modal-lg" role="document" style="background-image: url(/media/silouhette.jpg) !important; width: 100%; background-position: -200px -400px; padding: 0px;">
	    	<div class="bg-linear-official-50 modal-content" style="border-style: solid; border-radius: 0;">
		    	<span class="d-inline-block text-white close py-2 px-3 align-self-end modalCloser" data-dismiss="modal" aria-label="Close" @click="resetNewPupil()">x</span>
		      	<div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
			        <div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
		                <h4 class="modal-title w-100 mb-0 text-left pr-2">Ajout d'un nouvel apprenant</h4>
		            </div>
		      	</div>
	      		<div class="modal-body">
	      		<h5 class="w-100 mx-auto p-1 h5-title text-danger text-center" v-if="invalidInputs !== undefined">
	      			Le formulaire est invalid
	      		</h5>
		        <form class="opac-form" id="add-pupil" method="post">
		        	<input type="text" name="token" v-model="token" hidden="hidden">
			        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 93%">
                        <div class="mx-auto" style="width: 76%">
                            <label for="add_p_name" class="m-0 p-0">Nom et Prénoms de l'apprenant</label>
                            <input type="text" class="m-0 p-0 form-control p-1" :class="getInvalids('name', invalidInputs)" name="name" id="add_p_name" placeholder="Veuillez renseigner le nom et les prénoms de l'apprenant" v-model.lazy="newPupil.name">
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.name !== undefined"> {{ invalidInputs.name[0] }} </i>
                        </div>
                        <div style="width: 23.3%;">
                            <label for="add_p_level" class="mb-0">Le cycle</label>
                            <select name="level" v-model="newPupil.level" id="add_p_level" class="custom-select" :class="getInvalids('level', invalidInputs)">
                                <option value="">Choisissez le cycle</option>
                                <option value="primary"> Le primaire </option>
                                <option value="secondary"> Le secondaire </option>
                                <option value="superior"> Le supérieur </option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.level !== undefined">Ce champ est requis</i>
                        </div>
                    </div>
			        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 93%">
			        	<div style="width: 50%;">
                            <label for="add_p_classe" class="mb-0">La classe</label>
                            <select v-model="newPupil.classe_id" name="classe_id" id="add_p_classe" class="custom-select" :class="getInvalids('classe_id', invalidInputs)">
                                <option value="">Choisissez la classe</option>
                                <option v-if="newPupil.level == 'secondary'" :value="classe.id" v-for="classe in secondaryClasses">{{classe.name}}</option>
                                <option v-if="newPupil.level == 'primary'" :value="classe.id" v-for="classe in primaryClasses">{{classe.name}}</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.classe_id !== undefined"> La classe choisie est invalide </i>
                        </div>
                        <div style="width: 49%;">
                            <label for="add_p_birth" class="mb-0">La date de naissance</label>
                            <input v-model="newPupil.birth" type="date" name="birth" class="m-0 p-0 form-control p-1" :class="getInvalids('birth', invalidInputs)" id="add_p_birth">
                             <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.birth !== undefined"> {{ invalidInputs.birth[0] }} </i>
                        </div>
                    </div>
                    <div class=" mx-auto mt-2 d-flex justify-content-around" style="width: 93%">
                        <div style="width: 32.8%;">
                            <label for="add_p_month" class="m-0 p-0">Le mois d'inscription</label>
                            <select v-model="newPupil.month" name="month" id="add_p_month" class="custom-select" :class="getInvalids('month', invalidInputs)">
                                <option value="">Choisissez le mois</option>
                                <option :value="month" v-for="month in months" > {{ month }} </option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.month !== undefined"> {{ invalidInputs.month[0] }} </i>
                        </div>
                        <div style="width: 32.8%;">
                            <label for="add_p_year" class="mb-0">L'année d'inscription</label>
                            <select v-model="newPupil.year" name="year" id="add_p_year" class="custom-select" :class="getInvalids('year', invalidInputs)">
                                <option value="">Choisissez l'année</option>
                                <option :value="year" v-for="year in getYears()">{{ year }}</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.year !== undefined"> {{ invalidInputs.year[0] }} </i>
                        </div>
                        <div class="" style="width: 32.8%;">
                            <label for="add_p_sexe" class="m-0 p-0">Sexe</label>
                            <select name="sexe" id="add_p_sexe" v-model="newPupil.sexe" class="custom-select" :class="getInvalids('sexe', invalidInputs)">
                                <option value="">Choisir le sexe</option>
                                <option value="male" >Masculin</option>
                                <option value="female">Féminin</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.sexe !== undefined"> {{ invalidInputs.sexe[0] }} </i>
                        </div>
                        
                    </div>
			    </form>
	      		</div>
			    <div class="mx-auto mt-2 p-1 pb-2 buttons-div" style="width: 93%">
			        <button type="button" class="btn btn-primary w-25 float-right" @click="createNewPupil(token)">Inserer</button>
			        <button type="button" class="btn btn-secondary w-25 mx-1 float-right" data-dismiss="modal" @click="resetNewPupil()">Annuler</button>
			    </div>
			    <div class="mx-auto mt-2 p-1 pb-2 div-success" style="width: 93%; display: none">
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
		data(){
			return {
				show: true,
			}
		},
		created(){
            this.$store.dispatch('getTOOLS')
        },

		
		methods: {

			wasSelected(tag, target){
				return tag == target ? 'selected' : ''
			},

			resetNewPupil(){
				this.$store.commit('RESET_NEW_PUPIL')
			},

			createNewPupil(token){
				let newPupil = this.newPupil
				this.$store.dispatch('addANewPupil', {newPupil, token})
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
            'newPupil', 'invalidInputs', 'successed', 'token', 'errors', 'months', 'primaryClasses', 'secondaryClasses', 'newPupilName'
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

