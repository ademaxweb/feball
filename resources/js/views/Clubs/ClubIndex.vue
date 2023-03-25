<template>
    <div class="container container--gap container--column container--pv">
        <h1 class="heading">Список клубов</h1>
        <div class="container container--gap-s">
            <router-link :to="{name: 'club.create'}" class="button button--full">Создать клуб</router-link>
        </div>
        <div class="container container--column container--gap-s" v-for="country in countries" :key="country.id" v-show="country.clubs.length > 0">
            <h2 class="heading heading--secondary">{{country.name}}</h2>
            <ul class="list">
                <li class="list__item" v-for="club in country.clubs" :key="club.id">
                    <router-link :to="{name: 'club', params: {id: club.id}}" class="link link--with_icon">
                        <h3 class="heading">{{club.name}}</h3>
                        <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                    </router-link>
                    <h3 class="heading heading--secondary">{{new Date(club.founding).getFullYear()}}</h3>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
import api from "../../api";
export default {
    name: "ClubIndex",
    data(){
        return {
            countries: null,
            name: "Клубы"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    mounted() {
        api.club.getByCountries()
            .then(response => {
                this.countries = response
                console.log(this.countries);
            })
            .catch(error => {
                console.log(error);
            })
    }
}
</script>

<style scoped>

</style>
