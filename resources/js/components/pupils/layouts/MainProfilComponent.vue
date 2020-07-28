<template>
	<div class="d-flex justify-content-around w-100 m-0 p-0">
		<transition name="depperscale" appear>
			<div class="profil-img p-2">
				<div class="text-center" id="profil-photo">
					<div class="d-flex justify-content-between">
						<h3 class="">{{ targetPupil.name }}</h3>
					</div>
					<span class="photo fa fa-user-secret text-primary text-shadow" style="font-size: 6rem"></span>
				</div>
			</div>
		</transition>
		<div class="profil-school d-none d-lg-inline-block">
			<h3>COMPLEXE SCOLAIRE MON ECOLE</h3>
			<h3 align="center" class="position-relative" style="top: 10px; font-size: 4rem">{{targetPupilClasseFMT.name}}<sup>{{ targetPupilClasseFMT.sup }}</sup> {{ targetPupilClasseFMT.idc }}</h3>
		</div>
		<div class="profil-admin d-lg-inline-block d-sm-flex d-md-flex justify-content-sm-around justify-content-md-around">
			<div class="justify-content-center my-0 mt-sm-1 mt-md-1">
				<ul class="btn btn-news d-block list-unstyled p-0 my-0">
					<li class="nav-item dropdown mr-1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Consulter les notes <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"> Les notes 1er Trimestre</a>
                            
                        </div>
                    </li>
				</ul>
			</div>
			<div class="justify-content-center mt-1 mx-md-1 mx-sm-1 mx-lg-0">
				<ul class="btn btn-news d-block list-unstyled p-0 my-0">
					<li class="nav-item dropdown mr-1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="mr-2 rotate">
								<img src="/media/icons/menu.ico" alt="" width="30">
							</span> Options <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Emploi de temps</a>
                            <a class="dropdown-item" href="#">Comptabilité</a>
                            <a class="dropdown-item" href="#">Forum de ...</a>
                            <a class="dropdown-item" href="#">Inserer</a>
                        </div>
                    </li>
				</ul>
			</div>
			<div class="justify-content-center mt-1">
				<ul class="btn btn-news d-block list-unstyled p-0 my-0">
					<li class="nav-item dropdown mr-1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="mr-2 rotate">
								<img src="/media/icons/archives.png" alt="" width="30">
							</span>Archives<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">2019-2020</a>
                            <a class="dropdown-item" href="#">2018-2019</a>
                            <a class="dropdown-item" href="#">2017-2018</a>
                            <a class="dropdown-item" href="#">2016-2017</a>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
import { mapState } from 'vuex'
	export default{
		props: [],


		computed: mapState([
           'editedPupil', 'errors', 'targetPupil', 'targetPupilLastName', 'targetPupilFirstName', 'targetPupilClasseFMT', 'targetPupilBirthFMT'
        ])

	}
</script>

<style>
	.depperscale-enter-active, .depperscale-leave-active{
		transition: opacity 5s, transform 3s;
	}

	.depperscale-enter, .depperscale-leave-active{
		opacity: 0;
		transform: scale(0.1);
	}
</style>