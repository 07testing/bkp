import axios from "../Utils/AxiosConfig/axiosConfig.js";

export const getProductSallingList = () => axios.get(`https://jsonplaceholder.typicode.com/posts`);