import axios from 'axios';

export default {
    get(id) {
        return axios.get('/api/tournament/' + id)
            .then(response => {
                return response.data
            })
    },
    getByUrl(url) {
        return axios.get('/api/tournament/' + url)
            .then(response => {
                return response.data
            });
    },
    getMine() {
        return axios.get('/api/tournament/me')
            .then(response => {
                return response.data;
            })

    },
    getMyTrash() {
        return axios.get('/api/tournament/me/trash')
            .then(response => {
                return response.data;
            })
    }
}
