<template>
    <q-header elevated class="text-white p-fixed" style="background: #24292e" height-hint="61.59">
        <q-toolbar class="q-py-sm q-px-md">
            <RouterLink :to="{name:'home'}">
                <q-btn round dense flat :ripple="false" :icon="fabGithub" size="19px" color="white" class="q-mr-sm"
                       no-caps/>
            </RouterLink>
            <q-space/>

            <div>Меню</div>
            <div class="q-pl-sm q-gutter-sm row items-center no-wrap">
                <q-btn dense flat no-wrap>
                    <q-icon name="arrow_drop_down" size="16px"/>
                    <q-menu auto-close>
                        <q-list dense>
                            <q-separator/>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Оголошення</q-item-section>
                            </q-item>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Your repositories</q-item-section>
                            </q-item>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Your projects</q-item-section>
                            </q-item>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Your stars</q-item-section>
                            </q-item>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Your gists</q-item-section>
                            </q-item>
                            <q-separator/>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>О нас</q-item-section>
                            </q-item>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Налаштування</q-item-section>
                            </q-item>
                            <q-item clickable class="GL__menu-link">
                                <q-item-section>Вихід</q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </q-btn>
            </div>
        </q-toolbar>
    </q-header>
</template>

<script>
import {fabGithub} from '@quasar/extras/fontawesome-v6';
export default {
    name: "Navigation",
    data() {
        return {
            text: "",
            options: "",
            filteredOptions: [],
            search: null,
            stringOptions: [
                'quasarframework/quasar',
                'quasarframework/quasar-awesome'
            ],
            fabGithub,
        }
    },

    methods: {
        filter: (val, update) => {
            if (this.options === null) {
                // load data
                setTimeout(() => {
                    this.options = this.stringOptions;
                    this.search.filter('');
                }, 2000)
                update()
                return
            }

            if (val === '') {
                update(() => {
                    this.filteredOptions = this.options.map(op => ({label: op}))
                })
                return
            }

            update(() => {
                this.filteredOptions = [
                    {
                        label: val,
                        type: 'In this repository'
                    },
                    {
                        label: val,
                        type: 'All GitHub'
                    },
                    ...this.options
                        .filter(op => op.toLowerCase().includes(val.toLowerCase()))
                        .map(op => ({label: op}))
                ]
            })
        }
    }
}
</script>

<style scoped>

</style>
