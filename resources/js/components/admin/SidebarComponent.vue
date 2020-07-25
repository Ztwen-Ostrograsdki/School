<template>
	<div class="w-100 m-0 p-0">
		<header class="maskor-sup">
            <div class="w-100 m-0 p-0 border d-flex justify-content-between bg-linear-official-dark" style="background-color:;">
                <div class="d-lg-inline text-left" style="width: 20%;">
                    <a class="link-float w-100 h-100" href="#" id="open-admin-aside">
                        <span class="fa fa-school mr-2 mt-3" style="font-size: 30px"></span>
                        <span class="mr-2 d-none d-lg-inline text-white small">ADMINISTRATION</span>
                    </a>
                </div>
                <div class="ml-3 row" style="width: 60%;">
                    <div class="col-8 h-100">
                        <div class="w-100 d-flex justify-content-start h-100 pt-3" style="">
                            <form action="" class="bg-transparent h-50 d-none" id="form-admin-search" style="">
                                <input type="search" id="input" class="form-control bg-transparent border py-1 text-white d-inline-block" style="border: none; " placeholder="Enter your search...">
                                <button class="border text-white bg-linear-official rounded" style="border: none; width: 25%; padding-top: 6px; padding-bottom: 6px;">Search</button>
                                    <span class="fa fa-close mt-3 float-right" id="search-admin-close" style="cursor: pointer; display: none">
                                    </span>
                            </form>
                            <span class="fa fa-search mt-3 mx-1 position-relative" id="search-admin-link" style="cursor: pointer;">
                            </span>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-end py-3">
                        <div class="w-50 mr-2">
                            <form action="">
                                <select name="" id="" class="custom-select border-dark bg-transparent text-dark" style="">
                                    
                                </select>
                            </form>
                        </div>
                        <div class="w-auto m-0 p-0 mt-3">
                            <i class="fas fa-bell fa-1x fa-fw"></i>
                            <span class="badge badge-danger badge-counter position-relative" style="right:35%; bottom: 10px; font-size: 5px">3+</span>
                        </div>
                        <div class="mt-3">
                            <i class="fas fa-comments fa-1x text-gray-300"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="justify-content-center admins-link mt-2 d-none d-lg-flex" style="width: 15%;">
                    <div class="text-center" style="min-width:45%;">
                        <span class="nav-link w-100 admin-profil marker link-float" style="cursor: pointer;">
                            <span class="mr-2 d-none d-lg-inline text-white-600 small">Pirerre  </span>
                                <span class="fa fa-user-secret m-0 p-0" style="font-size: 20px"></span>
                            
                                <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                        </span>
                    </div>
                </div>
            </div>
            <admin-menu></admin-menu>
            <div class="login-profil profil-modal position-relative border bg-linear-official-50 border-white" style="width: 200px; display: none; top: 3px; z-index: 100;">
                <div class="w-100 border" style="">
                    <a class="w-100 link-float d-inline-block border m-0 py-1" href="#">
                        <img class="img-profile rounded-circle" src="/media/profil.png" alt="administration" width="25">
                        <span class="mr-2 d-none d-lg-inline text-dark float-right"></span>
                    </a>
                      <!-- Dropdown - User Information -->
                    <div class="w-100 border">
                            <a class="w-100 my-1 hover link-float" href="" style="border-radius: 30px;">
                                <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                              Profile
                            </a>
                            <a class="w-100 my-1 hover link-float" href="" style="border-radius: 30px;">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                              Administation
                            </a>
                                <a class="w-100 my-1 hover link-float" id="adminBecomeTeacherLink" href="#" style="border-radius: 30px;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                  Enseigner maintenant
                                </a>
                            <a class="w-100 my-1 hover link-float" id="makeUserLink" href="#" style="border-radius: 30px;">
                                <i class="fas fa-registered fa-sm fa-fw mr-2"></i>
                              Créer un utilisateur
                            </a>
                        <a class="w-100 py-1 hover link-float" href="#">
                             <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                          Activity Log
                        </a>
                        <a class="w-100 py-1 pb-2 hover border-top link-float" href="">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                          Logout
                        </a>
                        <form id="logout-form" action="" method="POST" style="display: none;">
                        </form>
                    </div>
                </div> 
            </div>
        </header>
        <pupil-perso :pupilData="editedPupil.name" :months="months" :secondaryClasses="secondaryClasses" :primaryClasses="primaryClasses" :secondarySubjects="secondarySubjects" ></pupil-perso>
	</div>
</template>


<script>
    import { mapState } from 'vuex'
	export default {

        computed: mapState([
            'editedPupil', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects', 'allSubjects', 'allRoles', 'allClasses', 'months'
        ])
        
	}
</script>