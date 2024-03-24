export default {
    methods: {
        successNotify(message) {
            this.$q.notify({
                type: "positive",
                position: "top-right",
                message,
            });
        },

        errorNotify(message) {
            this.$q.notify({
                type: "negative",
                position: "top-right",
                message,
            });
        },

    }
}
