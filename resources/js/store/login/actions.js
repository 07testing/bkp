import * as api from '../../Api/loginApi';
export default {
    actions:{
        async checkLoging({commit},payload){
            const res = await api.CheckLoginData(payload);
            console.log("login");
            commit("mutationLogin",res);
            return res;
        }
    }
}