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
    create(parmas) {
        // console.log('pageservice',parmas)
        return ApiService.post("page", parmas)
    },
    update(params, slug ) {
        return ApiService.update("page/update", params,slug);
    },
    destroy(slug) {
        return ApiService.delete(`page/delete/${slug}`);
    }
};
