import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions/actions.js'
import mutations from './mutations/mutations.js'
import states from './states/states.js'


Vue.use(Vuex)

export default new Vuex.Store({


	state: states,

	actions: actions,

	mutations: mutations,

	getters: {
		
	}

	
})

