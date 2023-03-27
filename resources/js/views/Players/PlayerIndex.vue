<template>
<div class="container container--gap container--column container--pv">
    <h1 class="heading">Список игроков</h1>
    <div class="container container--gap-s">
        <router-link :to="{name: 'player.create'}" class="button button--full">Создать игрока</router-link>
    </div>
    <div class="container container--column container--gap-s" v-for="country in countries" :key="country.id" v-show="country.players.length > 0">
        <h2 class="heading heading--secondary">{{country.name}}</h2>
        <ul class="list">
            <li class="list__item" v-for="player in country.players" :key="player.id">
                <router-link :to="{name: 'player', params: {id: player.id}}" class="link link--with_icon">
                    <h3 class="heading">{{player.name}} {{player.surname}}</h3>
                    <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                </router-link>
                <div class="container container--v-center container--gap">
                    <h3 class="heading heading--secondary">{{player.position?.name || "Позиция неизвестна"}}</h3>
                    <h3 class="heading heading--secondary mobile_hidden">{{new Date(player.birth).toLocaleDateString()}}</h3>
                </div>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
import api from "../../api";
export default {
    name: "PlayerIndex",
    data (){
        return {
            title: "Игроки",
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
