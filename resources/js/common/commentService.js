import ApiService from './api.service'

export const commentService = {
    query() {
        return ApiService.query("comment")
    },
    destroy(slug) {
        return ApiService.delete(`comment/delete/${slug}`);
    },
    
};
