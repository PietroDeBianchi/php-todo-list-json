const { createApp } = Vue

createApp({
    data() {
        return {
            listToDo: [],
            newTask: {
                task: '',
                done: false
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
                tasking: this.newTask
            };

            axios.post('functions.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then(response => {
                    this.listToDo = response.data;
                    this.newTask.task = '';
                })
        },
        toogleClass(todo) {
            if (todo.done == true) {

                todo.done = false;
            } else {
                todo.done = true;
            }
        },
        removeTask(index) {
            this.listToDo.splice(index, 1);
        },
    },
    mounted() {
        this.checkList();
    }
}).mount('#app');