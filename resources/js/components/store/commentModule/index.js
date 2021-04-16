import Vue from "vue";

import {  commentService } from  '../../../common/commentService'
import {FETCH_COMMENT,COMMENT_DELETE,COMMENT_RESET_STATE} from './action'
import {
    FETCH_START,FETCH_END,RESET_STATE,
} from './muntation';

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
   
    comments: [],
    ischeck: true,
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_COMMENT]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return commentService
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
 
    [COMMENT_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return commentService.destroy(slug);
    },
    [COMMENT_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.ischeck = true;
    },
    [FETCH_END](state, {data} ) {

        state.comments = data;

    },
 
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    comments(state) {
        return state.comments;
    },
   
};

export default {
    state,
    actions,
    mutations,
    getters
};