import axios from 'axios';

export default {
    getMine() {
        return axios.get('/api/tournament/')
            .then(response => {
                return response.data;
            })

    }
}
