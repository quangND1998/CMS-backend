import Vue from 'vue';

import { contenService } from '../../../common/contentService'
import {FETCH_ITEM ,CREATE_ITEM,ITEM_DELETE,GET_ITEM_ID,ITEM_EDIT} from '../actions/item'
import { FETCH_ID_ITEM } from '../muntation/item';
import {  FETCH_END ,RESET_STATE} from '../muntation/page'

const initialState = {
  contents: [],

    content: {
        title:"",
        video: "",
        image: {},
        subtitle: "",
        short_content: "",
        detail: "",
        icon_image: {},
        icon_class:""
    
  }

};

export const state = { ...initialState };


export const actions = {
  [FETCH_ITEM]({ commit },slug) {
    // console.log(slug)
    return contenService.get(slug)
        .then(({ data }) => {
            
        //   console.log(data)
            commit(FETCH_END, data);
            
      })
      .catch(error => {
        throw new Error(error);
      });
  },
    [ITEM_EDIT](content, { slug, data }  ) {
        // console.log('ITEM_EDIT', slug);
        //  console.log('ITEM_EDIT', data);
    return contenService.update(slug, data);
  },
  [GET_ITEM_ID]( { commit }, slug) {
    // console.log(slug);
    return contenService.getbyId(slug).then(({ data } ) => {
      commit(FETCH_ID_ITEM, { data});
        })
        .catch(error => {
          throw new Error(error);
        });
    
  },

    [CREATE_ITEM](content, { slug, data }) {
    // console.log('CREATE_ITEM', slug)
    // console.log('CREATE_ITEM',data)
    return contenService.post(slug, data);
  },
  [ITEM_DELETE](context, slug) {
    // console.log(context);
    //   console.log('ITEM_DELETE',slug)
    return contenService.delete(slug);
  },
//   [PAGE_RESET_STATE]({ commit }) {
//     commit(RESET_STATE);
//   }


}
export const mutations = {

    [FETCH_END](state, { data }  ) {
    // console.log('FETCH_END',data)
        state.contents = data;
 
   


  },
  [FETCH_ID_ITEM](state, { data } ) {
    
    // console.log(FETCH_ID_ITEM,data)
      state.content = data.item
 
  
  },
   [RESET_STATE]() {
    for (let f in state) {
      Vue.set(state, f, initialState[f]);
    }
  }

};

const getters = {
  contents(state) {
    return state.contents;
  },
  content(state) {
    return state.content;
  }

};


export default {
  state,
  actions,
  mutations,
  getters
};