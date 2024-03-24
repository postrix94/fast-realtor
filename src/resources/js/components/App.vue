<template>
    <Main v-if="showTemplate" :data="data"/>
</template>

<script>
import Main from "@/components/Template/Main.vue";

export default {
    name: "App",
    components: {Main},
    created() {
        this._init();
    },
    data() {
        return {
            showTemplate: false,
            data: null
        }
    },
    methods: {
        _init() {
            axios.post('api/home')
                .then(response => {
                    this.data = response.data;
                    this.showTemplate = true;
                })
                .catch(error => {
                    this.errorNotify("Помилка");
                })
        }
    }
}
</script>

<style scoped>


</style>
