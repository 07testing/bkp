import axios from "../Utils/AxiosConfig/axiosConfig.js";

export const addCategoryData = (payload) => axios.post(`http://localhost:8000/api/addCategory`,payload);