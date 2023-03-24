import { createRouter, createWebHistory} from "vue-router"
import store from "./store";
import api from "./api";


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'index',
            path: '/',
            meta: {},
            component: ()=>import('./views/Home.vue')
        },

        // CLUBS
        {
            name: 'clubs',
            path: '/clubs',
            meta: {},
            component: ()=>import('./views/Clubs/ClubIndex.vue')
        },
        {
            name: 'club',
            path: '/clubs/:id',
            meta: {},
            component: ()=>import('./views/Clubs/ClubCurrent.vue')
        },

        // TOURNAMENTS
        {
            name: 'tournaments',
            path: '/tournaments',
            meta: {},
            component: ()=>import('./views/Tournaments/TournamentIndex.vue')
        },
        {
            name: 'tournament',
            path: '/tournament/:id',
            meta: {},
            component: ()=>import('./views/Tournaments/TournamentCurrent.vue')
        },


        // GAMES
        {
            name: 'games',
            path: '/games',
            meta: {},
            component: ()=>import('./views/Games/GameIndex.vue')
        },
        {
            name: 'game',
            path: '/games/:id',
            meta: {},
            component: ()=>import('./views/Games/GameCurrent.vue')
        },


        // COUNTRIES
        {
            name: 'countries',
            path: '/countries',
            meta: {},
            component: ()=>import('./views/Countries/CountryIndex.vue')
        },
        {
            name: 'country',
            path: '/country/:id',
            meta: {},
            component: ()=>import('./views/Countries/CountryCurrent.vue')
        },


        // MANAGERS
        {
            name: 'managers',
            path: '/managers',
            meta: {},
            component: ()=>import('./views/Login.vue')
        },


        // STADIUMS
        {
            name: 'stadiums',
            path: '/stadiums',
            meta: {},
            component: ()=>import('./views/Stadiums/StadiumIndex.vue')
        },
        {
            name: 'stadium',
            path: '/stadium/:id',
            meta: {},
            component: ()=>import('./views/Stadiums/StadiumCurrent.vue')
        },


        // PLAYERS
        {
            name: 'players',
            path: '/players',
            meta: {},
            component: ()=>import('./views/Login.vue')
        },


        // AUTH
        {
            name: 'login',
            path: '/login',
            meta: { AuthForbidden: true },
            component: ()=>import('./views/Login.vue')
        },
        {
            name: 'register',
            path: '/sign-up',
            meta: { AuthForbidden: true },
            component: ()=>import('./views/Register.vue')
        },


        // USER
        {
            name: 'profile',
            path: '/profile',
            meta: {},
            component: ()=>import('./views/Profile.vue')
        }
    ]
})

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem(api.LOCAL_STORAGE_KEY)
    if (to.meta.AuthForbidden && token) return next({name: 'profile'})
    next()
})

export default router
