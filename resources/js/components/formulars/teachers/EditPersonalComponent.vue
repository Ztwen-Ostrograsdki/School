<template>
	<div class="modal fade" id="editTeacherPersoModal" tabindex="-1" role="dialog" aria-labelledby="editTeacherPersoModalLabel" aria-hidden="true" v-show="!errors.status">
  		<div class="modal-dialog modal-lg" role="document" style="background-image: url(/media/silouhette.jpg) !important; width: 100%; background-position: -200px -400px; padding: 0px; ">
	    	<div class="bg-linear-official-50 modal-content" style="border-style: solid; border-radius: 0;">
		    	<span class="d-inline-block text-white close py-2 px-3 align-self-end modalCloser" data-dismiss="modal" aria-label="Close" style="" @click="resetEditedTeacher()">x</span>
		      	<div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
			        <div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
		                <h4 class="modal-title w-100 mb-0 text-left pr-2">Edition des informations de l'enseignant <i class="float-right text-white-50">{{ editedTeacher.name }}</i></h4>
		            </div>
		      	</div>
	      		<div class="modal-body">
	      		<h5 class="w-100 mx-auto p-1 h5-title text-danger text-center" v-if="invalidInputs !== undefined">
	      			Le formulaire est invalid
	      		</h5>
		        <form class="opac-form" id="taecher-perso-edit" style="display: none;" method="post">
		        	<input type="text" name="token" v-model="token" hidden="hidden">
			        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                        <div class="mx-auto" style="width: 100%">
                            <label for="ed_t_name" class="m-0 p-0">Nom et Prénoms de l'enseignant</label>
                            <input v-model.lazy="editedTeacher.name" type="text" class="m-0 p-0 form-control p-1" :class="getInvalids('name', invalidInputs)" name="name" id="ed_t_name" placeholder="Veuillez renseigner le nom et les prénoms de l'enseignant">
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.name !== undefined"> {{ invalidInputs.name[0] }} </i>
                        </div>
                    </div>
                    <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                        <div class="" style="width: 67.2%">
                            <label for="ed_t_email" class="m-0 p-0">Adresse mail de l'enseignant</label>
                            <input v-model.lazy="editedTeacher.email" type="email" class="m-0 p-0 form-control p-1" :class="getInvalids('email', invalidInputs)" name="email" id="ed_t_email" placeholder="Veuillez renseigner l'email l'enseignant">
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.email !== undefined"> {{ invalidInputs.email[0] }} </i>
                        </div>
                        <div style="width: 31.7%;">
                            <label for="ed_t_subject" class="m-0 p-0">La spécialité</label>
                            <select v-model="editedTeacher.subject_id" name="subject_id" id="ed_t_subject" class="custom-select" :class="getInvalids('subject_id', invalidInputs)">
                                <option value="">Choisissez la spécialité</option>
                                <option :value="subject.id" v-for="subject in subjects" > {{ subject.name }} </option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.subject_id !== undefined"> {{ invalidInputs.subject_id[0] }} </i>
                        </div>
                    </div>
			        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
			        	<div class="mx-auto" style="width: 68%">
                            <label for="ed_t_contact" class="m-0 p-0">Contacts de l'enseignant</label>
                            <input v-model.lazy="editedTeacher.contact" type="text" class="m-0 p-0 form-control p-1" :class="getInvalids('contact', invalidInputs)" name="contact" id="ed_t_contact" placeholder="Veuillez renseigner les contacts l'enseignant">
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.contact !== undefined"> {{ invalidInputs.contact[0] }} </i>
                        </div>
                        <div style="width: 32.5%;">
                            <label for="ed_t_birth" class="mb-0">La date de naissance</label>
                            <input v-model.lazy="editedTeacher.birth" type="date" name="birth" class="m-0 p-0 form-control p-1" :class="getInvalids('birth', invalidInputs)" id="ed_t_birth">
                             <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.birth !== undefined"> {{ invalidInputs.birth[0] }} </i>
                        </div>
                    </div>
                    <div class=" mx-auto mt-2 d-flex justify-content-around" style="width: 85%">
                        <div style="width: 49.5%;">
                            <label for="ed_t_month" class="m-0 p-0">Le mois d'inscription</label>
                            <select v-model="editedTeacher.month" name="month" id="ed_t_month" class="custom-select" :class="getInvalids('month', invalidInputs)">
                                <option value="">Choisissez le mois</option>
                                <option :value="month" v-for="month in months" > {{ month }} </option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.month !== undefined"> {{ invalidInputs.month[0] }} </i>
                        </div>
                        <div style="width: 49.2%;">
                            <label for="ed_t_year" class="mb-0">L'année d'inscription</label>
                            <select v-model.lazy="editedTeacher.year" name="year" id="ed_t_year" class="custom-select" :class="getInvalids('year', invalidInputs)">
                                <option value="">Choisissez l'année</option>
                                <option :value="year" v-for="year in getYears()">{{ year }}</option>
                            </select>
                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.year !== undefined"> {{ invalidInputs.year[0] }} </i>
                        </div>
                    </div>
                    <div class=" mx-auto mt-2 d-flex justify-content-start" style="width: 85%">
                    	<div style="width: 60%;" class="">
                            <label for="ed_t_ae" class="mb-0">Choisir comme AE de ...</label>
                            <div class="w-75 d-flex justify-content-start border rounded p-1">
                            	<div class="mr-3">
                            		<label for="ed_ae_oui">Authorisé</label>
                            		<input v-model="editedTeacherIsAE" type="radio" name="setToAE" id="ed_ae_oui" value="true" class="custom-radio">
                            	</div>
                            	<div>
                            		<label for="ed_ae_non">Réfusé</label>
                            		<input v-model="editedTeacherIsAE" type="radio" name="setToAE" id="ed_ae_non" value="false" class="custom-radio">
                            	</div>
                            </div>
                        </div>
                    	<div class="" style="width: 29%;">
                            <label for="ed_t_sexe" class="m-0 p-0">Sexe</label>
                            <select v-model.lazy="editedTeacher.sexe" name="sexe" id="ed_t_sexe" class="custom-select" :class="getInvalids('sexe', invalidInputs)">
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
			        <button type="button" class="btn btn-secondary mx-1 float-right" data-dismiss="modal" @click="resetEditedTeacher()">Annuler</button>
			        <button type="button" class="btn btn-primary float-right" @click="updateEdited(editedTeacher, token)">Mettre à jour</button>
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
			resetEditedTeacher(){
				this.$store.commit('RESET_EDITED_TEACHER')
			},

			wasSelected(tag, target){
				return tag == target ? 'selected' : ''
			},

			updateEdited(teacher, token){
				this.$store.dispatch('updateATeacherData', {teacher, token})
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
            'editedTeacher', 'editedTeacherClasses', 'invalidInputs', 'subjects', 'successed', 'token', 'errors', 'months', 'primaryClasses', 'secondaryClasses', 'editedTeacherIsAE'
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

