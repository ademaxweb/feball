<template>
    <div class="container container--section container--pv container--center">
        <h2 class="heading">Создать клуб</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form__block">
                <label for="clubName" class="form__input_label">Название</label>
                <input v-model.trim="club.name" type="text" class="form__input" placeholder="Название" id="clubName">
            </div>
            <div class="form__block">
                <label for="clubFounding" class="form__input_label">Дата основания</label>
                <input v-model.trim="club.founding" type="date" class="form__input" placeholder="Дата основания" id="clubFounding">
            </div>
            <div class="form__block">
                <label for="clubCountry" class="form__input_label">Страна</label>
                <select v-model="club.country_id" class="dropdown" id="clubCountry">
                    <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                </select>
            </div>

            <div class="form__block">
                <button type="submit" :disabled="!formValidated" class="button form__submit_button">Создать</button>
                <p class="form__input_error" v-for="(error, index) in errors" :key="index">{{  error }}</p>
            </div>
        </form>

        <div class="container container--pv-s">
            <router-link :to="{name: 'stadiums'}" class="link link--underlined">К списку стадионов</router-link>
        </div>

    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "StadiumCreate",
    data(){
        return {
            club: {
                name: '',
                founding: null,
                country_id: null,
            },
            countries: [],
            errors: [],
            formSubmittingProcess: false,
            name: "Создание клуба"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    mounted() {
        this.getCountries()
    },
    methods: {
        getCountries(){
            api.country.getAll()
                .then(data => {
                    this.countries = data
                })
        },
        submitForm(){
            if (this.formSubmittingProcess) return false

            this.errors = []

            if (!this.formValidated) {
                this.errors.push("Вы заполнили не все поля формы")
                return false
            }





            this.formSubmittingProcess = true

            api.club.create(this.club)
                .then(data => {
                    console.log(data)
                    this.formSubmittingProcess = false
                    this.club.name = ''
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
            return this.club.name.trim() && this.club.founding && this.club.country_id
        }
    }
}
</script>

<style scoped>

</style>
