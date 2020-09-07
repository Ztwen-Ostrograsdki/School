<template>
    <div class="d-flex flex-column justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-180 px-3" >
        <transition name="scale" appear>
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
                            <span class="fa fa-2x">{{ ppl }}</span>
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
                                        <span class="fa fa-2x">{{ psl }}</span>
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
        </transition>
        <div class="w-100">
            <div class="w-100 my-1 m-0 p-1">
                <div class="w-100 row m-0 p-0 pl-lg-4">
                    <div class="col-3 row pr-2 p-0 mt-1 mb-0">
                        <p class="h5-title m-0 mr-3 p-0">Les premiers respo sont en <span class="text-primary">Bleu</span></p>
                        <p class="h5-title m-0 p-0">Les seconds respo sont en <span class="text-success">Vert</span></p>
                    </div>
                    <div class="float-right d-flex justify-content-around pr-2 mt-4 mb-0 border py-2" v-if="alert">
                        <p class="h5-title m-0 px-2">
                            <span class="mx-2 fa fa-envelope-open"></span>{{ message }}
                        </p>
                        <span class="mx-1 fa fa-close text-danger" @click="resetAlert()"></span>
                    </div>
                    <div class="offset-7 col-2 mb-0" v-if="!alert">
                        <span class="btn btn-primary m-0 px-3 float-right mt-1" title="Ajouter un nouvel apprenant..." data-toggle="modal" data-target="#newPupilPersoModal" @click="addNew()">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        
                    </div>
                </div>
                <hr class="m-0 mt-1" style="background-color: white">
            </div>
            <div class="pupils">
                <div class="container bg-transparent w-100 py-1">
                    <div class="d-flex w-100 my-1 justify-content-start">
                        <div class="mx-1 my-0">
                            <span class="fa fa-refresh text-white-50" @click="filtrer('all')" v-if="alertPupilsSearch !== 'Tous les apprenants'"></span>
                            <button class="btn btn-primary mx-1" @click="filtrer('primary')"> Le Primaire ({{ ' '+ ppl +' ' }}) </button>
                            <button class="btn btn-primary" @click="filtrer('secondary')">Le Secondaire ({{ ' '+ psl +' ' }})</button>
                        </div>
                        <h5 class="card-link mt-3 text-white-50 ml-3"> {{ alertPupilsSearch }}</h5>
                        <div class="position-absolute profiler" style="top: 150px; left: 10px; display: none">
                            <div class="profil-img">
                                <span class="photo"><img src="/media/hideface.jpg" width="250"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-100" style="min-height: 500px;">
                        <table class="table-table table-striped w-100">
                            <transition name="fadelow" appear>
                                <thead>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Sexe</th>
                                    <th>Naissance</th>
                                    <th>Inscrit depuis</th>
                                    <th>Classe</th>
                                    <th colspan="1">Actions</th>
                                </thead>
                            </transition>
                            <transition name="bodyfade" appear>
                                <tbody>
                                    <tr v-for="(pupil, k) in pupils" :key="pupil.id" class="border-bottom border-dark">
                                        <td>
                                            {{k+1}}
                                        </td>
                                        <td class="text-left">
                                            <router-link :to="{name: 'pupilsProfil', params: {id: pupil.id}}"   class="card-link d-inline-block" >
                                                <span  class="w-100 d-inline-block link-profiler"  @click="setEdited(pupil)">
                                                    {{pupil.name}}
                                                </span>
                                            </router-link>
                                            <a href="#" title="card-link Editer les informations de" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important" data-toggle="modal" data-target="#editPupilPersoModal" @click="getEdited(pupil)" @mouseout="closeProfiler()" @mouseover="openProfiler()"></a>
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
                                                {{pupilsArray[pupil.id].name}} <sup>{{pupilsArray[pupil.id].sup}}</sup>{{pupilsArray[pupil.id].idc}}
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <span class="d-inline-block w-100">
                                                <button title="Voulez vous supprimer" class="px-1 btn bg-transparent w-100" @click="destroy(pupil)">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </transition>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    import { mapState } from 'vuex'
    export default { 
        props : [],
        editedPupil: {}, 

        data() {
            return {
                selfMonths : [
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

                ],
                profiler: false
            }   
        },
        created(){
            this.$store.dispatch('getPupilsData')
        },

        methods :{
            gender(sexe){
                return sexe == "male" ? 'M' : 'F'
            },
            filtrer(level){
                this.$store.commit('SHOW_PUPILS_BY_LEVEL', level)
            },

            birthday(user)
            {
                let date = user.birth
                let parts = (date.split("-")).reverse()
                let day = parts[0]
                let m = (this.selfMonths[parts[1] - 1]).length > 5 ? (this.selfMonths[parts[1] - 1]).substring(0, 3) : this.selfMonths[parts[1] - 1]
                let year = parts[2]

                return day + " " + m + " " + year
            },
            destroy(pupil){
                this.$store.dispatch('lazyDeletePupils', pupil)                
            },

            closeProfiler(){
                this.profiler = false
                $(()=>{
                    $('.profiler').hide('fade', 500)
                })
            },
            openProfiler(){
                this.profiler = true

                $(()=>{
                    $('.profiler').show('fade', 500)
                })
            },

            getEdited(pupil){
                this.$store.dispatch('getTOOLS')
                this.$store.commit('RESET_INVALID_INPUTS')
                this.$store.dispatch('getAPupilData', pupil)

                
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

            addNew(){
                this.$store.commit('RESET_NEW_PUPIL')
                this.$store.dispatch('getTOOLS')
                this.$store.commit('RESET_INVALID_INPUTS')
                
                $('#newPupilPersoModal .div-success').hide('slide', 'up')
                $('#newPupilPersoModal .div-success h4').text('')
                $('#newPupilPersoModal form').show('fade', function(){
                    $('#newPupilPersoModal .buttons-div').show('fade')
                })
            },

            setEdited(pupil){
                this.$store.commit('SET_EDITED_PUPIL', pupil)
            },

            resetAlert(){
                this.$store.commit('ALERT_RESET')
            }
        },

        computed: mapState([
           'pupilsArray', 'pupils', 'secondaryPupils', 'primaryPupils', 'pupilsAll', 'pl', 'tl', 'ul', 'psl', 'ppl', 'tpl', 'tsl', 'alertPupilsSearch', 'alert', 'message', 'editedPupil', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects', 'allSubjects', 'allRoles', 'allClasses', 'months', 'successed', 'invalidInputs', 'errors'
        ])
    }

    $(function(){

    let sup_tag = $('#sup-tag')
    let sup_ch = $('#chevron-sup')
    let sec_tag = $('#sec-tag')
    let sec_ch = $('#chevron-sec')


    sec_ch.click(function(){

        sec_tag.animate({
            width: '0px',
            opacity: '0'
        })
        sec_tag.hide()
        sup_tag.animate({
            width: '100%',
            opacity: '1'
        },100 , function(){
            sup_tag.show('slide', {direction: 'right'})
        })

    })

    sup_ch.click(function(){

        sup_tag.animate({
            width: '0px',
            opacity: '0'
        })
        sup_tag.hide()
        sec_tag.animate({
            width: '100%',
            opacity: '1'
        },100 , function(){
            sec_tag.show('slide', {direction: 'right'})
        })

    })
})

</script>
<style>
    
</style>

