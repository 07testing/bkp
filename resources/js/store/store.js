import { createStore } from 'vuex';
import post from './post';
import category from './category';
import login from './login';
export default createStore({
    modules:{
        post:post,
        category:category,
        login:login
    }
});
