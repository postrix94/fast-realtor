<template>
    <div class="row justify-center" style="padding: 0 15px;">
        <div class="col-xs col-md-6 mt-input" style="max-width: 600px;">
            <q-form class="">
                <q-input filled
                         ref="olx"
                         v-model="link"
                         label="Посиланная з olx"
                         :dense="dense"
                         bg-color="white"
                         color="red"
                         label-color="grey-10"
                         :input-style="{ color: 'rgb(0, 36, 51)',}"
                         :rules="olxInputRules"/>

                <q-btn @click="onClickOlx" color="secondary" text-color="white" label="Отримати" size="md"
                       style="width: 100%;margin-top: 5px;"/>
            </q-form>
        </div>
    </div>
</template>


<script>
import rules from "./validation.js";

export default {
    name: "Home",
    data() {
        return {
            link: "",
            dense: false,
            olxInputRules: [rules.linkOlx,],
            routes: {},
        }
    },
    mounted() {
        this.$eventEmitter.on("init",  (data) => this.routes = data.routes);
    },
    methods: {
        onClickOlx: function () {
            this.link = "http://m.olx.ua/?trdt"
            if(!this.validationOlxLink(this.link)) return;

            axios.post(this.routes.olx_parser, {olx:this.link})
        },

        validationOlxLink(link) {
            if (rules.linkOlx(link) !== true) {
                this.$refs.olx.focus();
                return false;
            }

            return true;
        }


    }
}
</script>

<style lang="scss" scoped>
.mt-input {
    margin-top: 50px
}


</style>
