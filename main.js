const { createApp } = Vue;

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
        // Fetch list of tasks from server
        checkList() {
            axios.get('functions.php')
                .then(response => {
                    console.log(response);
                    this.listToDo = response.data;
                })
                .catch(error => {
                    console.error('Failed to fetch list of tasks:', error);
                });
        },
        // Submit new task to server
        submit() {
            const data = {
                tasking: this.newTask
            };

            axios.post('functions.php', data, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then(response => {
                    this.listToDo = response.data;
                    this.newTask.task = '';
                })
                .catch(error => {
                    console.error('Failed to submit task:', error);
                });
        },
        removeTask(index) {
            // Send POST request to server with task index as parameter
            const data = {
            remove: index
            };
            axios.post('functions.php', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
            .then(response => {
                // Update list of tasks in Vue component
                this.listToDo = response.data;
            })
            .catch(error => {
                console.error('Failed to remove task:', error);
            });
        },
        // Toggle task's done status
        toggleClass(index) {
            // Send POST request to server with updated task data
            const data = {
                toggle: index
            };
            axios.post('functions.php', data, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then(response => {
                    // Update list of tasks in Vue component
                    this.listToDo = response.data;
                })
                .catch(error => {
                    console.error('Failed to update task:', error);
                });
        },
    },
    mounted() {
        // Fetch initial list of tasks when component is mounted
        this.checkList();
    }
}).mount('#app');

