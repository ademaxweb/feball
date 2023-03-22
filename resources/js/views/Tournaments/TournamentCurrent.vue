<template>
    <div class="container container--section container--gap container--pv" v-if="tournament">
        <h1 class="heading">{{tournament.name}}</h1>
        <h2 class="heading heading--secondary">Клубов в турнире: <span class="info--secondary--accent">{{tournament.clubs_count}}</span></h2>
        <div class="container container--full container--column container--gap-s">
            <h2 class="heading heading--secondary">Последние матчи:</h2>
            <ul class="list">
                <li class="list__item" v-for="game in tournament.games">
                    <div class="container container--v-center container--gap">
                        <router-link :to="{name: 'game', params: {id: game.id}}" class="link link--with_icon">
                            <h3 class="heading">{{game.name}}</h3>
                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                        </router-link>
                        <h3 class="heading--secondary">{{game.home_score}} : {{game.guest_score}}</h3>
                    </div>
                    <div class="container container--v-center container--gap">
                        <p class="info info--secondary">
                            Дата: <span class="info--secondary--accent">{{new Date(game.date).toLocaleDateString()}}</span>
                        </p>
                        <p class="info info--secondary">
                            Стадион: <span class="info--secondary--accent">{{game.stadium.name}}</span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "TournamentCurrent",
    data(){
        return {
            tournament: null
        }
    },
    mounted() {
        api.tournament.getById(this.$route.params.id)
            .then(data => {
                this.tournament = data
                console.log(data);
            })
    },
}
</script>

<style scoped>

</style>
