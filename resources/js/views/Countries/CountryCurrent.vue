<template>
    <div class="container container--section container--gap container--pv" v-if="country">
        <h1 class="heading heading--secondary">Страна #{{country.id}}: <span class="heading--secondary__accent">{{country.name}}</span></h1>
        <div class="container container--full container--gap-s">
            <button class="button button--action button--danger" @click="deleteCountry">Удалить</button>
        </div>
        <div class="container container--full container--column container--gap-s">
            <h2 class="heading heading--secondary">Клубы страны:</h2>
            <ul class="list">
                <li class="list__item" v-if="!country.clubs || !country.clubs.length">
                    <div class="container container--v-center container--gap">
                        <h3 class="heading">Клубов не найдено</h3>
                    </div>
                </li>
                <li class="list__item" v-for="club in country.clubs">
                    <div class="container container--v-center container--gap">
                        <router-link :to="{name: 'club', params: {id: club.id}}" class="link link--with_icon">
                            <h3 class="heading">{{club.name}}</h3>
                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                        </router-link>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "CountryCurrent",
    data (){
        return {
            country: null,
            country_id: null,
        }
    },
    methods: {
        getCountryInfo(){
            this.country = null
            api.country.getById(this.$route.params.id)
                .then(data => {
                    this.country = data
                    console.log(data);
                })
        },
        deleteCountry(){
            if (!this.country_id) return false
            api.country.delete(this.country_id)
                .then(data => {
                    console.log(data)
                    this.country = null
                    this.$router.push({name: "countries"})
                })
                .catch(error => {
                    console.error(error)
                })
        }
    },
    mounted() {
        this.country_id = this.$route.params.id
        this.getCountryInfo()
    }
}
</script>

<style scoped>

</style>
