import Vue from "vue";

import {  LoaiTinService } from  '../../../common/LoaiTinService'
import {FETCH_LOAI_TIN,LOAI_TIN_DELETE,LOAI_TIN_EDIT,LOAI_TIN_RESET_STATE,LOAI_TIN_PUBLISH, GET_LOAI_TIN_ID} from './action'
import {
    FETCH_START,FETCH_ID_LOAI_TIN,FETCH_END,RESET_STATE,
} from './muntation';

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
    time:'aaaaaaaaaaaaaaa',
    loaitins: [],
    isRun: true,
    loaitin: {
        Ten: "",
        theloai_id:""
  
    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_LOAI_TIN]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return LoaiTinService
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
    [LOAI_TIN_EDIT]({ commit, state }, { slug, data }) {


        return LoaiTinService.update(slug, data);

    },
    [GET_LOAI_TIN_ID]({ commit }, slug) {
        // console.log(slug);
        return LoaiTinService
            .getbyid(slug)
            .then(({ data }) => {
                commit(FETCH_ID_LOAI_TIN, { data });
            })
            .catch(error => {
                throw new Error(error);
            });

        // }
    },

    [LOAI_TIN_PUBLISH](content, data) {
        // console.log('modeul', content)
  
        return LoaiTinService.create(data);
    },
    [LOAI_TIN_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return LoaiTinService.destroy(slug);
    },
    [LOAI_TIN_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.isRun = true;
    },
    [FETCH_END](state, {data} ) {
        console.log(data)
        state.loaitins = data;

    },
    [FETCH_ID_LOAI_TIN](state, { data }) {
        state.loaitin = data.loaitin;
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    loaitins(state) {
        return state.loaitins;
    },
    loaitin(state) {
        return state.loaitin;
    },

   
};

export default {
    state,
    actions,
    mutations,
    getters
};