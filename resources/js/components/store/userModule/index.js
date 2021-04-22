import Vue from "vue";

import {  userService } from  '../../../common/UserService'
import {FETCH_USER,USER_DELETE,USER_RESET_STATE,CREATE_USER, GET_USER_ID,USER_EDIT} from './action'
import {
    FETCH_START,FETCH_END,RESET_STATE,FETCH_ID_USER
} from './muntation';

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
   
    users: [],
    get_user:{
        username:"",
        email:"",
        password:"",
        password_again:"",
        account_type:0

    },
    run_check: true,
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_USER]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return userService
                .query()
                .then(({ data }) => {
                  
                    commit(FETCH_END, data);
                })
                .catch(error => {
                    console.log(data);
                    throw new Error(error);
                });
        }
    },

    [CREATE_USER]({state},data) {
    
        // console.log('CREATE_SECTION',data)  
            
        // console.log('STATE',state)  
        return userService.create(data);
      },
      [USER_EDIT]({ commit, state }, { slug, data }) {

        return userService.update(slug, data);
    },

    [GET_USER_ID]({ commit }, slug) {
        if (jwtToken.getToken()) {
            ApiService.setHeader();
        return userService
            .getbyid(slug)
            .then(({ data }) => {
                commit(FETCH_ID_USER, { data });
            })
            .catch(error => {
                throw new Error(error);
            });

        // }
        }
    },
 
    [USER_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return userService.destroy(slug);
    },
    [USER_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_USER](state) {
        state.run_check = true;
    },
    [FETCH_END](state, {data} ) {
      
        state.users = data;

    },
    [FETCH_ID_USER](state, { data }) {
        state.get_user = data.user;
    },
 
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    users(state) {
        return state.users;
    },
    get_user(state){
        return state.get_user;
    }
   
};

export default {
    state,
    actions,
    mutations,
    getters
};