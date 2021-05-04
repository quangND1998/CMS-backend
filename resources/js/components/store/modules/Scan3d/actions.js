import Scan3d from "../../../../common/API/Scan3d"


export default {
    get_all_scan3d(vuexContext) {
        Scan3d.all().then(response => {
            vuexContext.commit("GET_ALL_SCAN3D", response.data);
        });
    },

    get_detail_scan3d(vuexContext, id) {
        Scan3d.show(id).then(response => {
            vuexContext.commit("GET_DETAIL_SCAN3D", response.data);
        });
    },

    add_scan3d(vuexContext, payload) {
        Scan3d.store(payload).then(response => {
            vuexContext.commit("ADD_SCAN3D", response.data)
        });
    },

    update_scan3d(vuexContext, payload) {
        Scan3d.update(payload).then(response => {
            vuexContext.commit("UPDATE_SCAN3D", response.data)
                // setTimeout(() => {
                //     Vue.$toast.success("Add a new scan 3D successfully", {
                //         position: "bottom-right",
                //         duration: 5000
                //     });
                // }, 1300)
                //this.$router.push({ name: "scan-3d" })
        });
    },

    delete_scan3d(vuexContext, id) {
        Scan3d.delete(id).then(response => {
            vuexContext.commit("DELETE_SCAN3D", id);
        });
    }
};