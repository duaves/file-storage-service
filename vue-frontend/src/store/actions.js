import axiosClient from "../axios.js";

export function getFiles({commit}, {url = null}) {
    commit('setFiles', [true])
    url = url || '/file'
    return axiosClient.get(url)
    .then((res) => {
        commit('setFiles', [false, res.data])
    })
    .catch(()=>{
        commit('setFiles', [false])
    })
  }