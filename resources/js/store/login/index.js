import actions from "./actions";
import getters from "./getters";
import mutations from "./mutations";

const login ={
    namespace:true,
    state:{
      result:[]  
    },
    ...actions,
    ...getters,
    ...mutations
}
export default login