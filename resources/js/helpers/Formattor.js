module.exports = class BirthdayFormattor
{
	constructor(model){
		this.model = model
		this.months = [
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
        this.roles = {
			'teacher' : 'Enseignant',
			'admin' : 'Administrateur restreint',
			'superAdmin' : 'Administrateur directeur',
			'parent' : "Parents d'élèves",
			'user' : "Utilisateur",
			'master' : "Web Master",
			'admin-teacher' : "Administrateur restreint / Enseignant",
			'admin-parent' : "Administrateur restreint / Parent d'élèves",
			'teacher-parent' : "Enseignant / Parent d'élève",
			'admin-teacher-parent' : "Administrateur restreint / Enseignant / Parent d'élèves",
			'superAdmin-parent' : "Administrateur directeur / Parent d'élèves",
			'superAdmin-teacher' : "Administrateur directeur / Enseignant"
		}
		this.date = ''
	}

	getBirthday()
	{
		let date = this.model.birth
		let parts = (date.split("-")).reverse()
		let day = parts[0]
    	let m = this.months[parts[1]]
    	let year = parts[2]

    	return day + " " + month + " " + year
	}

}
