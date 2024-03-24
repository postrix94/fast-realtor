<template>
    <q-layout>
        <Navigation/>
        <q-page-container>
            <RouterView/>
        </q-page-container>
    </q-layout>
</template>

<script>
import Navigation from "@/components/Partials/Navigation.vue";

export default {
    name: 'Main',
    components: {Navigation},
    props: {
      data: {
          required: true,
      }
    },
    mounted() {
        this.$eventEmitter.emit("init", this.data);
    },
}
</script>

<style lang="sass">
.GL
    //&__select-GL__menu-link
    .default-type
        visibility: hidden

        &:hover
            background: #0366d6
            color: white

            .q-item__section--side
                color: white

            .default-type
                visibility: visible

    &__toolbar-link
        a
            color: white
            text-decoration: none

            &:hover
                opacity: 0.7

    &__menu-link:hover
        background: #0366d6
        color: white

    &__menu-link-signed-in,
    &__menu-link-status
        &:hover
            & > div
                background: white !important

    &__menu-link-status
        color: $blue-grey-6

        &:hover
            color: $light-blue-9

    &__toolbar-select.q-field--focused
        width: 450px !important

        .q-field__append
            display: none
</style>
