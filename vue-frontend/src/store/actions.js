import axiosClient from "../axios.js";

export function getFiles({commit}, {url = null, search = ''}) {
    commit('setFiles', [true])
    url = url || '/files'
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


export function createFile({commit}, file){
    if(file.image instanceof File){
        const form = new FormData();
        form.append('name', file.name);
        form.append('original_name', file.original_name);
        form.append('image', file.image);
        file = form;
    }

    return axiosClient.post('/files', file)
}

export function updateFile({commit}, file){
    const id = file.id;
    if(file.image instanceof File){
        const form = new FormData();
        form.append('id', file.id);
        form.append('name', file.name);
        form.append('original_name', file.original_name);
        form.append('image', file.image);
        form.append('_method', 'PUT');
        file = form;
    }else{
        file._method = 'PUT';
    }
    return axiosClient.post('/files/${id}', file)
}