import {createApp} from "vue/dist/vue.esm-bundler";
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import router from "./router";
import store from "./store"
import Index from "./Index.vue"

import {
    faHouse,
    faTrophy,
    faFutbol,
    faArrowRightToBracket,
    faXmark,
    faBars,
    faEye,
    faEyeSlash,
    faUser,
    faFlag,
    faPerson,
    faShirt,
    faPassport,
    faUserSecret,
    faArrowUpRightFromSquare,
    faLink,
} from "@fortawesome/free-solid-svg-icons";

library.add(
    faHouse,
    faTrophy,
    faFutbol,
    faArrowRightToBracket,
    faXmark,
    faBars,
    faEye,
    faEyeSlash,
    faUser,
    faFlag,
    faPerson,
    faShirt,
    faPassport,
    faUserSecret,
    faArrowUpRightFromSquare,
    faLink,
)

const app = createApp(Index)
app.use(router)
app.use(store)
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount("#app")
