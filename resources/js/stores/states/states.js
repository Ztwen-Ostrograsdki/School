import auth_states from './authStates.js'
import pupils_states from './pupilsStates.js'
import teachers_states from './teachersStates.js'
import notifications_states from './notificationsStates.js'

const default_states = {
	pl: 0,
	ppl: 0,
	psl: 0,
	tl: 0,
	tpl: 0,
	tsl: 0,
	ul: 0,
	alert: false,
	message: "",
	primaryClasses: {},
	secondaryClasses: {},
	allClasses: {},
	primarySubjects: {},
	subjects: {},
	secondarySubjects: {},
	allSubjects: {},
	allRoles: [],
	months: [],
	type: "border-success",
	PBPLength: 0,
	PBSLength: 0,
    pupilsBlockedsLength: 0,
    invalidInputs: undefined,
    errors: {status: false, message: ''},
    successed: {status: false, message: ''}

}

const states = {
	...auth_states, ...teachers_states, ...pupils_states, ...notifications_states, ...default_states
}

export default states