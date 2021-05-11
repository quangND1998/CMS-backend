import ApiService from './api.service'

export const theloaiService = {
    query() {
        return ApiService.query("theloai")
    },
    get() {

        return ApiService.get('theloai');
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('theloai', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("theloai", params)
    },
 
    update(slug, params) {
        return ApiService.put(`theloai/update/${slug}`,params)
    },
    destroy(slug) {
        return ApiService.delete(`theloai/delete/${slug}`);
    }
};
