<footer class="footer pt-5">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>
            <a href="#xyzcncwebsite" class="font-weight-bold" target="_blank">Concept N Controls</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="http://localhost/diploma_Final_year_project/#aboutus" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/diploma_Final_year_project/#contact-us" class="nav-link pe-0 text-muted" target="_blank">Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/diploma_Final_year_project/" class="nav-link pe-0 text-muted" target="_blank">Our Product</a>
            </li>
            <li class="nav-item">
              <a href="http://localhost/diploma_Final_year_project/" class="nav-link pe-0 text-muted" target="_blank">Our Services</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</main>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/perfect-scrollbar.min.js"></script>
<script src="../assets/js/smooth-scrollbar.min.js"></script>
<!--Alertify JS-->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
  <?php
  if(isset($_SESSION['msg'])){ ?>
  
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?= $_SESSION['msg']?>');
  <?php
     unset($_SESSION['msg']);
  }
  ?>

  </script>
  <!--Todo list JS-->
  <script>
document.addEventListener("DOMContentLoaded", function () {
    displayTasks();
});

function displayTasks() {
    const taskList = document.getElementById("taskList");
    taskList.innerHTML = "";

    // Fetch tasks from storage
    const tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    tasks.forEach(function (task, index) {
        const li = document.createElement("li");
        li.innerHTML = `
            <span>${task}</span>
            <span class="delete-btn" onclick="deleteTask(${index})">&#10006;</span>
            <span class="update-btn" onclick="updateTask(${index})">&#9998;</span>
        `;
        taskList.appendChild(li);
    });
}

function addTask() {
    const taskInput = document.getElementById("taskInput");
    const task = taskInput.value.trim();

    if (task !== "") {
        // Fetch tasks from storage
        const tasks = JSON.parse(localStorage.getItem("tasks")) || [];

        // Add new task
        tasks.push(task);

        // Save tasks to storage
        localStorage.setItem("tasks", JSON.stringify(tasks));

        // Display tasks
        displayTasks();

        // Clear input field
        taskInput.value = "";
    }
}

function deleteTask(index) {
    // Fetch tasks from storage
    const tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    // Remove the task at the specified index
    tasks.splice(index, 1);

    // Save tasks to storage
    localStorage.setItem("tasks", JSON.stringify(tasks));

    // Display tasks
    displayTasks();
}

function updateTask(index) {
    // Fetch tasks from storage
    const tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    // Prompt user for the updated task
    const updatedTask = prompt("Update task:", tasks[index]);

    if (updatedTask !== null) {
        // Update the task at the specified index
        tasks[index] = updatedTask;

        // Save tasks to storage
        localStorage.setItem("tasks", JSON.stringify(tasks));

        // Display tasks
        displayTasks();
    }
}
    </script>
</body>

</html>