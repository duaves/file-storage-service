import axiosClient from "../axios.js";

export function getFiles({commit}, {url = null, search = ''}) {
    commit('setFiles', [true])
    url = url || '/file'
    return axiosClient.get(url, {
        params: {search}
    })
    .then((res) => {
        commit('setFiles', [false, res.data])
    })
    .catch(()=>{
        commit('setFiles', [false])
    })
  }