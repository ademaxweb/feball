<template>
    <Header/>
    <main class="main">
        <div class="content">
            <router-view></router-view>
        </div>
    </main>
    <Footer/>
</template>

<script>
import Header from "./Components/Layout/Header.vue";
import Footer from "./Components/Layout/Footer.vue";
import api from "./api";

export default {
    name: "Index",
    components: {Header, Footer},
    mounted() {
        if (localStorage.getItem(api.LOCAL_STORAGE_KEY)){
            api.user.me()
                .then(data => {
                    this.$store.commit('authorize', data)
                })
                .catch(err => console.log(err.data))
        }

    }
}
</script>

<style scoped>

</style>
