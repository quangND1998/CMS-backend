import Vue from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import API_URL from "./config";
import jwtToken from "./token";

const ApiService = {
    init() {
        Vue.use(VueAxios, axios);
        Vue.axios.defaults.baseURL = API_URL;
    },
    setHeader() {
        axios.defaults.headers[
            "Authorization"
        ] = `Bearer ${jwtToken.getToken()}`;
    },

    query(resource) {
        return axios.get(API_URL + "/" + resource).catch(error => {
            throw new Error(`[RWV] ApiService ${error}`);
        });
    },

    get(resource, slug) {
        return axios.get(API_URL + "/" + resource + "/" + slug).catch(error => {
            throw new Error(`[RWV] ApiService ${error}`);
        });
    },

    post(resource, params) {
        // console.log('apiservice', params);
        return axios.post(API_URL + "/" + resource, params);
    },

    update(resource, params, slug) {
        // console.log('apiservice_update', params);
        return axios.post(API_URL + "/" + resource + "/" + slug, params);
    },

    put(resource, params) {
        return axios.put(API_URL + "/" + resource, params);
    },

    delete(resource) {
        return axios.delete(API_URL + "/" + resource).catch(error => {
            throw new Error(`[RWV] ApiService ${error}`);
        });
    }
};

export default ApiService;