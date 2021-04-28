import axios from "axios";
import jwtToken from "./token"

export const AXIOS = axios.create({
    baseURL: `http://127.0.0.1:8000/api/`,
    headers: {
        Authorization: `Bearer ${jwtToken.getToken()}`
    }
});
