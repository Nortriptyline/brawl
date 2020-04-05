import axios from 'axios';

export default {
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
