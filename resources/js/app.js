import './bootstrap';
import { createApp,ref} from 'vue';
import App from './layouts/app.vue';
import router from './routes/router';
import store from './store/store';
import Loader from './commonComponent/pages/Loader.vue';
import eventBus from './Utils/AxiosConfig/eventBus.js';

const app = createApp(App);

var isLoading = ref(false);
app.provide('isLoading', isLoading);

app.use(router);
app.use(store); 

app.component('Loader', Loader);


eventBus.on('loading', (loading) => {
  isLoading.value= loading;
});

app.mount("#app");
