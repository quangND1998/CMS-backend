import Vue from "vue";

import {tintucService} from '../../../common/tintucService';
import {
    FETCH_TIN_TUC, GET_TIN_TUC_ID,TIN_TUC_EDIT ,TIN_TUC_DELETE,TIN_TUC_PUBLISH,TIN_TUC_RESET_STATE
} from './action';
import {
    FETCH_START,
    FETCH_END,
    FETCH_ID_TIN_TUC,
    RESET_STATE
} from "./muntation";

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
    time:'aaaaaaaaaaaaaaa',
    news: [],
    loading: true,
    item: {
        TieuDe: "",
        TomTat: "",
        NoiDung: "",
        TieuDe_en: "",
        TomTat_en: "",
        NoiDung_en: "",
        Hinh: {},
        NoiBat: "",
        SoLuotXem: 0,
        idLoaiTin: "",
    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_TIN_TUC]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return tintucService
                .query()
                .then(({ data }) => {
                    // console.log(data)
                    commit(FETCH_END, data);
                })
                .catch(error => {
                    console.log(data);
                    throw new Error(error);
                });
        }
    },
    [TIN_TUC_EDIT]({ commit, state }, { slug, formdata }) {
        // console.log('PAGE_EDIT', commit);

        // console.log('PAGE_EDIT', slug);
        // console.log('PAGE_EDIT', formdata);

        return tintucService.update(formdata, slug);
    },
    [GET_TIN_TUC_ID]({ commit }, slug) {
        // console.log(slug);
        return tintucService
            .getbyid(slug)
            .then(({ data }) => {
                commit(FETCH_ID_TIN_TUC, { data });
            })
            .catch(error => {
                throw new Error(error);
            });

        // }
    },

    [TIN_TUC_PUBLISH](content, data) {
        // console.log('modeul', content)
          console.log('modeul',data)
        return tintucService.create(data);
    },
    [TIN_TUC_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return tintucService.destroy(slug);
    },
    [TIN_TUC_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.loading = true;
    },
    [FETCH_END](state, { data }) {
        // console.log(data)
        state.news = data;

        state.loading = false;
    },
    [FETCH_ID_TIN_TUC](state, { data }) {
        state.item = data.tintuc;
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    news(state) {
        return state.news;
    },
    item(state) {
        return state.item;
    },
    loading(state) {
        return state.loading;
    }
 
};

export default {
    state,
    actions,
    mutations,
    getters
};