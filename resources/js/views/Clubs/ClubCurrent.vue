<template>
    <div class="container--section container--gap container--pv" v-if="club">
        <h1 class="heading">{{club.name}}</h1>
        <h2 class="heading heading--secondary">Стадион: <span class="heading--secondary__accent">{{club.stadium.name}}</span></h2>
        <h2 class="heading heading--secondary">Год основания: <span class="heading--secondary__accent">{{new Date(club.founding).getFullYear()}}</span></h2>
        <h2 class="heading heading--secondary">Участие в турнирах:</h2>
        <ul class="list">
            <li class="list__item" v-if="!club.tournaments.length"><h3 class="heading">Турниров не найдено</h3></li>
            <li class="list__item" v-for="tournament in club.tournaments">
                <router-link :to="{name: 'index'}" class="link"><h3 class="heading">{{tournament.name}}</h3></router-link>
            </li>
        </ul>
        <h2 class="heading heading--secondary">Главный тренер:</h2>
        <div class="container club_players">
            <div class="club_player">
                <div class="club_player__image">
                    <img src="../../../img/unknown_player.jpg" alt="">
                </div>
                <div class="container">
                    <router-link :to="{name: 'index'}"><h3>{{club.manager.name}} {{club.manager.surname}}</h3></router-link>
                </div>
                <div class="container container--column">
                    <p class="club_player__secondary_text">{{club.manager.country.name}}</p>
                    <p class="club_player__secondary_text">{{getAge(club.manager.birth)}}</p>
                </div>
            </div>
        </div>
        <h2 class="heading heading--secondary">Игроки:</h2>
        <div class="container club_players">
            <div class="club_player" v-for="player in club.players">
                <div class="club_player__image">
                    <img src="../../../img/unknown_player.jpg" alt="">
                </div>
                <div class="container">
                    <router-link :to="{name: 'index'}"><h3>{{player.name}} {{player.surname}}</h3></router-link>
                </div>
                <div class="container container--column">
                    <p class="club_player__secondary_text">{{player.position.name}} #{{player.number}}</p>
                    <p class="club_player__secondary_text">{{player.country.name}}</p>
                    <p class="club_player__secondary_text">{{getAge(player.birth)}}</p>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "ClubCurrent",
    data(){
        return {
            club: null
        }
    },
    mounted() {
        api.club.getById(this.$route.params.id)
            .then(data => {
                this.club = data
                document.title = this.club.name
            })
            .catch(error => console.log(error))
    },
    methods: {
        getAge(birth){
            const today = new Date();
            const birthDate = new Date(birth);
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            const fn=(n, arr) => n+" "+arr[(n%100>4 && n%100<20)?2:[2, 0, 1, 1, 1, 2][(n%10<5)?n%10:5]];
            const arr1 = ['год', 'года', 'лет'];
            return fn(age, arr1);
        }
    }
}
</script>

<style lang="scss">

</style>
