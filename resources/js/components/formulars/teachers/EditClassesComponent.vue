<template>
	<div class="modal fade" id="editTeacherClassesModal" tabindex="-1" role="dialog" aria-labelledby="editTeacherClassesModalLabel" aria-hidden="true" v-show="!errors.status">
  		<div class="modal-dialog modal-lg" role="document" style="background-image: url(/media/silouhette.jpg) !important; width: 100%; background-position: -200px -400px; padding: 0px; ">
	    	<div class="bg-linear-official-50 modal-content" style="border-style: solid; border-radius: 0;">
		    	<span class="d-inline-block text-white close py-2 px-3 align-self-end modalCloser" data-dismiss="modal" aria-label="Close" style="" @click="resetEditedTeacher()">x</span>
		      	<div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
			        <div class="modal-header w-100 d-flex justify-content-between p-0 pl-2 m-0">
		                <h4 class="modal-title w-100 mb-0 text-left pr-2">Edition des classes de l'enseignant <i class="float-right text-white-50">{{ editedTeacher.name }}</i></h4>
		            </div>
		      	</div>
	      		<div class="modal-body">
	      		<h5 class="w-100 mx-auto p-1 h5-title text-danger text-center" v-if="invalidInputs !== undefined">
	      			Le formulaire est invalid
	      		</h5>
		        <form class="opac-form" id="taecher-classes-edit" style="display: none;" method="post">
		        	<input type="text" name="token" v-model="token" hidden="hidden">
		        	<div class="w-100 mx-auto" v-if="editedTeacher.level == 'primary'">
		        		<div class="mx-auto mt-2 d-flex justify-content-center" style="width: 85%">
		        			<div style="width: 75%;">
	                            <label for="ed_t_c" class="m-0 p-0">Classes</label>
	                            <select v-model="editedTeacherClasses.length > 0 ? editedTeacherClasses[0] : ''" name="classe" id="ed_t_c" class="custom-select" :class="getInvalids('classe', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :value="classe.id" v-for="classe in primaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.classe !== undefined"> {{ invalidInputs.classe[0] }} </i>
	                        </div>
		        		</div>
		        	</div>
                    <div class="w-100 mx-auto" v-if="editedTeacher.level == 'secondary'">
                    	<div class="mx-auto mt-2 d-flex justify-content-around" style="width: 90%">
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c1" class="m-0 p-0">Classes 1</label>
	                            <select v-model="editedTeacherClasses.length > 0 ? editedTeacherClasses[0] : ''" name="classe1" id="ed_t_c1" class="custom-select" :class="getInvalids('c1', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :value="classe.id" v-for="classe in secondaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c1 !== undefined"> {{ invalidInputs.c1[0] }} </i>
	                        </div>
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c2" class="m-0 p-0">Classes 2</label>
	                            <select v-model="editedTeacherClasses.length > 1 ? editedTeacherClasses[1] : ''" name="classe2" id="ed_t_c2" class="custom-select" :class="getInvalids('c2', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option  :value="classe.id"v-for="classe in secondaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c2 !== undefined"> {{ invalidInputs.c2[0] }} </i>
	                        </div>
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c3" class="m-0 p-0">Classes 3</label>
	                            <select v-model="editedTeacherClasses.length > 2 ? editedTeacherClasses[2] : ''"  name="classe3" id="ed_t_c3" class="custom-select" :class="getInvalids('c3', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :value="classe.id" v-for="classe in secondaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c3 !== undefined"> {{ invalidInputs.c3[0] }} </i>
	                        </div>
	                    </div>
				        
	                    <div class=" mx-auto mt-2 d-flex justify-content-around" style="width: 90%">
	                    	<div style="width: 31%;" class="">
	                            <label for="ed_t_ae" class="mb-0">Choisir comme AE de ...</label>
	                            <div class="w-100 d-flex justify-content-start border border-dark rounded p-1 pb-2">
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
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c4" class="m-0 p-0">Classes 4</label>
	                            <select v-model="editedTeacherClasses.length > 3 ? editedTeacherClasses[3] : ''" name="classe4" id="ed_t_c4" class="custom-select" :class="getInvalids('c4', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :value="classe.id" v-for="classe in secondaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c4 !== undefined"> {{ invalidInputs.c4[0] }} </i>
	                        </div>
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c5" class="m-0 p-0">Classes 5</label>
	                            <select v-model="editedTeacherClasses.length > 4 ? editedTeacherClasses[4] : ''" name="classe5" id="ed_t_c5" class="custom-select" :class="getInvalids('c5', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :value="classe.id" v-for="classe in secondaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c5 !== undefined"> {{ invalidInputs.c5[0] }} </i>
	                        </div>
	                    </div>
                    </div>
			    </form>
	      		</div>
			    <div class="mx-auto mt-2 p-1 pb-2 buttons-div" style="width: 90%">
			        <button type="button" class="btn btn-secondary mx-1 float-right" data-dismiss="modal" @click="resetEditedTeacher()">Annuler</button>
			        <button type="button" class="btn btn-primary float-right" @click="updateEdited(editedTeacher, token)">Mettre à jour</button>
			    </div>
			    <div class="mx-auto mt-2 p-1 pb-2 div-success" style="width: 90%; display: none">
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
            'editedTeacher', 'editedTeacherClasses', 'invalidInputs', 'subjects', 'successed', 'token', 'errors', 'editedTeacherIsAE', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects',
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

