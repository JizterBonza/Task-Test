To run the project locally:
1. Start the Apache and MySQL in your cross-platform web server. Ex. Xampp or Wampp or etc.
2. Open terminal
3. Change directory to "jizter-todo-list-app". To change directory, run "cd jizter-todo-list-app".
4. Migrate database and tables. To migrate, run "php artisan migrate".
5. Start the application. To start, run "php artisan serve". Follow the provided link of the application.
6. I've worked on APIs on this project. You can test this APIs via Postman. Here are the following APIs.
   - To create new task -> POST http://127.0.0.1:8000/api/tasks?add_task_title=Sample Task Title 3&add_task_description=Sample Task Description 3
   - To retrieve all tasks -> GET http://127.0.0.1:8000/api/tasks
   - To update a task -> POST http://127.0.0.1:8000/api/tasks_update?task_id=
   - To delete/soft delete a task -> POST http://127.0.0.1:8000/api/tasks_delete?task_id=
