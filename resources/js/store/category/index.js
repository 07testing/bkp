import actions from "./actions";
// import getters from "./getters";
import mutations from "./mutations";

const category = {
    namespace:true,
    state:{
        result:[]
    },
    ...actions,
    // ...getters,
    ...mutations,

}
export default category