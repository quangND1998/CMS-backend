import ApiService from './api.service'

export const tintucService = {
    query() {
        return ApiService.query("tintuc")
    },
    get() {

        return ApiService.get('tintuc');
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('tintuc', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("tintuc", params)
    },
    update(params, slug) {
        return ApiService.update("tintuc/update", params, slug);
    },
    destroy(slug) {
        console.log(slug);
        
        return ApiService.delete(`tintuc/delete/${slug}`);
    }
};
