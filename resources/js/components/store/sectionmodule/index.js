import Vue from 'vue';

import { sectionService } from '../../../common/sectionService'
import { FETCH_SECTION,CREATE_SECTION,SECTION_DELETE ,GET_SECTION_ID ,SECTION_EDIT} from '../actions/section'
import { PAGE_RESET_STATE } from '../actions/page'
import { FETCH_ID_SECTION } from '../muntation/section';
import {  FETCH_END ,RESET_STATE} from '../muntation/page'
import jwtToken from '../../../common/token'
import ApiService from '../../../common/api.service'

const initialState = {
  sections: [],

  section: {
    title: "",
    text: "",
    sub_title: "",
    template: "",
    
  },
  options: [
      { text: 'styles.template1', value: 'styles.template1' },
      { text: 'styles.template2' , value: 'styles.template2'},
      { text: 'styles.template3',value:  'styles.template3'},
      { text: 'styles.template4',value:  'styles.template4'},
      { text: 'styles.template5',value: 'styles.template5'},
      { text: 'styles.template6',value:'styles.template6' }
  ]

};

export const state = { ...initialState };


export const actions = {
  [FETCH_SECTION]({ commit },slug) {
    if (jwtToken.getToken()) {
      ApiService.setHeader();
      return sectionService.get(slug)
        .then(({ data }) => {
  
          commit(FETCH_END, data);
            
        })
        .catch(error => {
          throw new Error(error);
        });
    }
  },
  [SECTION_EDIT]({state},  slug  ) {
    // console.log('PAGE_EDIT', slug);
    return sectionService.update(slug, state.section);
  },
  [GET_SECTION_ID]( { commit }, slug) {
    // console.log(slug);
    return sectionService.getbyId(slug).then(({ data } ) => {
      commit(FETCH_ID_SECTION, { data});
        })
        .catch(error => {
          throw new Error(error);
        });
    
  },

  [CREATE_SECTION]({state},slug) {
  
    // console.log('CREATE_SECTION',slug)  
    return sectionService.post(slug, state.section);
  },
  [SECTION_DELETE](context, slug) {
    // console.log(context);
    //   console.log('SECTION_DELETE',slug)
    return sectionService.delete(slug);
  },
  [PAGE_RESET_STATE]({ commit }) {
    commit(RESET_STATE);
  }


}
export const mutations = {

  [FETCH_END](state, { data } ) {
    // console.log('FETCH_END',data)
    state.sections = data.section;

 
  },
  [FETCH_ID_SECTION](state, { data } ) {

    state.section = data.section
  
  },
   [RESET_STATE]() {
    for (let f in state) {
      Vue.set(state, f, initialState[f]);
    }
  }

};

const getters = {
  sections(state) {
    return state.sections;
  },
  section(state) {
    return state.section;
  },
  options(state) {
    return state.options
  }

};


export default {
  state,
  actions,
  mutations,
  getters
};