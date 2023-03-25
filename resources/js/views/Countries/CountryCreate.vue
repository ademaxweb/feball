<template>
    <div class="container container--section container--pv container--center">
        <h2 class="heading">Создать страну</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form__block">
                <label for="countryName" class="form__input_label">Название</label>
                <input v-model.trim="country.name" type="text" class="form__input" placeholder="Название" id="countryName">
            </div>

            <div class="form__block">
                <button type="submit" :disabled="!formValidated" class="button form__submit_button">Создать</button>
                <p class="form__input_error" v-for="(error, index) in errors" :key="index">{{  error }}</p>
            </div>
        </form>

        <div class="container container--pv-s">
            <router-link :to="{name: 'countries'}" class="link link--underlined">К списку стран</router-link>
        </div>

    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "CountryCreate",
    data(){
        return {
            country: {
                name: ''
            },
            errors: [],
            formSubmittingProcess: false,
            name: "Создание страны"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    methods: {
        submitForm(){
            if (this.formSubmittingProcess) return false

            this.errors = []

            if (!this.formValidated) {
                this.errors.push("Вы заполнили не все поля формы")
                return false
            }

            this.formSubmittingProcess = true

            api.country.create(this.country)
                .then(data => {
                    console.log(data)
                    this.formSubmittingProcess = false
                })
                .catch(error => {
                    console.log(error)
                    this.errors = error.data
                    this.formSubmittingProcess = false
                })

        }
    },
    computed: {
        formValidated() {
            return this.country.name.trim()
        }
    }
}
</script>

<style scoped>

</style>
