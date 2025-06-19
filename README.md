# 🏥 SmartClinic — Медична CRM

This is a web application built with Laravel that allows you to manage medical records, patients, doctors, and clinic administration.

## Technologies Used

- **Laravel**
- **Blade шаблони**
- **Tailwind CSS**
- **MySQL**
- **Auth Guards** 
- **Middleware**

## Launch instructions

1. Clone the repository: `git clone https://github.com/Grizerl/SmartClinic.git`.
2. Change to the project folder: `cd clinic`.
3. Install the dependencies: `composer install`.
4. Set up the .env file by copying from the example: `cp .env.example .env`.
5. Configure the database connection in your .env file:
DB_CONNECTION=mysql  
DB_HOST=your_database_host  
DB_PORT=your_database_port  
DB_DATABASE=your_database_name  
DB_USERNAME=your_database_user  
DB_PASSWORD=your_database_password
6. Generate the application key: `php artisan key:generate`.
7. Run the database migrations: `php artisan migrate`.
8. Run the seeder: `php artisan migrate --seed`.
9. Start the Laravel development server: `php artisan serve`.