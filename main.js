const { createApp } = Vue

createApp({
    data() {
        return {
            message: 'Hello Vue!'
        }
    },
    methods: {

    },
    mounted() {
        this.readList();
    }
}).mount('#app')