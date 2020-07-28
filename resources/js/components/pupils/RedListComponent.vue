<template>
    <div class="d-flex flex-column justify-content-around py-1 w-100 border float-right mx-0 bg-linear-official-180" >
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
                            <span class="fa fa-2x">{{ PBPLength }}</span>
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
                                        <span class="fa fa-2x">{{ PBSLength }}</span>
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
            <div class="w-100 my-1 p-1">
                <div class="w-100 d-flex justify-content-between">
                    <div class="float-right d-flex justify-content-between pr-2 mt-4 mb-0">
                        <p class="h5-title m-0 mr-3">Les premiers respo sont en <span class="text-primary">Bleu</span></p>
                        <p class="h5-title m-0">Les seconds respo sont en <span class="text-success">Vert</span></p>
                    </div>
                    <div class="float-right d-flex justify-content-around pr-2 mt-4 mb-0 border py-2" :class="type" v-if="alert">
                        <p class="h5-title m-0 px-2">
                            <span class="mx-2 fa fa-envelope-open"></span>{{ message }}
                        </p>
                        <span class="mx-1 fa fa-close text-danger" @click="resetAlert()"></span>
                    </div>
                </div>
                <hr class="m-0 mt-1" style="background-color: white">
            </div>
            <div class="pupils">
                <div class="container bg-transparent w-100 py-1">
                <div class="d-flex w-100 my-1 justify-content-start">
                    <div class="mx-1">
                        <span class="fa fa-refresh text-white-50" @click="filtrer('all')" v-if="alertPupilsSearch !== 'Tous les apprenants'"></span>
                        <button class="btn btn-primary mx-1" @click="filtrer('primary')"> Le Primaire ({{ ' '+ PBPLength +' ' }}) </button>
                        <button class="btn btn-primary" @click="filtrer('secondary')">Le Secondaire ({{ ' '+ PBSLength +' ' }})</button>
                    </div>
                    <h5 class="card-link mt-3 text-white-50 ml-3"> {{ alertPupilsSearch }}</h5>
                </div>
                <div class="w-100" style="min-height: 500px;">
                    <table class="table-table table-striped w-100">
                        <transition name="fadelow" appear>
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Sexe</th>
                                <th class="d-lg-block d-none">Naissance</th>
                                <th>Inscrit depuis</th>
                                <th>Classe</th>
                                <th>Actions</th>
                            </thead>
                        </transition>
                        <transition name="bodyfade" appear>
                        <tbody>
                            <tr v-for="(pupil, k) in pupilsBlockeds" :key="pupil.id" class="border-bottom border-dark">
                                <td>
                                    {{k+1}}
                                </td>
                                <td class="text-left">
                                    <router-link :to="{name: 'pupilsProfil', params: {id: pupil.id}}"   class="card-link d-inline-block">
                                        {{pupil.name}}
                                    </router-link>
                                    <a href="#" title="Editer les informations de" class="fa fa-edit text-white-50 float-right" style="font-size: 10px!important; font-weight: 200!important" data-toggle="modal" data-target="#exampleModal" @click="getEdited(pupil)"></a> 
                                </td>
                                <td>
                                    {{gender(pupil.sexe)}}
                                </td>
                                <td class="d-lg-block d-none">
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
                                    <span class="d-flex justify-content-between w-100">
                                        <button title="Restaurer cet élève" class="btn bg-secondary" style="width: 48%;" @click="restore(pupil)">
                                            <i class="fa fa-recycle text-success"></i>
                                        </button>
                                        <button title="Supprimer définitement cet élève" class="btn bg-info"  style="width: 48%;">
                                            <i class="fa fa-user-times text-danger"></i>
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

        data() {
            return {
               
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
            this.$store.dispatch('getPupilsData')
            this.$store.dispatch('getTOOLS')
        },

        methods :{
            gender(sexe){
                return sexe == "male" ? 'M' : 'F'
            },

            filtrer(level){
                this.$store.commit('SHOW_PUPILS_BY_LEVEL', level, false)
            },

            birthday(user)
            {
                let date = user.birth
                let parts = (date.split("-")).reverse()
                let day = parts[0]
                let m = (this.months[parts[1] - 1]).length > 5 ? (this.months[parts[1] - 1]).substring(0, 3) : this.months[parts[1] - 1]
                let year = parts[2]

                return day + " " + m + " " + year
            },
            restore(pupil){
                this.$store.dispatch('restorePupils', pupil)
                
            },
            getEdited(pupil){
                this.$store.commit('RESET_INVALID_INPUTS')
                this.$store.dispatch('getAPupilData', pupil)

                
                $('#exampleModal .div-success').hide('slide', 'up')
                $('#exampleModal .div-success h4').text('')
                $('#exampleModal').animate({
                    top: '100'
                })
                
                $('#exampleModal form').show('slide', {direction: 'up'}, 1, function(){
                    $('#exampleModal form').animate({
                        opacity: '0'
                    }, function(){
                        $('#exampleModal form').animate({
                            opacity: '1'
                        }, 800)
                        $('#exampleModal .buttons-div').show('fade')
                    })
                })
            },

            resetAlert(){
                this.$store.commit('ALERT_RESET')
            }

        },

        computed: mapState([
             'pupilsBlockeds', 'pupilsBlockedsAll', 'PSBlockeds', 'PPBlockeds', 'pupilsArray', 'pupilsBlockedsLength', 'PBPLength', 'PBSLength', 'alertPupilsSearch', 'alert', 'type', 'message', 'editedPupil', 'primaryClasses', 'secondaryClasses', 'primarySubjects', 'secondarySubjects', 'allSubjects', 'allRoles', 'allClasses', 'months', 'successed', 'invalidInputs'
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

