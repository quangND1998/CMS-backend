import ApiService from './api.service'

export const pageService = {
    query() {
        return ApiService.query("page")
    },
    get() {
        return ApiService.get('page');
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('page', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("page", params)
    },
    update(params, slug) {
        return ApiService.update("page/update", params, slug);
    },
    destroy(slug) {
        return ApiService.delete(`page/delete/${slug}`);
    }
};
