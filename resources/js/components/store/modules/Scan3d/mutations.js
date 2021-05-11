export default {
    GET_ALL_SCAN3D(state, payload) {
        return state.scan3ds = payload
    },

    GET_DETAIL_SCAN3D(state, id) {
        return state.scan3ds.find(scan3d => scan3d.id === id)
    },

    ADD_SCAN3D(state, payload) {
        return state.scan3ds.push(payload)
    },

    UPDATE_SCAN3D(state, payload) {
        const index = state.scan3ds.findIndex((scan3d) => scan3d.id === payload.id)
        return state.scan3ds[index] = payload.data
    },

    DELETE_SCAN3D(state, id) {
        return state.scan3ds = state.scan3ds.filter(scan3d => scan3d.id !== id);
    }
}