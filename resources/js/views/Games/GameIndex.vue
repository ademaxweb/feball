<template>
    <div class="container container--gap container--column container--pv">

        <div class="container container--full container--column container--gap-s">
            <h1 class="heading heading--secondary">Live</h1>
            <ul class="list">
                <li class="list__item" v-show="liveGames && !liveGames.length">
                    <h3 class="heading">Активных событий пока нет</h3>
                </li>
                <li class="list__item" v-for="game in liveGames">
                    <div class="container container--v-center container--gap">
                        <router-link :to="{name: 'game', params: {id: game.id}}" class="link link--with_icon">
                            <h3 class="heading">{{game.name}}</h3>
                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                        </router-link>
                        <h3 class="heading--secondary">{{game.home_score}} : {{game.guest_score}}</h3>
                    </div>
                    <div class="container container--v-center container--gap">
                        <p class="info info--secondary">
                            Турнир: <span class="info--secondary--accent">{{game.tournament.name}}</span>
                        </p>
                        <p class="info info--secondary">
                            Стадион: <span class="info--secondary--accent">{{game.stadium.name}}</span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>

        <div v-for="tournament in tournaments" class="container container--full container--column container--gap-s" v-show="tournament.games.length > 0">
            <h1 class="heading heading--secondary">{{ tournament.name }}</h1>
            <ul class="list">
                <li class="list__item" v-for="game in tournament.games">
                    <div class="container container--v-center container--gap">
                        <router-link :to="{name: 'game', params: {id: game.id}}" class="link link--with_icon">
                            <h3 class="heading">{{game.name}}</h3>
                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                        </router-link>
                        <h3 class="heading--secondary">{{ getDateTime(game.date) }}</h3>
                    </div>
                    <div class="container container--v-center container--gap">
                        <p class="info info--secondary">
                            Турнир: <span class="info--secondary--accent">{{game.tournament.name}}</span>
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
    name: "GameIndex",
    data(){
        return {
            liveGames: null,
            tournaments: null,
            name: "Матчи"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    mounted() {
        api.game.getLive()
            .then(data => {
                console.log(data);
                this.liveGames = data
            })
            .catch(error => {
                console.log(error);
            })

        api.game.getByTournaments()
            .then(data => {
                console.log(data)
                this.tournaments = data
            })
            .catch(error => {
                console.log(error)
            })
    },
    methods: {
        getDateTime(strDate){
            const newDate = new Date(strDate)
            const dateOfEvent = newDate.toLocaleDateString()
            const timeOfEvent = newDate.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})
            return `${dateOfEvent} ${timeOfEvent}`
        }
    }
}
</script>

<style scoped>

</style>
