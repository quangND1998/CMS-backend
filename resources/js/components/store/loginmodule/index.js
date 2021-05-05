import Vue from 'vue';
import axios from 'axios';
import API_URL from '../../../common/config';
import { LOGIN,LOGOUT} from '../actions/login';
import {  LOGIN_SUCCESS,PURGE_AUTH } from '../muntation/login';
import { PAGE_RESET_STATE } from '../actions/page';
import { RESET_STATE } from '../muntation/page';
import token from '../../../common/token';

const initialState = {
    pending: false,
    msg: "",
    token:"",
    user_name: '',
    auth: {
        email: "",
        password: ""
    },
    data: {
        
    },
    isAuthenticated: !!token.getToken()
}
export const state = { ...initialState };
export const actions = {
    [LOGIN]({ commit }, { email, password }) {
        return new Promise((resolve, reject) => {
            axios.post(API_URL + "/v1/login", { email, password }, {

    
            })
                .then(({ data }) => {

                    commit(LOGIN_SUCCESS, data);
                    resolve(data);
                })
                .catch(({ response }) => {
                    console.log(response);
                    commit(PURGE_AUTH, response.data);
                    // reject(response);
                });
        });
    },
    [PAGE_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
    ,
 
    [LOGOUT]({ commit }) {
        return new Promise((resolve, reject) => {
            axios.post(API_URL + "/logout", { "token":token.getToken() }, {

    
            })
                .then(({ data }) => {
                    // console.log('a');
                    commit(PURGE_AUTH, data);
                    resolve(data);
                })
        });
    },
 
    
}
export const mutations = {
    [LOGIN_SUCCESS](state, data) {
        console.log(data);
        state.isAuthenticated = true;
        state.pending = true;
        state.msg = data.msg
        token.saveToken(data.token)
    },
    [PURGE_AUTH](state, data) {
        console.log(data);
        state.isAuthenticated = false;
        state.auth.email = "";
        state.auth.password = "";
        state.pending = false;
        state.token = "";
        state.msg = "email or password wrong"
        state.data = data
        console.log(data);
        token.destroyToken();
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
 
    },
    // [LOGIN_ERORR](state, data) {
    //     state.isAuthenticated = true;
    //     token.saveToken()
    // }
    
    
};

const getters = {
    auth(state) {
    return state.auth;
  },
  
isAuthenticated(state) {
    return state.isAuthenticated;
    },
    msg(state) {
        return state.msg;
    },
    data(state) {
        return state.data;
    }
};

export default {
  state,
  actions,
  mutations,
  getters
};