import Vue from "vue";

import {  contactService } from  '../../../common/contactService'
import {FETCH_CONTACT,CONTACT_DELETE,CONTACT_RESET_STATE} from './action'
import {
    FETCH_START,FETCH_END,RESET_STATE,
} from './muntation';

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
   
    contacts: [],
    check: true,
    contact: {
        contact_name: "",
        contact_email:"",
        contact_message:""
  
    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_CONTACT]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return contactService
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
 
    [CONTACT_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return LoaiTinService.destroy(slug);
    },
    [CONTACT_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.check = true;
    },
    [FETCH_END](state, {data} ) {
   
        state.contacts = data;

    },
 
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    contacts(state) {
        return state.contacts;
    },
    contact(state) {
        return state.contact;
    },

   
};

export default {
    state,
    actions,
    mutations,
    getters
};