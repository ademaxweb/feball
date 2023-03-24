<template>
    <div class="container container--section container--gap container--pv" v-if="stadium">
        <h1 class="heading">{{stadium.name}}</h1>
        <h2 class="heading heading--secondary">Вместимость стадиона: <span class="info--secondary--accent">{{ (15000).toLocaleString() }}</span></h2>
        <h2 class="heading heading--secondary">
            Клуб:
            <router-link :to="{name: 'club', params: {id: stadium.club.id}}" class="link link--with_icon">
                {{stadium.club.name}}
                <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
            </router-link>
        </h2>
        <h2 class="heading heading--secondary">Год постройки: <span class="heading--secondary__accent">{{stadium.founding}}</span></h2>
<!--        <div class="container container&#45;&#45;full container&#45;&#45;column container&#45;&#45;gap-s">-->
<!--            <h2 class="heading heading&#45;&#45;secondary">Последние матчи:</h2>-->
<!--            <ul class="list">-->
<!--                <li class="list__item" v-for="game in tournament.games">-->
<!--                    <div class="container container&#45;&#45;v-center container&#45;&#45;gap">-->
<!--                        <router-link :to="{name: 'game', params: {id: game.id}}" class="link link&#45;&#45;with_icon">-->
<!--                            <h3 class="heading">{{game.name}}</h3>-->
<!--                            <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />-->
<!--                        </router-link>-->
<!--                        <h3 class="heading&#45;&#45;secondary">{{game.home_score}} : {{game.guest_score}}</h3>-->
<!--                    </div>-->
<!--                    <div class="container container&#45;&#45;v-center container&#45;&#45;gap">-->
<!--                        <p class="info info&#45;&#45;secondary">-->
<!--                            Дата: <span class="info&#45;&#45;secondary&#45;&#45;accent">{{new Date(game.date).toLocaleDateString()}}</span>-->
<!--                        </p>-->
<!--                        <p class="info info&#45;&#45;secondary">-->
<!--                            Стадион: <span class="info&#45;&#45;secondary&#45;&#45;accent">{{game.stadium.name}}</span>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "StadiumCurrent",
    data(){
        return {
            stadium: null
        }
    },
    methods: {
        getStadiumInfo(){
            this.stadium = null
            api.stadium.getById(this.$route.params.id)
                .then(data => {
                    this.stadium = data
                    console.log(data);
                    document.title = data.name
                })
        }
    },
    mounted() {
        this.getStadiumInfo()
    },
}
</script>

<style scoped>

</style>
