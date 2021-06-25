import axios from 'axios'
import jwtToken from "../token"

const API = axios.create({
    baseURL: `https://cms.nemoviz.com/api/`,

});

export default API
