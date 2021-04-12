import Vue from 'vue';

import { sectionCatService } from '../../../common/sectionCatService'
import {FETCH_SECTION_CATEGORY,GET_SECTION_CATEGORY_ID,SECTION_CATEGORY_EDIT,SECTION_CATEGORY_DELETE,CREATE_SECTION_CATEGORY} from '../actions/sectioncategory'
import { PAGE_RESET_STATE } from '../actions/page'
import { FETCH_ID_SECTION_CATEGORY } from '../muntation/sectioncategory';
import {  FETCH_END ,RESET_STATE} from '../muntation/page'
import jwtToken from '../../../common/token'
import ApiService from '../../../common/api.service'
const initialState = {
  section_categorys: [],

  category: {
    title: "",
    type:""
    
  }
  ,
    types: [
      { text: 'Video',value:0 },
      { text: 'Image',value:1 },
      { text: 'Tour',value:2 },
      { text: 'Scan',value:3 },
  ]


};

export const state = { ...initialState };


export const actions = {
  [FETCH_SECTION_CATEGORY]({ commit },slug) {
    if (jwtToken.getToken()) {
      ApiService.setHeader();
        return sectionCatService.get(slug)
         
        .then(({ data }) => {
            
          commit(FETCH_END, data);
            
        })
        .catch(error => {
          throw new Error(error);
        });
    }
  },
  [SECTION_CATEGORY_EDIT]({state},  slug  ) {
      console.log('SECTION_CATEGORY_EDIT', slug);
      console.log('STATE', state.category)
    return sectionCatService.update(slug, state.category);
  },
  [GET_SECTION_CATEGORY_ID]( { commit }, slug) {
    console.log(slug);
    return sectionCatService.getbyId(slug).then(({ data } ) => {
      commit(FETCH_ID_SECTION_CATEGORY, { data});
        })
        .catch(error => {
          throw new Error(error);
        });
    
  },

  [CREATE_SECTION_CATEGORY]({state},slug) {
  
    // console.log('CREATE_SECTION',slug)  
    return sectionCatService.post(slug, state.category);
  },
  [SECTION_CATEGORY_DELETE](context, slug) {
    // console.log(context);
    //   console.log('SECTION_DELETE',slug)
    return sectionCatService.delete(slug);
  },
  [PAGE_RESET_STATE]({ commit }) {
    commit(RESET_STATE);
  }


}
export const mutations = {

  [FETCH_END](state, { data } ) {
    // console.log('FETCH_END',data)
    state.section_categorys = data;

 
  },
  [FETCH_ID_SECTION_CATEGORY](state, { data } ) {
 
    state.category = data.section_category
  
  },
   [RESET_STATE]() {
    for (let f in state) {
      Vue.set(state, f, initialState[f]);
    }
  }

};

const getters = {
  section_categorys(state) {
    return state.section_categorys;
  },
  category(state) {
    return state.category;
  },
  types(state) {
    return state.types;
  }

};


export default {
  state,
  actions,
  mutations,
  getters
};