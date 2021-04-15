import ApiService from './api.service'

export const themeService = {
    query() {
        return ApiService.query("theme")
    },
    get() {

        return ApiService.get('theme');
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('theme', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("theme", params)
    },
    update(params, slug) {
        return ApiService.update("theme/update", params, slug);
    },
    destroy(slug) {
        return ApiService.delete(`theme/delete/${slug}`);
    }
};
