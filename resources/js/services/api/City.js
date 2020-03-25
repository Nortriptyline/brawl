import axios from 'axios';

export default {
    search(term) {
        return axios.get('/api/city/search/' + term)
            .then(response => {
                return response.data;
            })
    }
}
