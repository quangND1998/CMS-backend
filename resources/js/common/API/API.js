import axios from 'axios'
import jwtToken from "../token"

const API = axios.create({
    baseURL: `http://127.0.0.1:8000/api/`,
    headers: {
        Authorization: `Bearer ${jwtToken.getToken()}`
    }
});

export default API