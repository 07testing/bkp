// axios.js

import axios from 'axios';
import eventBus from './eventBus';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

var methodType;
axios.interceptors.request.use(
  (config) => {
    methodType = config.method;
    eventBus.emit('loading', true); 
    return config;
  },
  (error) => {
    eventBus.emit('loading', false);
    return Promise.reject(error);
  }
);

axios.interceptors.response.use(
  (response) => {;
    if(methodType !== 'get'){
        toast.success(response.data.message, { autoClose: 1000});
    }
    eventBus.emit('loading', false); 
    return response;
  },
  (error) => {
    toast.success(error, { autoClose: 1000});
    eventBus.emit('loading', false);
    return Promise.reject(error);
  }
);

export default axios;
