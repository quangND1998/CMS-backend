import Vue from "vue";

import { themeService } from "../../../common/themeService";
import {
FETCH_THEMES,THEME_DELETE,THEME_EDIT,THEME_PUBLISH,theme_RESET_STATE,GET_THEME_ID
} from "../actions/theme";
import {
    FETCH_START,
    FETCH_END,
    FETCH_ID_THEME,
    RESET_STATE
} from "../muntation/theme";

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
  
    themes: [],
    isLoadings: true,
    theme: {
        title: "",
        link_code: "",
        image_template: {},
        type:0
    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_THEMES]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return themeService
                .query()
                .then(({ data }) => {
                    // console.log(data)
                    commit(FETCH_END, data);
                })
                .catch(error => {
                    // console.log(data);
                    throw new Error(error);
                });
        }
    },
    [THEME_EDIT]({ commit, state }, { slug, formdata }) {
        // console.log('PAGE_EDIT', commit);

        // console.log('PAGE_EDIT', slug);
        // console.log('PAGE_EDIT', formdata);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
        return themeService.update(formdata, slug);
        }
    },
    [GET_THEME_ID]({ commit }, slug) {
        if (jwtToken.getToken()) {
            ApiService.setHeader();
        return themeService
            .getbyid(slug)
            .then(({ data }) => {
                commit(FETCH_ID_THEME, { data });
            })
            .catch(error => {
                throw new Error(error);
            });

        }
    },

    [THEME_PUBLISH](content, data) {
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return themeService.create(data);
        }
    },
    [THEME_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return themeService.destroy(slug);
    },
    [theme_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.isLoadings = true;
    },
    [FETCH_END](state, { data }) {
        // console.log(data)
        state.themes = data;

        state.isLoadings = false;
    },
    [FETCH_ID_THEME](state, { data }) {
        state.theme = data.theme;
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    themes(state) {
        return state.themes;
    },
    theme(state) {
        return state.theme;
    },
    isLoadings(state) {
        return state.isLoadings;
    },
  
};

export default {
    state,
    actions,
    mutations,
    getters
};