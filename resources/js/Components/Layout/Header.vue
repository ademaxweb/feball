<template>
    <header class="header">
        <div class="content header__content">
            <div class="header__logo">
                <router-link :to="{name: 'index'}" class="link">
                    <h1>FeBall</h1>
                </router-link>
            </div>
            <div class="header__links">
                <router-link
                    :to="{name: 'clubs'}"
                    class="link header__link"
                >
                    Клубы
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-shirt" />
                </router-link>

                <router-link
                    :to="{name: 'tournaments'}"
                    class="link header__link"
                >
                    Турниры
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-trophy" />
                </router-link>
                <router-link
                    :to="{name: 'countries'}"
                    class="link header__link"
                >
                    Страны
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-flag" />
                </router-link>

                <router-link
                    :to="{name: 'players'}"
                    class="link header__link"
                >
                    Игроки
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-person" />
                </router-link>

                <router-link
                    :to="{name: 'stadiums'}"
                    class="link header__link"
                >
                    Стадионы
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-passport" />
                </router-link>
                <router-link
                    :to="{name: 'managers'}"
                    class="link header__link"
                >
                    Тренеры
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-user-secret" />
                </router-link>

                <router-link
                    :to="{name: 'games'}"
                    class="link header__link"
                >
                    Матчи
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-futbol" />
                </router-link>

                <router-link
                    :to="{name: 'login'}"
                    class="link header__link"
                    v-if="!authorized"
                >
                    Войти
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-arrow-right-to-bracket"/>
                </router-link>

                <router-link
                    :to="{name: 'profile'}"
                    class="link header__link"
                    v-if="authorized"
                >
                    {{ username }}
                    <font-awesome-icon class="header__link__icon" icon="fa-solid fa-user" />
                </router-link>

                <button class="header__menu__open" @click="openHeaderMenu"><font-awesome-icon icon="fa-solid fa-bars" /></button>
            </div>
            <div class="header__menu" v-show="headerMenuOpened">
                <button class="header__menu__close" @click="closeHeaderMenu"><font-awesome-icon icon="fa-solid fa-xmark"/></button>
                <router-link @click="closeHeaderMenu" :to="{name: 'index'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-house" />Главная
                </router-link>
                <router-link @click="closeHeaderMenu" :to="{name: 'clubs'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-shirt" />Клубы
                </router-link>
                <router-link @click="closeHeaderMenu" :to="{name: 'players'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-person" />Игроки
                </router-link>
                <router-link @click="closeHeaderMenu" :to="{name: 'tournaments'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-trophy" />Турниры
                </router-link>
                <router-link @click="closeHeaderMenu" :to="{name: 'games'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-futbol" />Матчи
                </router-link>
                <router-link @click="closeHeaderMenu" :to="{name: 'countries'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-flag" />Страны
                </router-link>
                <router-link @click="closeHeaderMenu" :to="{name: 'stadiums'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-passport" />Стадионы
                </router-link>
                <router-link v-if="!authorized" @click="closeHeaderMenu" :to="{name: 'login'}" class="link header__menu__link">
                    <font-awesome-icon icon="fa-solid fa-arrow-right-to-bracket" />Войти
                </router-link>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
    data (){
        return {
            headerMenuOpened: false
        }
    },
    methods: {
        toggleHeaderMenu() {
            this.headerMenuOpened = !this.headerMenuOpened
        },
        closeHeaderMenu() {
            this.headerMenuOpened = false
        },
        openHeaderMenu() {
            this.headerMenuOpened = true
        }

    },
    computed: {
        authorized(){
            return this.$store.getters.authorized
        },
        username(){
            return this.$store.getters.getUser.name
        }
    }
}
</script>

<style scoped>

</style>
