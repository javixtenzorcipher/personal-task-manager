📋 Personal Task Manager

A simple task management web application built with Laravel.

📌 Project Information

Project Code: WST21-PM-2026-SF  
Student Name: James Lemmar R. Sabejon  
Course & Year: BSIT - 2nd Year  
Database Used: SQLite

✨ Features

- ➕ Add Task
- 👀 View Tasks
- ✏️ Edit Task
- 🗑️ Delete Task
- 🔄 Update Status
- 📅 Set a Due Date
- ✅ Form Validation
- ⚠️ Delete Confirmation
- 📆 Tasks are arranged by nearest due date

📝 Task Fields

- 📌 Task Name
- 📄 Description
- 🔖 Status
- 📅 Due Date

🛠️ Technologies Used

- 🔴 Laravel
- 🐘 PHP
- 🗄️ MySQL
- 🖥️ Blade
- 🌐 HTML
- 🎨 CSS
- ⚡ JavaScript

🗄️ Database

The application uses a `tasks` table containing:

- 🆔 id
- 📌 task_name
- 📄 description
- 🔖 status
- 📅 due_date

🏗️ Project Structure

The application follows the Laravel structure:

Database → Model → Controller → Routes → Blade → CRUD

🎯 Purpose

This project was created as a Laravel CRUD application to demonstrate basic task management and the connection between the database, model, controller, routes, and Blade views.

🚀 Additional Feature

Tasks are automatically arranged by due date, with the nearest deadline displayed first.

For example:

- 📅 September 25, 2026
- 📅 September 26, 2026
- 📅 September 28, 2026
- 📅 September 30, 2026