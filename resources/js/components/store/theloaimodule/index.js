import Vue from "vue";

import {
    theloaiService
} from "../../../common/theloaiService";
import {
    FETCH_THELOAI,
    THELOAI_DELETE,
    THELOAI_EDIT,
    THELOAI_PUBLISH,
    THELOAI_RESET_STATE,
    GET_THELOAI_ID
} from '../theloaimodule/action'
import {
    FETCH_END,
    FETCH_ID_THELOAI,
    FETCH_START,
    RESET_STATE,
    SET_THELOAI
} from '../theloaimodule/muntation';

import ApiService from "../../../common/api.service";
import jwtToken from "../../../common/token";
const initialState = {
    time: 'aaaaaaaaaaaaaaa',
    theloais: [],
    isRun: true,
    theloai: {
        Ten: "",

    },
    isAuthenticated: !!jwtToken.getToken()
};

export const state = {
    ...initialState
};

export const actions = {
    [FETCH_THELOAI]({
        commit
    }) {
        commit(FETCH_START);
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return theloaiService
                .query()
                .then(({
                    data
                }) => {
                    // console.log(data)
                    commit(FETCH_END, data);
                })
                .catch(error => {
                    console.log(data);
                    throw new Error(error);
                });
        }
    },
    [THELOAI_EDIT]({
        commit,
        state
    }, {
        slug,
        data
    }) {


        return theloaiService.update(slug, data);

    },
    [GET_THELOAI_ID]({
        commit
    }, slug) {
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return theloaiService
                .getbyid(slug)
                .then(({
                    data
                }) => {
                    commit(FETCH_ID_THELOAI, {
                        data
                    });
                })
                .catch(error => {
                    throw new Error(error);
                });

        }
    },

    [THELOAI_PUBLISH](content, data) {
        // console.log('modeul', content)
        //   console.log('modeul',data)
        if (jwtToken.getToken()) {
            ApiService.setHeader();
            return theloaiService.create(data);
        }
    },
    [THELOAI_DELETE](context, slug) {
        // console.log(context);
        //   console.log('pageservice',slug)
        return theloaiService.destroy(slug);
    },
    [THELOAI_RESET_STATE]({
        commit
    }) {
        commit(RESET_STATE);
    }
};
export const mutations = {
    [FETCH_START](state) {
        state.isRun = true;
    },
    [FETCH_END](state, {
        data
    }) {
        // console.log(data)
        state.theloais = data;

        state.isRun = false;
    },
    [FETCH_ID_THELOAI](state, {
        data
    }) {
        state.theloai = data.theloai;
    },
    [RESET_STATE]() {
        for (let f in state) {
            Vue.set(state, f, initialState[f]);
        }
    }
};

const getters = {
    theloais(state) {
        return state.theloais;
    },
    theloai(state) {
        return state.theloai;
    },
    isRun(state) {
        return state.isRun;
    },

};

export default {
    state,
    actions,
    mutations,
    getters
};
