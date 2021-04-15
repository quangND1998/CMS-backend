import ApiService from './api.service'

export const slideService = {
    query() {
        return ApiService.query("slide")
    },
    get() {

        return ApiService.get('slide');
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('slide', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("slide", params)
    },
    update(params, slug) {
        return ApiService.update("slide/update", params, slug);
    },
    destroy(slug) {
        return ApiService.delete(`slide/delete/${slug}`);
    }
};
