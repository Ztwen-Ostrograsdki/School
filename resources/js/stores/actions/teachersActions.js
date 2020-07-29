const teachers_actions = {
	getTeachersData: (store) => {
		axios.get('/admin/director/teachersm/DATA&for&teachers')
            .then(response => {
             	store.commit('GET_TEACHERS_DATA', response.data)
        })
	},
    getATeacherData: (store, teacher) => {
        axios.get('/admin/director/teachersm/get&classes&of&teacher&with&data&credentials/id=' + teacher.id)
            .then(response => {
                store.commit('GET_A_TEACHER_DATA', response.data)
            })
            .catch(e => {
               store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
            })
    },
    updateATeacherData: (store, inputs) => {
        // axios.put('/admin/director/teachersm/update/update&perso/id=' + inputs.teacher.id, {
        //     // token: inputs.token,
        //     // name: inputs.pupil.name,
        //     // birth: inputs.pupil.birth,
        //     // classe_id: inputs.pupil.classe_id,
        //     // month: inputs.pupil.month,
        //     // year: inputs.pupil.year,
        //     // sexe: inputs.pupil.sexe
        // })
        // .then(response => {
        //     if(response.data.invalidInputs == undefined){
        //         store.commit('RESET_INVALID_INPUTS')
        //         store.commit('GET_TEACHERS_DATA', response.data)
        //         store.commit('UPDATE_TARGET_TEACHER', {})
        //         store.commit('SUCCESSED', 'Mis à jour des données réussie')
                
        //         $('#exampleModal .buttons-div').hide('size', function(){
        //             $('#exampleModal form').hide('fade', function(){
        //                 $('#exampleModal').animate({
        //                     top: '150'
        //                 }, function(){
        //                     $('#exampleModal .div-success').show('fade', 200)
        //                     $('#exampleModal .div-success h4').text('Mise à jour reussi')
        //                 })
                        
        //             })
                    
        //         })
                
        //     }
        //     else{
        //         store.commit('INVALID_INPUTS', response.data.invalidInputs)
        //     }
            
        // })
        // .catch(e => {
        //    store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
        // })
    },
    addANewTeacher: (store, inputs) => {
        axios.post('/admin/director/teachersm', {
            token: inputs.token,
            name: inputs.newPupil.name,
            birth: inputs.newPupil.birth,
            level: inputs.newPupil.level,
            classe_id: inputs.newPupil.classe_id,
            month: inputs.newPupil.month,
            year: inputs.newPupil.year,
            sexe: inputs.newPupil.sexe,
            status: 0
        })
        .then(response => {
            if(response.data.invalidInputs == undefined){
                store.commit('RESET_INVALID_INPUTS')
                store.commit('GET_TEACHERS_DATA', response.data)
                store.commit('RESET_NEW_TEACHER')
                store.commit('SUCCESSED', 'Insertion des données réussie')
                
                $('#newTeacherPersoModal .buttons-div').hide('size', function(){
                    $('#newTeacherPersoModal form').hide('fade', function(){
                        $('#newTeacherPersoModal').animate({
                            top: '150'
                        }, function(){
                            $('#newTeacherPersoModal .div-success').show('fade', 200)
                            $('#newTeacherPersoModal .div-success h4').text('Mise à jour reussi')
                        })
                        
                    })
                    
                })
                
            }
            else{
                store.commit('INVALID_INPUTS', response.data.invalidInputs)
            }
            
        })
        .catch(e => {
           store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
        })
    },

	lazyDeleteTeachers: (store, teacher) => {
		axios.delete('/admin/director/teachersm/' + teacher.id)
             .then(response => {
            	store.commit('GET_TEACHERS_DATA', response.data)
                store.commit('ALERT_MAKER', "L'enseignant " + teacher.name + " a été envoyé dans la corbeille avec succès!")
            	
        })
	},

    restoreTeacher: (store, teacher) => {
        // axios.put('/admin/director/teachersm/restore/id=' + teacher.id)
        //     .then(response => {
        //         store.commit('GET_TEACHERS_DATA', response.data)
        //         store.commit('ALERT_MAKER', "L'enseignant " + teacher.name + " a été restauré avec succès!")
        //     })
        //     .catch(e => {
        //        store.commit('ALERT_MAKER', "L'opération a échoué: Echec de connexion au serveur! Veuillez réessayer!")
        //     })
    }

}

export default teachers_actions