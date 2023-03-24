import axios from "axios";
import store from "./store";

const api = axios.create()

api.LOCAL_STORAGE_KEY = "access_token"

api.interceptors.request.use(config => {

    // config.headers.authorization = `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvcmVmcmVzaCIsImlhdCI6MTY3NjExMDkyOSwiZXhwIjoxNjc2MTE5OTI1LCJuYmYiOjE2NzYxMTYzMjUsImp0aSI6ImNWQWN0NDhkcklYTDluaDQiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.tlQ927NZQeguJo1rm4jR71TLRE6dQU-L25soGN6YEA0`

    if (localStorage.getItem(api.LOCAL_STORAGE_KEY)) {
        config.headers.authorization = `Bearer ${localStorage.getItem(api.LOCAL_STORAGE_KEY)}`
    }


    return config
}, error => {throw error})

api.interceptors.response.use((response) => {return response}, async (error) => {

    const err = error.response
    if ((err.status === 401) && (err.data.message === 'Token has expired' || err.data.message === 'The token has been blacklisted')) {
        const new_token = await api.user.refresh()
        error.config.headers.authorization = `Bearer ${new_token}`
        return api.request(error.config)
    } else throw err

})



api.country = {
    getAll: ()=> {
        return api.get('/api/country/')
            .then(response => response.data.data)
    },
    getAllFull: ()=> {
        return api.get('/api/country/fullcollection')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/country/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/country/${id}`)
            .then(response => response.data.data)
    },
    create: (data) => {
        return api.post('/api/country/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/country/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/country/${id}/delete`)
            .then(response => response.data)
    }

}
api.tournament = {
    getAll: ()=> {
        return api.get('/api/tournament/')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/tournament/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/tournament/${id}`)
            .then(response => response.data.data)
    },
    create: (data) => {
        return api.post('/api/tournament/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/tournament/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/tournament/${id}/delete`)
            .then(response => response.data)
    },
    clubs: {
        getAll: (id) => {
            return api.get(`/api/tournament/${id}/clubs`)
                .then(response => response.data.data)
        },
        set: (id, data) => {
            return api.post(`/api/tournament/${id}/clubs/set`, data)
                .then(response => response.data.data)
        }
    }
}
api.club = {
    getAll: ()=> {
        return api.get('/api/club/')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/club/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/club/${id}`)
            .then(response => response.data.data)
    },
    getByCountries: () => {
        return api.get('/api/club/by-countries')
            .then(response => response.data.data)
    },
    create: (data) => {
        return api.post('/api/club/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/club/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/club/${id}/delete`)
            .then(response => response.data)
    }
}
api.player = {
    getAll: ()=> {
        return api.get('/api/player/')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/player/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/player/${id}`)
            .then(response => response.data.data)
    },
    create: (data) => {
        return api.post('/api/player/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/player/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/player/${id}/delete`)
            .then(response => response.data)
    }
}
api.manager = {
    getAll: ()=> {
        return api.get('/api/manager/')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/manager/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/manager/${id}`)
            .then(response => response.data.data)
    },
    create: (data) => {
        return api.post('/api/manager/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/manager/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/manager/${id}/delete`)
            .then(response => response.data)
    }
}
api.stadium = {
    getAll: ()=> {
        return api.get('/api/stadium/')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/stadium/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/stadium/${id}`)
            .then(response => response.data.data)
    },
    create: (data) => {
        return api.post('/api/stadium/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/stadium/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/stadium/${id}/delete`)
            .then(response => response.data)
    }
}
api.game = {
    getAll: ()=> {
        return api.get('/api/game/')
            .then(response => response.data.data)
    },
    getLatest: () => {
        return api.get('/api/game/latest')
            .then(response => response.data.data)
    },
    getById: (id) => {
        return api.get(`/api/game/${id}`)
            .then(response => response.data.data)
    },

    getLive: () => {
        return api.get('/api/game/live')
            .then(response => response.data.data)
    },

    getByTournaments: () => {
        return api.get('/api/game/by-tournaments')
            .then(response => response.data.data)
    },

    create: (data) => {
        return api.post('/api/game/create', data)
            .then(response => response.data.data)
    },
    update: (id, data) => {
        return api.post(`/api/game/${id}/update`, data)
            .then(response => response.data.data)
    },
    delete: (id) => {
        return api.post(`/api/game/${id}/delete`)
            .then(response => response.data)
    }
}
api.user = {
    register: (data) => {
        return api.post('/api/auth/register', data)
            .then(response => response.data)
    },
    login: (data) => {
        return api.post('/api/auth/login', data)
            .then(response => response.data)
    },
    me: () => {
        return api.post('/api/auth/me')
            .then(response => response.data.data)
    },
    logout: () => {
        return api.post('/api/auth/logout')
            .then(response => {
                localStorage.removeItem(api.LOCAL_STORAGE_KEY)
                store.commit('resetUser')
                return response.data
            })
    },
    refresh: () => {
        return api.post('/api/auth/refresh')
            .then(response => {
                console.log(response.data)
                const token = response.data.access_token
                localStorage.setItem(api.LOCAL_STORAGE_KEY, token)
                return token
            })
            .catch(error => {
                localStorage.removeItem(api.LOCAL_STORAGE_KEY)
                store.commit('resetUser')
            })
    }
}

export default api
