<template>
    <div class="container--section container--gap container--pv" v-if="club">
        <h1 class="heading heading--secondary">Клуб #{{club.id}}: <span class="heading--secondary__accent">{{club.name}}</span></h1>
        <div class="container container--full container--gap-s">
            <button class="button button--action button--danger" @click="deleteClub">Удалить</button>
        </div>
        <h2 class="heading heading--secondary">
            Стадион:
            <span v-if="!club.stadium">Неизвестно</span>
            <router-link v-if="club.stadium" :to="{name: 'stadium', params: {id: club.stadium?.id || 1}}" class="link link--with_icon">
                {{club.stadium?.name || "Неизвестно"}}
                <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
            </router-link>
        </h2>
        <h2 class="heading heading--secondary">Год основания: <span class="heading--secondary__accent">{{new Date(club.founding).getFullYear()}}</span></h2>
        <h2 class="heading heading--secondary">
            Страна:
            <span v-if="!club.country">Неизвестно</span>
            <router-link :to="{name: 'country', params: {id: club.country?.id}}" class="link link--with_icon">
                {{club.country?.name || Неизвестно}}
                <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
            </router-link>
        </h2>
        <h2 class="heading heading--secondary">Участие в турнирах:</h2>
        <ul class="list">
            <li class="list__item" v-if="!club.tournaments.length"><h3 class="heading">Турниров не найдено</h3></li>
            <li class="list__item" v-for="tournament in club.tournaments">
                <router-link :to="{name: 'tournament', params: {id: tournament.id}}" class="link"><h3 class="heading">{{tournament.name}}</h3></router-link>
            </li>
        </ul>
        <h2 class="heading heading--secondary">Главный тренер: <span class="heading--secondary__accent" v-if="!club.manager">Не известен</span></h2>
        <div class="container club_players" v-if="club.manager">
            <div class="club_player">
                <div class="club_player__image">
                    <img src="../../../img/unknown_player.jpg" alt="">
                </div>
                <div class="container">
                    <router-link :to="{name: 'index'}"><h3>{{club.manager?.name || "Неизвестно"}} {{club.manager?.surname || "Неизвестно"}}</h3></router-link>
                </div>
                <div class="container container--column">
                    <p class="club_player__secondary_text">{{club.manager?.country.name || "Неизвестно"}}</p>
                    <p class="club_player__secondary_text">{{getAge(club.manager?.birth)}}</p>
                </div>
            </div>
        </div>
        <h2 class="heading heading--secondary">Игроки: <span class="heading--secondary__accent" v-if="!club.players.length">Не найдены</span></h2>
        <div class="container club_players" v-if="club.players.length">
            <div class="club_player" v-for="player in club.players">
                <div class="club_player__image">
                    <img src="../../../img/unknown_player.jpg" alt="">
                </div>
                <div class="container">
                    <router-link :to="{name: 'player', params: {id: player.id}}"><h3>{{player.name}} {{player.surname}}</h3></router-link>
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
            club: null,
            club_id: null
        }
    },
    mounted() {
        this.club_id = this.$route.params.id
        api.club.getById(this.club_id)
            .then(data => {
                this.club = data
                document.title = this.club.name
                console.log(data)
            })
            .catch(error => console.log(error))
    },
    methods: {
        getAge(birth){
            if (!birth) return "Неизвестно"
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
        },
        deleteClub(){
            if (!this.club_id) return false
            api.club.delete(this.club_id)
                .then(data => {
                    console.log(data)
                    this.club = null
                    this.$router.push({name: "clubs"})
                })
                .catch(error => console.error(error))

        }
    }
}
</script>

<style lang="scss">

</style>
