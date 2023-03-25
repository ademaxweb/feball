<template>
    <div class="container container--section container--pv container--center">
        <h2 class="heading">Создать стадион</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form__block">
                <label for="stadium" class="form__input_label">Название</label>
                <input v-model.trim="stadium.name" type="text" class="form__input" placeholder="Название" id="stadiumName">
            </div>
            <div class="form__block">
                <label for="stadium" class="form__input_label">Год основания</label>
                <input v-model.trim="stadium.founding" type="number" class="form__input" placeholder="Год основания" id="stadiumFounding">
            </div>
            <div class="form__block">
                <label for="stadium" class="form__input_label">Страна</label>
                <select v-model="stadium.country_id" @change="getSelectedCountryClubs" class="dropdown">
                    <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                </select>
            </div>
            <div class="form__block">
                <label for="stadium" class="form__input_label">Клуб</label>
                <select v-model="stadium.club_id" class="dropdown">
                    <option value="0">Не выбран</option>
                    <option v-for="club in clubs" :key="club.id" :value="club.id">{{ club.name }}</option>
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
            stadium: {
                name: '',
                founding: 2023,
                country_id: null,
                club_id: 0,
            },
            countries: [],
            clubs: [],
            errors: [],
            formSubmittingProcess: false,
            name: "Создание стадиона"
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
                    this.stadium.country_id = this.countries[0]?.id
                    this.getSelectedCountryClubs()
                })
        },
        getSelectedCountryClubs(){
            console.log(this.stadium)
            this.clubs = []
            this.stadium.club_id = 0
            api.country.getById(this.stadium.country_id)
                .then(data => {
                    this.clubs = data.clubs
                    // this.stadium.club_id = this.clubs[0]?.id
                })
        },
        submitForm(){
            if (this.formSubmittingProcess) return false

            this.errors = []

            if (!this.formValidated) {
                this.errors.push("Вы заполнили не все поля формы")
                return false
            }





            const creatingData = this.stadium
            if (!this.stadium.club_id) delete creatingData.club_id

            this.formSubmittingProcess = true

            api.stadium.create(creatingData)
                .then(data => {
                    console.log(data)
                    this.formSubmittingProcess = false
                    this.stadium.name = ''
                    this.stadium.founding = 2023
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
            return this.stadium.name.trim() && this.stadium.founding && this.stadium.country_id
        }
    }
}
</script>

<style scoped>

</style>
