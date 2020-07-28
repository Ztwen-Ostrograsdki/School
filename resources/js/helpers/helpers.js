const selfMonths = [
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

const helpers = {
	methods: {

		birthday(user, limit = 3){
			let m
	        let date = user.birth
	        let parts = (date.split("-")).reverse()
	        let day = parts[0]

	        if(limit > 5 || limit == 0){
	        	m = (selfMonths[parts[1] - 1]).length > 5 ? (selfMonths[parts[1] - 1]) : selfMonths[parts[1] - 1]
	        }
	        else{
	        	m = (selfMonths[parts[1] - 1]).length > 5 ? (selfMonths[parts[1] - 1]).substring(0, limit) : selfMonths[parts[1] - 1]

	        }
	        
	        let year = parts[2]

	        return day + " " + m + " " + year
		}
	}
}

export default helpers