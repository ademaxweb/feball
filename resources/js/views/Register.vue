<template>
    <div class="container container--section container--pv container--center">
        <h2 class="heading">Регистрация</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form__block">
                <label for="name_input" class="form__input_label">Имя пользователя</label>
                <input v-model.trim="credentials.name" type="text" class="form__input" placeholder="Ник" id="name_input">
            </div>
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
                <label for="password_confirmation_input" class="form__input_label">
                    Подтверждение пароля
                    <font-awesome-icon @click="toggleShowingPasswordConfirmation" icon="fa-solid fa-eye" class="form__input_eye" v-show="!showPasswordConfirmation"/>
                    <font-awesome-icon @click="toggleShowingPasswordConfirmation" icon="fa-solid fa-eye-slash" class="form__input_eye" v-show="showPasswordConfirmation"/>
                </label>

                <input v-model.trim="credentials.password_confirmation" :type="showPasswordConfirmation && 'text' || 'password'" class="form__input" placeholder="Подтвердите пароль" id="password_confirmation_input">

            </div>
            <div class="form__block">
                <button type="submit" :disabled="!formValidated" class="button form__submit_button">Отправить</button>
                <p class="form__input_error" v-for="(error, index) in errors" :key="index">{{  error }}</p>
            </div>
        </form>

        <div class="container container--pv-s">
            <router-link :to="{name: 'login'}" class="link link--underlined">Уже есть аккаунт</router-link>
        </div>

    </div>
</template>

<script>
import api from "../api";

export default {
    name: "Register",
    data(){
        return {
            credentials: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: [],
            showPassword: false,
            showPasswordConfirmation: false,
            formSubmittingProcess: false,
            name: "Регистрация"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    methods: {
        toggleShowingPassword(){
            this.showPassword = !this.showPassword
        },
        toggleShowingPasswordConfirmation(){
            this.showPasswordConfirmation = !this.showPasswordConfirmation
        },
        submitForm(){
            if (this.formSubmittingProcess) return false

            this.errors = []

            if (!this.formValidated) {
                this.errors.push("Вы заполнили не все поля формы")
                return false
            }

            this.formSubmittingProcess = true

            api.user.register(this.credentials)
                .then(data => {
                    const token = data.access_token
                    localStorage.setItem(api.LOCAL_STORAGE_KEY, token)


                    api.user.me()
                        .then(data => {
                            this.$store.commit('authorize', data)
                        })
                        .catch(err => console.log(err.data))

                    this.formSubmittingProcess = false
                    this.$router.push({name: 'profile'})
                })
                .catch(error => {
                    console.log(error)
                })


        }
    },
    computed: {
        formValidated() {
            return  this.credentials.email.trim().length > 4 && this.credentials.password.trim().length > 7 && this.credentials.password_confirmation === this.credentials.password && this.credentials.name.trim().length > 2
        }
    }
}
</script>

<style scoped>

</style>
