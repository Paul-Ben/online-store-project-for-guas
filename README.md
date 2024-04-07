# E-commerce web Application

### Author: Paul-Ben Ajene

## Description:
This is an E-commerce web application built using Laravel (laravel version 9).

# How to Use
- Clone the repository and navigate (cd) into it: `git clone https://github.dev/Paul-Ben/online-store-project-for-guas`

- copy contents of `.env.example` file to `.env file.`
- update the database details in the .env file as
  - `DB_DATABASE= your_Database_name` 
  - `DB_USERNAME=your_username` 
  - `DB_PASSWORD=your_password`
- run the commands: `composer update` and `composer install`
- Next run the command: `php artisan migrate`  to run the database migrations 
- Next , you can seed the database by running this command : `php artisan db:seed`. This will add an admin user and a test user the credentials for both are:
- - `Admin User Email: admin@email.com`
    - `Password : password`
- - `Test User  Email: test@emial.com`
    - `Password : password`
- Next run the command: `php artisan serve` to run the server to serve the project.
- browser url is http://127.0.0.1:8000 to check that the application is running fine.
- visit http://127.0.0.1:8000/register to register a new account
- to view the admin panel, change user status in the database to is_admin.
