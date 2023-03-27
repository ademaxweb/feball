<template>
    <div class="container container--section container--pv container--center">
        <h2 class="heading">Создать игрока</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form__block">
                <label for="playerName" class="form__input_label">Имя</label>
                <input v-model.trim="player.name" type="text" class="form__input" placeholder="Имя" id="playerName">
            </div>
            <div class="form__block">
                <label for="playerSurname" class="form__input_label">Фамилия</label>
                <input v-model.trim="player.surname" type="text" class="form__input" placeholder="Фамилия" id="playerSurname">
            </div>
            <div class="form__block">
                <label for="playerBirth" class="form__input_label">Дата рождения</label>
                <input v-model.trim="player.birth" type="date" class="form__input" placeholder="Дата рождения" id="playerBirth">
            </div>
            <div class="form__block">
                <label for="playerNumber" class="form__input_label">Игровой номер</label>
                <input v-model.trim="player.number" type="number" min="1" max="999" class="form__input" placeholder="Игровой номер" id="playerNumber">
            </div>
            <div class="form__block">
                <label for="playerPosition" class="form__input_label">Позиция</label>
                <select v-model="player.position_id" class="dropdown" id="playerPosition">
                    <option v-for="position in positions" :value="position.id">{{ position.name }}</option>
                </select>
            </div>
            <div class="form__block">
                <label for="playerCountry" class="form__input_label">Гражданство</label>
                <select v-model="player.country_id" class="dropdown" id="playerCountry">
                    <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                </select>
            </div>
            <div class="form__block">
                <label for="playerCountry" class="form__input_label">Страна клуба</label>
                <select v-model="clubCountryId" @change="getSelectedCountryClubs" class="dropdown" id="playerCountry">
                    <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                </select>
            </div>
            <div class="form__block">
                <label for="playerClub" class="form__input_label">Клуб</label>
                <select v-model="player.club_id" class="dropdown" id="playerClub">
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
            <router-link :to="{name: 'players'}" class="link link--underlined">К списку игроков</router-link>
        </div>

    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "playerCreate",
    data(){
        return {
            player: {
                name: '',
                surname: '',
                birth: null,
                number: null,
                position_id: 1,
                country_id: null,
                club_id: 0,
            },
            clubCountryId: null,
            countries: [],
            clubs: [],
            positions: [
                {id: 1, name: "Нападающий"},
                {id: 2, name: "Полузащитник"},
                {id: 3, name: "Защитник"},
                {id: 4, name: "Вратарь"},
            ],
            errors: [],
            formSubmittingProcess: false,
            name: "Создание игрока"
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
                    this.player.country_id = this.countries[0]?.id
                    this.clubCountryId = this.countries[0]?.id
                    this.getSelectedCountryClubs()
                })
        },
        getSelectedCountryClubs(){
            console.log(this.player)
            this.clubs = []
            this.player.club_id = 0
            api.country.getById(this.clubCountryId)
                .then(data => {
                    this.clubs = data.clubs
                    // this.player.club_id = this.clubs[0]?.id
                })
        },
        submitForm(){
            if (this.formSubmittingProcess) return false

            this.errors = []

            if (!this.formValidated) {
                this.errors.push("Вы заполнили не все поля формы")
                return false
            }


            const creatingData = this.player
            if (!this.player.club_id) delete creatingData.club_id

            this.formSubmittingProcess = true

            api.player.create(creatingData)
                .then(data => {
                    console.log(data)
                    this.formSubmittingProcess = false
                    this.player = {
                        name: '',
                        surname: '',
                        birth: null,
                        number: null,
                        position_id: 1,
                        country_id: 1,
                        club_id: 0,
                    }
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
            return this.player.name.trim() &&
                this.player.birth &&
                this.player.country_id &&
                this.player.surname.trim() &&
                this.player.number &&
                this.player.club_id &&
                this.player.position_id
        }
    }
}
</script>

<style scoped>

</style>
