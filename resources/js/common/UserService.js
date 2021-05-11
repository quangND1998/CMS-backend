import ApiService from './api.service'

export const userService = {
    query() {
        return ApiService.query("user")
    },
    getbyid(slug) {
        // console.log('pageService',slug)
        return ApiService.get('user', slug);
    },
    create(params) {
        // console.log('pageservice',params)
        return ApiService.post("user", params)
    },
    update(slug, params) {
        return ApiService.put(`user/update/${slug}`,params)
    },
    destroy(slug) {
        return ApiService.delete(`user/delete/${slug}`);
    }
};
