import API from "./API";

const END_POINT = "scan-3d";

export default {
    all() {
        return API.get(END_POINT);
    },

    show(id) {
        return API.get(`${END_POINT}/${id}`);
    },

    store(payload) {
        return API.post(END_POINT, payload)
    },

    update(payload) {
        return API.post(`${END_POINT}/${payload.id}`, payload.data)
    },

    delete(id) {
        return API.delete(`${END_POINT}/${id}`);
    }
};