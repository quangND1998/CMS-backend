import ApiService from './api.service';
export const contenService = {
    get(slug) {
         
        return ApiService.get("section", `${slug}/items`);
    },
    post(slug, pramas) {
        return ApiService.post(`section/${slug}/items`, pramas)
    },
    getbyId(slug) {
        return ApiService.get("item", slug);
    },
    update(slug, params) {
        return ApiService.update("item/update",params, slug  )
    },
    delete(slug) {
        return ApiService.delete(`item/delete/${slug}`);
    },
    getItemCategory(slug) {
        return ApiService.get("section_category", `${slug}/items`);
    },
    postItemCategory(slug, pramas) {
        return ApiService.post(`section_category/${slug}/items`, pramas)
    },
    
}