<template>
    <div>
        <h2>Profile</h2>
        <p>Имя пользователя: {{ user.name }}</p>
        <p>Почта: {{ user.email }}</p>
        <button @click="logout" class="button button--danger">Выйти из аккаунта</button>
    </div>
</template>

<script>
import api from "../api";

export default {
    name: "Profile",
    computed: {
        user(){
            return this.$store.getters.getUser
        }
    },
    data(){
        return {
            name: "Профиль"
        }
    },
    beforeMount() {
        document.title = this.name
    },
    methods: {
        logout(){
            api.user.logout().then(()=>{
                return this.$router.push({name: 'login'})
            })
        }
    }
}
</script>

<style scoped>

</style>
