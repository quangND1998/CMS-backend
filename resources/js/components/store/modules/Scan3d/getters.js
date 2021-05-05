export default {
    scan3ds: (state) => {
        return state.scan3ds
    },

    getScan3dById: (state) => (id) => {
        return state.scan3ds.find(scan3d => scan3d.id === id)
    }
}