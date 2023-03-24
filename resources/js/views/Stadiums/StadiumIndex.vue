<template>
<div class="container container--gap container--column container--pv">
    <h1 class="heading">Список стадионов</h1>
    <div class="container container--column container--gap-s" v-for="country in countries" :key="country.id" v-show="country.stadiums.length > 0">
        <h2 class="heading heading--secondary">{{country.name}}</h2>
        <ul class="list">
            <li class="list__item" v-for="stadium in country.stadiums" :key="stadium.id">
                <router-link :to="{name: 'stadium', params: {id: stadium.id}}" class="link link--with_icon">
                    <h3 class="heading">{{stadium.name}}</h3>
                    <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                </router-link>
                <div class="container container--v-center container--gap">
                    <p class="info info--secondary">
                        Клуб: <span class="info--secondary--accent">{{stadium.club.name}}</span>
                    </p>
                    <h3 class="heading heading--secondary">{{new Date(stadium.founding).getFullYear()}}</h3>
                </div>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
import api from "../../api";
export default {
    name: "StadiumIndex",
    data (){
        return {
            title: "Стадионы",
            countries: null
        }
    },
    methods: {
        getCountries (){
            api.country.getAllFull()
                .then(data => {
                    console.log(data);
                    this.countries = data
                })
        }
    },
    beforeMount() {
        document.title = this.title
    },
    mounted() {
        this.getCountries()
    }
}
</script>

<style scoped>

</style>
