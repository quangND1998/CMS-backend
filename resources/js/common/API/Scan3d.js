import ApiService from '../api.service'
const END_POINT = "scan-3d";

export default {
    all() {
        return ApiService.query(END_POINT)
    },
    show(id) {
        return ApiService.get(`${END_POINT}/${id}`);
    },

    store(payload) {
        return ApiService.post(END_POINT, payload)
    },

    update(payload) {
        console.log(payload);
        return ApiService.update(END_POINT, payload.data, payload.id)
    },

    delete(id) {
        return ApiService.delete(`${END_POINT}/${id}`);
    }
};
