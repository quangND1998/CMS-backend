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
    user: {
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
                    // console.log('a');
                    commit(LOGIN_SUCCESS, data);
                    resolve(data);
                })
                .catch(({ response }) => {
                    // console.log('b');
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
        commit(PURGE_AUTH)
    },
 
    
}
export const mutations = {
    [LOGIN_SUCCESS](state, data) {
        state.isAuthenticated = true;
        state.pending = true;
        state.msg = data.msg
        token.saveToken(data.token)
    },
    [PURGE_AUTH](state, data) {
        state.isAuthenticated = false;
        state.user.email = "";
        state.user.password = "";
        state.pending = false;
        state.token = "";
        state.msg = "email or password wrong"
        state.data = data
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
  user(state) {
    return state.user;
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