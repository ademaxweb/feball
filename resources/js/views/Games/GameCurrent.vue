<template>
    <div class="container container--section container--gap container--pv container--center" v-if="game">
        <div class="container container--between container--full container--v-center">
            <h1 class="heading">{{game.name}}</h1>
            <div class="container container--v-center container--with-plate" v-if="!eventStarted">
                <h2 class="heading heading--secondary">Матч ещё не начался</h2>
            </div>
            <div class="container container--v-center container--with-plate" v-if="eventStarted">
                <h2 class="heading heading--secondary">{{ score }}</h2>
            </div>
            <h1 class="heading heading--secondary">{{ getDateTime(game.date) }}</h1>
        </div>

        <div class="container container--full container--column container--gap-s">
            <p class="info info--large info--secondary">
                Стадион:&nbsp;
                <router-link :to="{name: 'index'}" class="link link--with_icon info--secondary--accent">
                    {{game.stadium.name}}
                    <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                </router-link>
            </p>
            <p class="info info--large info--secondary">
                Турнир:&nbsp;
                <router-link :to="{name: 'index'}" class="link link--with_icon info--secondary--accent">
                    {{game.tournament.name}}
                    <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                </router-link>
            </p>
        </div>

        <div class="container container--section container--center container--gap">
            <h1 class="heading">Обзор</h1>
            <div class="container container--between container--full">
                <div class="container container--column container--half container--center">
                    <router-link :to="{name: 'club', params: {id: game.home.id}}" class="link">
                        <h2 class="heading heading--secondary">
                            {{game.home.name}}
                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                        </h2>

                    </router-link>
                </div>
                <div class="container container--column container--half container--center">
                    <router-link :to="{name: 'club', params: {id: game.guest.id}}" class="link">
                        <h2 class="heading heading--secondary">
                            {{game.guest.name}}
                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                        </h2>
                    </router-link>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "GameCurrent",
    data(){
        return {
            game: null
        }
    },
    mounted() {
        api.game.getById(this.$route.params.id)
            .then(data => {
                this.game = data
                document.title = this.game.name
            })
            .catch(error => console.log(error))
    },

    computed: {
        score(){
            return `${this.game.home_score} : ${this.game.guest_score}`
        },
        eventStarted(){
            return false
        }
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

<style lang="scss">

</style>
