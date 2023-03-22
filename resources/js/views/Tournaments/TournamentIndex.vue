<template>
    <div class="container container--gap container--column container--pv">
        <h1 class="heading">Список турниров</h1>
        <ul class="list">
            <li class="list__item" v-for="tournament in tournaments" :key="tournament.id">
                <router-link :to="{name: 'tournament', params: {id: tournament.id}}" class="link link--with_icon">
                    <h3 class="heading">{{tournament.name}}</h3>
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
    name: "TournamentIndex",
    data(){
        return {
            name: "Турниры",
            tournaments: []
        }
    },
    beforeMount() {
        document.title = this.name
    },
    mounted() {
        api.tournament.getAll()
            .then(data => {
                this.tournaments = data
            })
    },
}
</script>

<style scoped>

</style>
