<template>
    <div class="container container--section container--gap container--pv" v-if="player">
        <h1 class="heading">{{player.name}} {{player.surname}}</h1>
        <div class="container container--full container--gap-s">
            <button class="button button--action button--danger" @click="deleteplayer">Удалить</button>
        </div>
        <div class="container container--full">
            <div class="container container--half container--column container--gap-s">
                <h2 class="heading heading--secondary">Позиция: <span class="info--secondary--accent">{{ player.position.name }}</span></h2>
                <h2 class="heading heading--secondary">Игровой номер: <span class="info--secondary--accent">{{ player.number }}</span></h2>
                <h2 class="heading heading--secondary">Дата рождения: <span class="info--secondary--accent">{{ new Date(player.birth).toLocaleDateString() }}</span></h2>
            </div>
            <div class="container container--half container--column container--gap-s container--right">
                <h2 class="heading heading--secondary" v-if="player.club">
                    Клуб:
                    <router-link :to="{name: 'club', params: {id: player.club.id}}" class="link link--with_icon">
                        {{player.club.name}}
                        <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                    </router-link>
                </h2>
                <h2 class="heading heading--secondary" v-if="player.country">
                    Гражданство:
                    <router-link :to="{name: 'country', params: {id: player.country.id}}" class="link link--with_icon">
                        {{player.country.name}}
                        <font-awesome-icon class="link__icon" icon="fa-solid fa-link" />
                    </router-link>
                </h2>
            </div>
        </div>



    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "playerCurrent",
    data(){
        return {
            player: null,
            player_id: null,
        }
    },
    methods: {
        getPlayerInfo(){
            this.player = null
            api.player.getById(this.$route.params.id)
                .then(data => {
                    this.player = data
                    console.log(data);
                    document.title = `${data.surname} ${data.name}`
                })
        },
        deleteplayer (){
            if (!this.player_id) return false
            api.player.delete(this.player_id)
                .then(data => {
                    this.player = null
                    this.$router.push({name: "players"})
                })
                .catch(error => console.error(error))
        }
    },
    mounted() {
        this.player_id = this.$route.params.id
        this.getPlayerInfo()
    },
}
</script>

<style scoped>

</style>
