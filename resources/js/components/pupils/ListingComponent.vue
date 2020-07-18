<template>
	<div class="d-flex flex-column justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-180" >
		<div class="d-flex justify-content-around py-1 w-100">
			<div class="d-flex row justify-content-around" style="width: 100%">
				<div class="border py-2 col-lg-5 col-md-12">
					<div class="w-100 d-flex justify-content-between">
						<div class="">
							<h5 class="h5-title">Le Primaire</h5>
						</div>
						<div class="">
							<span class="fa fa-close float-right p-1"></span>
						</div>
					</div>
					<hr class="m-0" style="background-color: white">
					<div class="mt-1 w-100">
						<div class="w-100 d-flex justify-content-between">
							<span class="fa fa-user fa-2x" ></span>
							<span class="fa fa-2x">{{ primaryPupilsLength }}</span>
						</div>
						<div class="w-100 d-block">
							<span class="w-100 d-flex justify-content-around">
								<span class="m-0 p-0">
									<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
								</span>
								<span class="m-0 p-0">
									<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
								</span>
							</span>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 border">
					<div class="py-2" id="sup-tag" style="display: none; width: 0; opacity: 0">
						<div class="d-flex justify-content-between tag-container" style="width: 100%">
							<div style="width: 98.5%">
								<div class="d-flex justify-content-between">
									<div class="">
										<h5 class="h5-title">Le Supérieur</h5>
									</div>
									<div class="">
										<span class="fa fa-close float-right p-1"></span>
									</div>
								</div>
								<hr class="m-0" style="background-color: white">
								<div class="mt-1 w-100">
									<div class="w-100 d-flex justify-content-between">
										<span class="fa fa-user fa-2x text-white" ></span>
										<span class="fa fa-2x">700</span>
									</div>
									<div class="w-100 d-block">
										<span class="w-100 d-flex justify-content-around">
											<span class="m-0 p-0">
												<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
											</span>
											<span class="m-0 p-0">
												<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
											</span>
										</span>
									</div>
								</div>
							</div>
							<div class="py-4 float-right ml-3">
								<span class="fa fa-chevron-left float-right" id="chevron-sup" style="font-size: 12px;"></span>
							</div>
						</div>
					</div>
					<div class="py-2" id="sec-tag" style="width: 100%">
						<div class="d-flex justify-content-between tag-container" style="width: 100%">
							<div style="width: 98.5%">
								<div class="d-flex justify-content-between">
									<div class="">
										<h5 class="h5-title">Le Secondaire</h5>
									</div>
									<div class="">
										<span class="fa fa-close float-right p-1"></span>
									</div>
								</div>
								<hr class="m-0" style="background-color: white">
								<div class="mt-1 w-100">
									<div class="w-100 d-flex justify-content-between"> 
										<span class="fa fa-user fa-2x text-white" ></span>
										<span class="fa fa-2x">{{ secondaryPupilsLength }}</span>
									</div>
									<div class="w-100 d-block">
										<span class="w-100 d-flex justify-content-around">
											<span class="m-0 p-0">
												<i class="text-white-50 h5-title ">Meilleur:</i> <i class="text-white-50 h5-title ">Jean Maillote [18.89] </i>
											</span>
											<span class="m-0 p-0">
												<i class="text-white-50 h5-title ">Faible:</i> <i class="text-white-50 h5-title ">Origi France [06.88] </i>
											</span>
										</span>
									</div>
								</div>
							</div>
							<div class="py-4 float-right ml-3">
								<span class="fa fa-chevron-left float-right" id="chevron-sec" style="font-size: 12px;"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<span class="fa fa-chevron-up"></span>
			</div>
		</div>
		<div class="w-100">
			<div class="w-100 my-1 p-1">
				<div class="w-100 d-flex justify-content-between">
					<div class="float-right d-flex justify-content-between pr-2 mt-4 mb-0">
						<p class="h5-title m-0 mr-3">Les premiers respo sont en <span class="text-primary">Bleu</span></p>
						<p class="h5-title m-0">Les seconds respo sont en <span class="text-success">Vert</span></p>
					</div>
				</div>
				<hr class="m-0 mt-1" style="background-color: white">
			</div>
			<div class="pupils">
				<div class="container bg-transparent w-100 py-1">
				<div class="d-flex w-100 my-1 justify-content-start">
					<div class="mx-1">
						<span class="fa fa-refresh text-white-50" @click="filtrer('all')" title="Cliquez pour lister tous les apprenants" v-if="alert != 'Tous les apprenants'"></span>
						<button class="btn btn-primary mx-1" @click="filtrer('primary')" title="Cliquez pour lister les apprenants du primaire">Le Primaire ({{ ' '+ primaryPupilsLength +' ' }}) </button>
						<button class="btn btn-primary" @click="filtrer('secondary')" title="Cliquez pour lister les apprenants du secondaire">Le Secondaire ({{ ' '+ secondaryPupilsLength +' ' }})</button>
					</div>
					<h5 class="card-link mt-3 text-white-50 ml-3">{{alert}}</h5>
				</div>
				<div class="w-100" style="min-height: 500px;">
					<table class="table-table table-striped w-100">
						<thead>
							<th>No</th>
							<th>Name</th>
							<th>Sexe</th>
							<th>Naissance</th>
							<th>Inscrit depuis</th>
							<th>Classe</th>
							<th colspan="2">Actions</th>
						</thead>
						<tbody>
								
							<tr v-for="(pupil, k) in pupils" :key="pupil.id" class="border-bottom border-dark">
								<td>
									{{k+1}}
								</td>
								<td class="text-left">
									<router-link to='/pupilsm/profil' class="card-link d-inline-block">
										{{pupil.name}}
									</router-link>
									<a href="#" title="card-link Editer les informations de" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important"></a> 
								</td>
								<td>
									{{gender(pupil.sexe)}}
								</td>
								<td>
									{{birthday(pupil)}}
								</td>
								<td>
									{{pupil.month + ' ' + pupil.year}}
								</td>
								<td>
									<a class="card-link w-100 d-inline-block" href="">
										{{allDATA[pupil.id].name}} <sup>{{allDATA[pupil.id].sup}}</sup>{{allDATA[pupil.id].idc}}
									</a>
								</td>
								
								<td>
									<ul class="navbar-nav ml-auto bg-transparent rounded">
										<li class="nav-item dropdown mr-1">
			                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
			                                     <span class="caret"></span>
			                                </a>
			                                

			                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			                                </div>
			                            </li>
			                        </ul>    
								</td>
								<td>
									<span class="d-inline-block w-100">
										<button title="Voulez vous supprimer" class="btn btn-danger w-100" @click='destroy(pupil.id)'>Blocké</button>
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
</template>

<script>
    export default {

    	data() {
    		return {
    			allDATA : [],
    			secondaryPupils : [],
    			primaryPupils : [],
    			pupils: [],
    			pupilsAll: [],
    			pupilsLength: 0,
    			secondaryPupilsLength: 0,
    			primaryPupilsLength: 0,
    			alert: "Tous les apprenants",
    			success : false,
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
    		axios.get('/admin/director/pupilsm/DATA&for&pupils')
    			 	.then(response => {
    			 			this.pupils = response.data.p
    			 			this.pupilsAll = response.data.p
    			 			this.secondaryPupils = response.data.pSec
    			 			this.primaryPupils = response.data.pPrim
    			 			this.allDATA = response.data.all
    			 			this.pupilsLength = this.pupils.length
			    			this.secondaryPupilsLength = this.secondaryPupils.length
			    			this.primaryPupilsLength = this.primaryPupils.length
    			 		}
    			 	)
    	},

    	methods: {
    		filtrer(tag){
    			
    			if(tag == 'secondary'){
    				this.pupils = this.secondaryPupils
    				this.alert = "Les eleves du secondaire"
    			}
    			else if (tag == 'primary') {
    				this.pupils = this.primaryPupils
    				this.alert = "Les eleves du primaire"
    			}
    			else if (tag == 'all') {
    				this.pupils = this.pupilsAll
    				this.alert = "Tous les apprenants"	
    			}	
    					
    			
    		},

    		destroy(user){
    			axios.delete('/admin/director/pupilsm/' + user)
    				.then(response => {
    			 			this.pupils = response.data.p
    			 			this.pupilsAll = response.data.p
    			 			this.secondaryPupils = response.data.pSec
    			 			this.primaryPupils = response.data.pPrim
    			 			this.allDATA = response.data.all
    			 			this.pupilsLength = this.pupils.length
			    			this.secondaryPupilsLength = this.secondaryPupils.length
			    			this.primaryPupilsLength = this.primaryPupils.length
			    			this.success = true
    			 		}
    			 	)
    		},

    		gender(sexe){
    			return sexe == "male" ? 'M' : 'F'
    		},

    		birthday(user)
    		{
    			let date = user.birth
				let parts = (date.split("-")).reverse()
				let day = parts[0]
		    	let m = (this.months[parts[1] - 1]).length > 5 ? (this.months[parts[1] - 1]).substring(0, 3) : this.months[parts[1] - 1]
		    	let year = parts[2]

		    	return day + " " + m + " " + year
    		}
    	}
    }
</script>