import * as api from '../../Api/categoryApi';

export default {
    actions:{
        async addCategory( {commit},payload){
            const res = await api.addCategoryData(payload);
            return res;
        }
    }
}