import axios from "../Utils/AxiosConfig/axiosConfig.js";

export const CheckLoginData = (payload) => axios.post(`http://localhost:8000/api/login`,payload);