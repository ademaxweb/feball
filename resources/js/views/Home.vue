<template>
    <div>Home page</div>
</template>

<script>
import api from "../api";

export default {
    name: "Home",
    mounted() {
        this.$router.push({name: "clubs"})
    },
}
</script>

<style scoped>

</style>
