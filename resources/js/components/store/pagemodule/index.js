import Vue from "vue";

import { pageService } from "../../../common/pageService";
import {
    FETCH_PAGES,
    PAGE_PUBLISH,
    PAGE_DELETE,
    PAGE_EDIT,
    GET_PAGE_ID,
    PAGE_RESET_STATE
} from "../actions/page";
import {
    FETCH_START,
    FETCH_END,
    FETCH_ID_PAGE,
    RESET_STATE
} from "../muntation/page";

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
    posts: [],
    isLoading: true,
    page: {
        name: "",
        description: "",
        image: {}
    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_PAGES]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return pageService
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
    [PAGE_EDIT]({ commit, state }, { slug, formdata }) {
        // console.log('PAGE_EDIT', commit);

        // console.log('PAGE_EDIT', slug);
        // console.log('PAGE_EDIT', formdata);

        return pageService.update(formdata, slug);
    },
    [GET_PAGE_ID]({ commit }, slug) {
        // console.log(slug);
        return pageService
            .getbyid(slug)
            .then(({ data }) => {
                commit(FETCH_ID_PAGE, { data });
            })
            .catch(error => {
                throw new Error(error);
            });

        // }
    },

    [PAGE_PUBLISH](content, data) {
        // console.log('modeul', content)
        //   console.log('modeul',data)
        return pageService.create(data);
    },
    [PAGE_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return pageService.destroy(slug);
    },
    [PAGE_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.isLoading = true;
    },
    [FETCH_END](state, { data }) {
        // console.log(data)
        state.posts = data;

        state.isLoading = false;
    },
    [FETCH_ID_PAGE](state, { data }) {
        state.page = data.page;
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    posts(state) {
        return state.posts;
    },
    page(state) {
        return state.page;
    },
    isLoading(state) {
        return state.isLoading;
    },
};

export default {
    state,
    actions,
    mutations,
    getters
};