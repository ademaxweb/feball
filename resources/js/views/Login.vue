<template>
    <div class="container container--section container--pv container--center">
        <h2 class="heading">Вход в аккаунт</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form__block">
                <label for="email_input" class="form__input_label">E-Mail</label>
                <input v-model.trim="credentials.email" type="email" class="form__input" placeholder="E-Mail" id="email_input">
            </div>
            <div class="form__block">
                <label for="password_input" class="form__input_label">
                    Пароль
                    <font-awesome-icon @click="toggleShowingPassword" icon="fa-solid fa-eye" class="form__input_eye" v-show="!showPassword"/>
                    <font-awesome-icon @click="toggleShowingPassword" icon="fa-solid fa-eye-slash" class="form__input_eye" v-show="showPassword"/>
                </label>

                <input v-model.trim="credentials.password" :type="showPassword && 'text' || 'password'" class="form__input" placeholder="Пароль" id="password_input">

            </div>
            <div class="form__block">
                <button type="submit" :disabled="!formValidated" class="button form__submit_button">Войти</button>
                <p class="form__input_error" v-for="(error, index) in errors" :key="index">{{  error }}</p>
            </div>
        </form>

        <div class="container container--pv-s">
            <router-link :to="{name: 'register'}" class="link link--underlined">Создать аккаунт</router-link>
        </div>

    </div>
</template>

<script>
import api from "../api";
import router from "../router";

export default {
    name: "Login",
    data(){
        return {
            credentials: {
                email: '',
                password: ''
            },
            errors: [],
            showPassword: false,
            formSubmittingProcess: false,
            name: "Авторизация"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    methods: {
        toggleShowingPassword(){
            this.showPassword = !this.showPassword
        },
        submitForm(){
            if (this.formSubmittingProcess) return false

            this.errors = []

            if (!this.formValidated) {
                this.errors.push("Вы заполнили не все поля формы")
                return false
            }

            this.formSubmittingProcess = true

            this.credentials.email = this.credentials.email.trim()
            this.credentials.password = this.credentials.password.trim()

            api.user.login(this.credentials)
                .then(data => {
                    const token = data.access_token
                    localStorage.setItem(api.LOCAL_STORAGE_KEY, token)

                    api.user.me()
                        .then(data => {
                            this.$store.commit('authorize', data)
                        })
                        .catch(err => console.log(err.data))

                    this.formSubmittingProcess = false
                    this.$router.push({name: 'index'})
                })
                .catch(err => {
                    if (err.status === 401) this.errors.push("Неверный логин или пароль")
                    this.formSubmittingProcess = false
                })
        }
    },
    computed: {
        formValidated() {
            return this.credentials.email.trim() && this.credentials.password.trim()
        }
    }
}
</script>

<style scoped>

</style>
