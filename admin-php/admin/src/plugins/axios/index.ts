import store from '@/utils/store'
import Axios from './Axios'
const http = new Axios({
    baseURL: '/api',
    timeout: 10000,
    headers: {
        "Authorization": "Bearer " + store.get('token')
    },
})

export { http }
