import axios from 'axios';

export default {
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
