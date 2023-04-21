const { createApp } = Vue

createApp({
    data() {
        return {
            listToDo: [],
            newTask: {
                task: '',
                todo: 'false',
            }
        }
    },
    methods: {
        checkList() {
            axios.get('functions.php')
                .then(response => {
                    console.log(response)
                    this.listToDo = response.data;
                })
        },
        addToDo() {
            const data = {
                newTask: this.newTask
            };

            axios.post('functions.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then(response => {
                    this.listToDo = response.data;
                    this.newTask = {
                        task: '',
                        todo: 'false',
                    };
                })
        },
    },
    mounted() {
        this.checkList();
    }
}).mount('#app');