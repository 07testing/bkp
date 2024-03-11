import * as api from '../../Api/postApi';

export default {
    actions:{
        async getSallingList( {commit},payload){
            const res = await api.getProductSallingList(payload);
            commit('mutationSallingData',res);
            return res;
        }
    }
}