import axios from 'axios'
import jwtToken from "../token"

const API = axios.create({
    baseURL: `https://3dscan.nemoviz.com/api/`,

});

export default API
