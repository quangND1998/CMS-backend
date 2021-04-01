
import ApiService from './api.service';

export const sectionService = {
    get(slug) {
        // if (typeof slug !== "string") {
        //     throw new Error(
        //         "[RWV] SectionService.get() article slug required to fetch comments"
        //     );
        // }
        return ApiService.get("page", `${slug}/section`);
    },
    post(slug, payload) {
        return ApiService.post(`page/${slug}/section`, payload)
    },
    getbyId(slug) {
        return ApiService.get("section", slug);
    },
    update(slug, params) {
        return ApiService.put(`section/update/${slug}`,params)
    },
    delete(slug) {
        return ApiService.delete(`section/delete/${slug}`);
    }
}