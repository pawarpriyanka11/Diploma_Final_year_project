    document.addEventListener('DOMContentLoaded', function () {
        const todoList = document.getElementById('todo-list');
        const taskInput = document.getElementById('task-input');
        const addTaskBtn = document.getElementById('add-task-btn');

        // Load tasks from local storage on page load
        function loadTasks() {
            const savedTasks = JSON.parse(localStorage.getItem('tasks')) || [];
            savedTasks.forEach(taskText => {
                addTask(taskText);
            });
        }

        // Add task to the list and local storage
        function addTask(taskText) {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.innerHTML = `
                ${taskText}
                <button type="button" class="btn btn-danger btn-sm float-end delete-task-btn">Delete</button>
                <button type="button" class="btn btn-primary btn-sm float-end edit-task-btn">Edit</button>
            `;
            todoList.appendChild(listItem);

            // Save tasks to local storage
            saveTasks();
        }

        // Save tasks to local storage
        function saveTasks() {
            const tasks = Array.from(todoList.children).map(task => task.firstChild.textContent.trim());
            localStorage.setItem('tasks', JSON.stringify(tasks));
        }

        // Add Task function
        function addTaskHandler() {
            const taskText = taskInput.value.trim();
            if (taskText !== '') {
                addTask(taskText);
                taskInput.value = ''; // Clear the input field
            }
        }

        // Event listener for clicking the "Add Task" button
        addTaskBtn.addEventListener('click', addTaskHandler);

        // Event listener for pressing the Enter key in the task input
        taskInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                addTaskHandler();
            }
        });

        // Delete and Edit Task functionality
        todoList.addEventListener('click', function (event) {
            const target = event.target;
            if (target.classList.contains('delete-task-btn')) {
                target.parentNode.remove(); // Remove the task
                saveTasks();
            } else if (target.classList.contains('edit-task-btn')) {
                const newText = prompt('Edit task:', target.parentNode.firstChild.textContent);
                if (newText !== null) {
                    target.parentNode.firstChild.textContent = newText;
                    saveTasks();
                }
            }
        });

        // Load tasks on page load
        loadTasks();
    });
