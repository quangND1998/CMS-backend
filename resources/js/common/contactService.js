import ApiService from './api.service'

export const contactService = {
    query() {
        return ApiService.query("contact")
    },
    destroy(slug) {
        return ApiService.delete(`contact/delete/${slug}`);
    }
};
