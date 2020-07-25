const teachers_mutations = {

	SHOW_TEACHERS_BY_LEVEL: (state, level) => {
		if(level == 'secondary'){
            state.pupils = state.secondaryPupils
            state.alertPupilsSearch = "Les eleves du secondaire"
        }
        else if (level == 'primary') {
            state.pupils = state.primaryPupils
            state.alertPupilsSearch = "Les eleves du primaire"
        }
        else if (level == 'all') {
            state.pupils = state.pupilsAll
            state.alertPupilsSearch = "Tous les apprenants"  
        }   
	}
}

export default teachers_mutations