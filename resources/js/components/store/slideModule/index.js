import Vue from "vue";

import { slideService } from "../../../common/slideSerivce";
import {
FETCH_SLIDE,SLIDE_EDIT,SLIDE_PUBLISH,SLIDE_RESET_STATE,GET_SLIDE_ID,SLIDE_DELETE
} from "./action";
import {
    FETCH_START,
    FETCH_END,
    FETCH_ID_SLIDE,
    RESET_STATE
} from "./muntation";

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
   
    slides: [],
    load: true,
    slide: {
        slide_name: "",
        slide_content: "",
        slide_url :"",
        slide_img: {}
    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {...initialState };

export const actions = {
    [FETCH_SLIDE]({ commit }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return slideService
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
    [SLIDE_EDIT]({ commit, state }, { slug, formdata }) {
        // console.log('PAGE_EDIT', commit);

        // console.log('PAGE_EDIT', slug);
        // console.log('PAGE_EDIT', formdata);

        return slideService.update(formdata, slug);
    },
    [GET_SLIDE_ID]({ commit }, slug) {
        if (jwtToken.getToken()) {
            ApiService.setHeader();
        return slideService
            .getbyid(slug)
            .then(({ data }) => {
                commit(FETCH_ID_SLIDE, { data });
            })
            .catch(error => {
                throw new Error(error);
            });

        }
    },

    [SLIDE_PUBLISH](content, data) {
        // console.log('modeul', content)
        //   console.log('modeul',data)
        if (jwtToken.getToken()) {
            ApiService.setHeader();
        return slideService.create(data);
        }
    },
    [SLIDE_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return slideService.destroy(slug);
    },
    [SLIDE_RESET_STATE]({ commit }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.load = true;
    },
    [FETCH_END](state, { data }) {
        // console.log(data)
        state.slides = data;

        state.load = false;
    },
    [FETCH_ID_SLIDE](state, { data }) {
        state.slide = data.slide;
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    slides(state) {
        return state.slides;
    },
    slide(state) {
        return state.slide;
    },
    load(state) {
        return state.load;
    },
};

export default {
    state,
    actions,
    mutations,
    getters
};