<template>
    <div class="container container--gap container--column container--pv">
        <h1 class="heading">Список стран</h1>
        <ul class="list" v-if="countries">
            <li class="list__item" v-for="country in countries" :key="country.id">
                <router-link :to="{name: 'country', params: {id: country.id}}" class="link link--with_icon">
                    <h3 class="heading">{{country.name}}</h3>
                    <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                </router-link>
                <!--                <h3 class="heading heading&#45;&#45;secondary">{{new Date(club.founding).getFullYear()}}</h3>-->
            </li>
        </ul>

    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "CountryIndex",
    data (){
        return {
            countries: null
        }
    },
    methods: {
        getCountries(){
            this.countries = null
            api.country.getAll()
                .then(data => {
                    this.countries = data
                    console.log(data);
                })
        }
    },
    mounted() {
        this.getCountries()
    }
}
</script>

<style scoped>

</style>
