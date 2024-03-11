import actions from './actions.js';
import getters from './getters.js';
import mutations from './mutations.js';

const post = {
    namespace: true,
    state:{
        result:[],
    },
    ...actions,
    ...getters,
    ...mutations,
}

export default post