import Vue from "vue";
import Vuex from 'vuex'
import page from './pagemodule/'
import section from './sectionmodule'
import item from './itemmodule'
import login from './loginmodule'
import category from './sectioncategory'
import theme from './thememodule'
import theloai from './theloaimodule'
import loatin from './loaitinmodule'
import tintuc from './tintucModule'
import slide from './slideModule'
import contact from './contactModule'
import comment from './commentModule'
import users from './userModule'
import Scan3dModule from './modules/Scan3d'

Vue.use(Vuex)


export default new Vuex.Store({
    modules: {
        page,
        section,
        item,
        login,
        category,
        theme,
        theloai,
        loatin,
        tintuc,
        slide,
        contact,
        comment,
        users,
        Scan3dModule,
    },

    state: {
        result: 0
    },
    getters: {
        tenResult: state => {
            return state.result * 10;
        },
        nameResult: state => {
            return state.result + 'name product'
        }
    }
})