import {createStore} from "vuex";

const store = createStore({
    state (){
        return {
            user: {
                authorized: false,
                id: null,
                name: null,
                email: null,
                roles: null,
                permissions: null
            }
        }
    },
    getters: {
        getUser: state => {
            return state.user
        },
        authorized: state => {
            return state.user.authorized
        }
    },
    actions: {},
    mutations: {
        resetUser: state => {
            state.user = {
                authorized: false,
                id: null,
                name: null,
                email: null,
                roles: null,
                permissions: null
            }
        },

        authorize: (state, payload) => {
            state.user = payload
            state.user.authorized = true
        }
    }
})

export default store
