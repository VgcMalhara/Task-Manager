# 🚀 Task Management System - Technical Assessment

This project is a **Task Management System** developed as part of the software engineering internship technical assessment for **Agro Ventures Digital**.

## 🌟 Key Features

- **User Authentication**: Secure Login and Registration via Laravel Breeze.
- **Full CRUD Functionality**: Create, Read, Update, and Delete tasks seamlessly.
- **Soft Deletes**: Tasks are preserved in the database (Audit-friendly) using Laravel's `SoftDeletes`.
- **Pagination**: Optimized viewing experience with 10 tasks per page.
- **Status Filtering**: Filter tasks by "Pending", "In Progress", or "Completed".
- **Responsive UI**: Styled with Tailwind CSS for a modern look.

## 🛠️ Tech Stack

- **Framework**: Laravel 11.x
- **Database**: MySQL
- **Frontend**: Tailwind CSS & Blade Templates

## ⚙️ Setup & Installation Instructions

Follow these steps to set up the project locally:

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/VgcMalhara/Task-Manager.git
    cd task-manager
    ```

Install Dependencies:
Bash

    composer install
    npm install && npm run build

    Environment Configuration:
    Copy the example environment file and generate the application key:
    Bash

    cp .env.example .env
    php artisan key:generate

    Database Setup:

        Create a database named task_manager in MySQL.

        Update your .env file with the database credentials.

    Run Migrations:
    Bash

    php artisan migrate

    Start the Application:

    Terminal 1 (Backend):
    Bash

    php artisan serve

    Terminal 2 (Frontend Assets):
    Bash

    npm run dev

🔑 Environment Variables (.env)

Make sure these variables are correctly configured in your .env file for the app to function:
Variable Description Default/Recommended Value
DB_CONNECTION Database Driver mysql
DB_HOST Database Host 127.0.0.1
DB_PORT Database Port 3306
DB_DATABASE Database Name task_manager
DB_USERNAME DB Username root
DB_PASSWORD DB Password (Your local password)
APP_URL Application URL http://127.0.0.1:8000
