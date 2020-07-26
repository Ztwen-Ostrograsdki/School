const pupils_actions = {
	getPupilsData: (store) => {
		axios.get('/admin/director/pupilsm/DATA&for&pupils')
             .then(response => {

             	store.commit('GET_PUPILS_DATA', response.data)
        })
	},
    getAPupilData: (store, pupil) => {
        axios.get('/admin/director/pupilsm/get&classe&of&pupil&with&data&credentials/id=' + pupil.id)
            .then(response => {
                store.commit('GET_A_PUPIL_DATA', response.data)
            })
            .catch(e => {
               store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
            })
    },
    updateAPupilData: (store, inputs) => {
        axios.put('/admin/director/pupilsm/update/update&perso/id=' + inputs.pupil.id, {
            token: inputs.token,
            name: inputs.pupil.name,
            birth: inputs.pupil.birth,
            classe_id: inputs.pupil.classe_id,
            month: inputs.pupil.month,
            year: inputs.pupil.year,
            sexe: inputs.pupil.sexe
        })
        .then(response => {
            if(response.data.invalidInputs == undefined){
                store.commit('RESET_INVALID_INPUTS')
                store.commit('GET_PUPILS_DATA', response.data)
                store.commit('SUCCESSED', 'Mis à jour des données réussie')
                
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
                console.log(response.data.invalidInputs)
                store.commit('INVALID_INPUTS', response.data.invalidInputs)
            }
            
        })
        .catch(e => {
           store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
        })
    },

	lazyDeletePupils: (store, pupil) => {
		axios.delete('/admin/director/pupilsm/' + pupil.id)
             .then(response => {
            	store.commit('GET_PUPILS_DATA', response.data)
                store.commit('ALERT_MAKER', "L'élève " + pupil.name + " a été envoyé dans la corbeille avec succès!")
            	
        })
	},

    restorePupils: (store, pupil) => {
        axios.put('/admin/director/pupilsm/restore/id=' + pupil.id)
            .then(response => {
                store.commit('GET_PUPILS_DATA', response.data)
                store.commit('ALERT_MAKER', "L'élève " + pupil.name + " a été restauré avec succès!")
            })
            .catch(e => {
               store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
            })
    }

}

export default pupils_actions
