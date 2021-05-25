import Scan3d from "../../../../common/API/Scan3d"
import ApiService from "../../../../common/api.service"
import jwtToken from "../../../../common/token";
export default {
    get_all_scan3d(vuexContext) {
        if (jwtToken.getToken()) {
            ApiService.setHeader();
           return Scan3d.all().then(response => {
                vuexContext.commit("GET_ALL_SCAN3D", response.data);
            });
        }
    },

    get_detail_scan3d(vuexContext, id) {
        Scan3d.show(id).then(response => {
            vuexContext.commit("GET_DETAIL_SCAN3D", response.data);
        })
        .catch(error => {
            throw new Error(error);
        });
    },

    add_scan3d(vuexContext, payload) {
       return  Scan3d.store(payload);
    },

    update_scan3d(vuexContext, payload) {
        return   Scan3d.update(payload)
    },

    delete_scan3d(vuexContext, id) {
        Scan3d.delete(id).then(response => {
            vuexContext.commit("DELETE_SCAN3D", id);
        });
    }
};