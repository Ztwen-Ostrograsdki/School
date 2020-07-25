const pupils_actions = {
	getPupilsData: (state) => {
		axios.get('/admin/director/pupilsm/DATA&for&pupils')
             .then(response => {
             	state.commit('GET_PUPILS_DATA', response.data)

        })
	},
    getAPupilData: (state, pupil) => {
        axios.get('/admin/director/pupilsm/get&classe&of&pupil&with&data&credentials/id=' + pupil.id)
            .then(response => {
                state.commit('GET_A_PUPIL_DATA', response.data)
            })
            .catch(e => {
               state.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
            })
    },
    updateAPupilData: (state, pupil) => {
        axios.put('/admin/director/pupilsm/update/update&perso/id=' + pupil.id, {
            name: pupil.name,
            birth: pupil.birth,
            classe_id: pupil.classe_id,
            month: pupil.month,
            year: pupil.year,
            sexe: pupil.sexe
        })
        .then(response => {
            if(response.data.errors == undefined){
                state.commit('RESET_INVALID_INPUTS')
                state.commit('GET_PUPILS_DATA', response.data)
                state.commit('SUCCESSED', 'Mis à jour des données réussie')
                
                $('#exampleModal .buttons-div').hide('size', function(){
                    $('#exampleModal form').hide('fade', function(){
                        $('#exampleModal').animate({
                            top: '150'
                        }, function(){
                            $('#exampleModal .div-success').show('fade', 200)
                            $('#exampleModal .div-success h4').text('Mise à jour reussi')
                        })
                        
                    })
                    
                })
                
            }
            else{
                console.log(response.data.errors)
                state.commit('INVALID_INPUTS', response.data.errors)
            }
            
        })
        .catch(e => {
           state.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
        })
    },

	lazyDeletePupils: (state, pupil) => {
		axios.delete('/admin/director/pupilsm/' + pupil.id)
             .then(response => {
            	state.commit('GET_PUPILS_DATA', response.data)
                state.commit('ALERT_MAKER', "L'élève " + pupil.name + " a été envoyé dans la corbeille avec succès!")
            	
        })
	},

    restorePupils: (state, pupil) => {
        axios.put('/admin/director/pupilsm/restore/id=' + pupil.id)
            .then(response => {
                state.commit('GET_PUPILS_DATA', response.data)
                state.commit('ALERT_MAKER', "L'élève " + pupil.name + " a été restauré avec succès!")
            })
            .catch(e => {
               state.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
            })
    }

}

export default pupils_actions
