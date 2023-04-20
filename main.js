const { createApp } = Vue

createApp({
    data() {
        return {
            listToDo: []
        }
    },
    methods: {
        checkList() {
            axios.get('functions.php')
                .then(response => {
                    console.log(response)
                    this.listToDo = response.data;
                })
        }
    },
    mounted() {
        this.checkList();
    }
}).mount('#app')