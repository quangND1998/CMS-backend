import ApiService from "./api.service";
export const sectionCatService = {
    get(slug) {
        return ApiService.get("section", `${slug}/section_category`);
    },
    post(slug, params) {
        return ApiService.post(`section/${slug}/section_category`, params);
    },
    getbyId(slug) {
        return ApiService.get("section_category", slug);
    },
    update(slug, params) {
        return ApiService.put(`section_category/update/${slug}`, params);
    },
    delete(slug) {
        return ApiService.delete(`section_category/delete/${slug}`);
    }
};
