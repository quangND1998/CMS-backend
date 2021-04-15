import ApiService from './api.service'

export const LoaiTinService = {
    query() {
        return ApiService.query("loaitin")
    },
    get() {

        return ApiService.get('loaitin');
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('loaitin', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("loaitin", params)
    },
 
    update(slug, params) {
        return ApiService.put(`loaitin/update/${slug}`,params)
    },
    destroy(slug) {
        return ApiService.delete(`loaitin/delete/${slug}`);
    }
};
