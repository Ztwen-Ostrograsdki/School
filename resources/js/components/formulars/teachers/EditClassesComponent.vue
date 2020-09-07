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
		        <form class="opac-form" id="teacher-classes-edit" style="display: none;" method="post">
		        	<input type="text" name="token" v-model="token" hidden="hidden">

		        	<!-- POUR LE PRIMAIRE -->
		        	<div class="w-100 mx-auto" v-if="editedTeacher.level == 'primary'">
		        		<div class="mx-auto mt-2 d-flex justify-content-center" style="width: 85%">
		        			<div style="width: 75%;">
	                            <label for="ed_t_c" class="m-0 p-0">Classes</label>
	                            <select name="classe" id="ed_t_c1" class="custom-select" :class="getInvalids('c1', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :disabled="classeRefused(classesRefused, classe.id)" :selected="wasSelected(editedTeacherClasses[0], classe.id)" :value="classe.id" v-for="classe in primaryClasses" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.classe !== undefined"> {{ invalidInputs.classe[0] }} </i>
	                        </div>
		        		</div>
		        	</div>
		        	<!-- POUR LE SECONDAIRE -->
                    <div class="w-100 mx-auto" v-if="editedTeacher.level == 'secondary'">
                    	<div class="mx-auto mt-2 d-flex justify-content-around" style="width: 90%">
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c1" class="m-0 p-0">Classes 1</label>
	                            <select name="classe1" id="ed_t_c1" class="custom-select" :class="getInvalids('c1', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :disabled="classeRefused(classesRefused, classe.id)" :selected="wasSelected(editedTeacherClasses[0], classe.id)" :value="classe.id" v-for="classe in classesConcernedByATeacher" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c1 !== undefined"> {{ invalidInputs.c1[0] }} </i>
	                        </div>
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c2" class="m-0 p-0">Classes 2</label>
	                            <select name="classe2" id="ed_t_c2" class="custom-select" :class="getInvalids('c2', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :disabled="classeRefused(classesRefused, classe.id)" :selected="wasSelected(editedTeacherClasses[1], classe.id)"  :value="classe.id"v-for="classe in classesConcernedByATeacher" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c2 !== undefined"> {{ invalidInputs.c2[0] }} </i>
	                        </div>
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c3" class="m-0 p-0">Classes 3</label>
	                            <select  name="classe3" id="ed_t_c3" class="custom-select" :class="getInvalids('c3', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :disabled="classeRefused(classesRefused, classe.id)" :selected="wasSelected(editedTeacherClasses[2], classe.id)" :value="classe.id" v-for="classe in classesConcernedByATeacher" > {{ classe.name }} </option>
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
	                            <select name="classe4" id="ed_t_c4" class="custom-select" :class="getInvalids('c4', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :disabled="classeRefused(classesRefused, classe.id)" :selected="wasSelected(editedTeacherClasses[3], classe.id)" :value="classe.id" v-for="classe in classesConcernedByATeacher" > {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c4 !== undefined"> {{ invalidInputs.c4[0] }} </i>
	                        </div>
	                        <div style="width: 31.7%;">
	                            <label for="ed_t_c5" class="m-0 p-0">Classes 5</label>
	                            <select name="classe5" id="ed_t_c5" class="custom-select" :class="getInvalids('c5', invalidInputs)">
	                                <option value="">Choisissez la classe</option>
	                                <option :disabled="classeRefused(classesRefused, classe.id)" :selected="wasSelected(editedTeacherClasses[4], classe.id)" :value="classe.id" v-for="classe in classesConcernedByATeacher"> {{ classe.name }} </option>
	                            </select>
	                            <i class="h5-title" v-if="invalidInputs !== undefined && invalidInputs.c5 !== undefined"> {{ invalidInputs.c5[0] }} </i>
	                        </div>
	                    </div>
                    </div>
			    </form>
	      		</div>
			    <div class="mx-auto mt-2 p-1 pb-2 buttons-div" style="width: 90%">
			        <button type="button" class="btn btn-secondary mx-1 float-right" data-dismiss="modal" @click="resetEditedTeacher()">Annuler</button>
			        <button type="button" class="btn btn-primary float-right" @click="updateEditedTeacherClasses(editedTeacher, token, editedTeacherIsAE)">Mettre à jour</button>
			    </div>
			    <div class="mx-auto mt-2 p-1 pb-2 div-success" style="width: 90%; display: none">
			    	<div class="d-flex justify-content-center w-100 p-2 my-1">
			    		<h4></h4>
			    	</div>
			        <div class="w-75 mx-auto d-flex justify-content-center">
			        	<button type="button" class="btn w-50 bg-transparent border shadow mx-1 px-1" data-dismiss="modal">Terminer</button>
			        </div>
			    </div>
			    <div class="mx-auto w-100 p-1 pb-2 div-confirm-classe-prim" style="display: none">
			    	<div class="w-100 p-2 my-1 mx-auto">
			    		<h4 class="text-center mx-auto text-warning w-75">Procédure de confirmation de classe</h4>
			    		<div class="mx-auto w-100">
			    			<p class="w-100 mx-auto text-center text-uppercase">
			    				Vous êtes sur le point de confier la classe de <span class="text-warning">{{ getEditedNewClasseName() }}</span> à {{ editedTeacher.name }} <br>
								<span class="text-uppercase">
			    				il était maître de la classe de la classe de <span class="text-danger"> {{ getEditedOldClasseName()}}</span>
			    				</span>
			    			</p>
			    			<div class="w-75 mx-auto mt-2">
			    				<h5 class="mx-auto w-100 text-center">Voulez-vous vraiment confirmer cette opération?</h5>
								<div class="mx-auto w-75 d-flex justify-content-center">
									<button class="btn btn-danger w-25 mx-1" data-dismiss="modal" @click="classesConfirm(false)">Annuler</button>
									<button class="btn btn-primary w-25 mx-1" @click="classesConfirm(true)">Confirmer</button>
								</div>
			    			</div>
			    		</div>
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
				classes: {},
				isAE: false
			}
		},
		created(){
			
            
        },

		
		methods: {
			resetEditedTeacher(){
				this.$store.commit('RESET_EDITED_TEACHER_CLASSES1_CONFIRM')
				this.$store.commit('RESET_EDITED_TEACHER')
			},

			wasSelected(tag, target){
				if(tag == target){
					return true
				}
				else{
					return false
				}
				
			},
			classesConfirm(request){
				if (request) {
					this.$store.commit('SET_CLASSES_CONFIRM', true)
					this.$store.dispatch('updateTeacherClasses', {teacher: this.editedTeacher, classes: this.classes, token: this.token, isAE: this.isAE})
				}
				else{
					this.$store.commit('RESET_EDITED_TEACHER_CLASSES1_CONFIRM')
					this.$store.commit('RESET_EDITED_TEACHER')
				}
				
			},

			getEditedOldClasseName(){
				if (this.editedTeacher.classe !== undefined &&  this.editedTeacher.level == "primary") {
					return this.editedTeacher.classe.name
				}
				else{
					return ""
				}
			},
			getEditedNewClasseName(){
				if (this.teacherHasNewClasse !== undefined && this.editedTeacher.level == "primary") {
					return this.classesConcernedByATeacher[this.teacherHasNewClasse].name
				}
				else{
					return ""
				} 
			},

			updateEditedTeacherClasses(teacher, token, isAE){
				let classes = {}
				if(teacher.level == "secondary"){
					classes = {
						c1: $('form#teacher-classes-edit select[name=classe1]').val(),
						c2: $('form#teacher-classes-edit select[name=classe2]').val(),
						c3: $('form#teacher-classes-edit select[name=classe3]').val(),
						c4: $('form#teacher-classes-edit select[name=classe4]').val(),
						c5: $('form#teacher-classes-edit select[name=classe5]').val()
					}
					this.$store.dispatch('updateTeacherClasses', {teacher, classes, token, isAE})
				}
				else if(teacher.level == "primary"){
					classes = {
						classe: $('form#teacher-classes-edit select[name=classe]').val()
					}

					if(teacher.classe !== null){
						if(teacher.classe.id == parseInt(classes.classe, 10)){
							//Ancienne classe choisie alors on ne fait rien
						}
						else{
							this.classes = classes
							this.isAE = isAE
							this.$store.commit('SET_EDITED_TEACHER_CLASSES1_CONFIRM', parseInt(classes.classe, 10))
							$('#editTeacherClassesModal .div-success').hide('slide', 'up')
			                $('#editTeacherClassesModal .div-success h4').text('')
			                $('#editTeacherClassesModal').animate({
			                    top: '20px'
			                })
			                
			                $('#editTeacherClassesModal .buttons-div').hide('fade', function(){
			                	$('#editTeacherClassesModal form').hide('slide', {direction: 'up'}, 1, function(){
				                	$('#editTeacherClassesModal .div-confirm-classe-prim').show('fade')
				                })
			                })

						}
						
					}
					
				}
					
			},
			
			getInvalids(input, invalids = this.invalidInputs){

				if(invalids !== undefined && invalids[input] !== undefined){
					return 'is-invalid'
				}
				else{
					return ''
				}
				
			},

			/**
			 * [classeRefused description]
			 * @param  {array} classes contient toutes les classes
			 * @param  {int} classe  id de la classe à cibler dans classes
			 * @return {string}         [description]
			 */
			classeRefused(classes, classe){

				return classes[classe] !== undefined ? true : false
				
			},

			disabledSelectedKeys(allInputs = [], current){
				// let disabled = ''
				// var b = $(function(){
				// 	let inputs = []
				// 	for (var i = 0; i < allInputs.length; i++) {
				// 		let input = $("form#teacher-classes-edit select[name=" + allInputs[i] + "]").val()
				// 		inputs.push(parseInt(input, 10))
				// 	}

				// 	if(inputs.indexOf(current) !== -1){
				// 		return disabled = "disabled"
				// 	}
				// 	else{
				// 		return disabled = ""
				// 	}
				// })
				// console.log(b)

				// return disabled
			}
			
		},

		computed: mapState([
            'editedTeacher', 'editedTeacherClasses', 'cl1', 'cl2', 'cl3', 'cl4', 'cl5', 'invalidInputs', 'subjects', 'successed', 'token', 'errors', 'editedTeacherIsAE', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects', 'classesConcernedByATeacher', 'classesRefused', 'confirm_primary_classe', 'teacherHasNewClasse', 'confirmTeacherClasses'
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

