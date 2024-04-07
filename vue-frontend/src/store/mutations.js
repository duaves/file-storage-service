
export function setFiles(state, [loading, response = null]) {


    state.files.loading = loading;
    if (response) {
        state.files = {
          ...state.files,
          data: response.data,
          links: response.meta?.links,
          page: response.meta.current_page,
          limit: response.meta.per_page,
          from: response.meta.from,
          to: response.meta.to,
          total: response.meta.total,
        }
      }
  }