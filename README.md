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
![Screenshot from 2022-11-11 14-09-25](https://github.com/user-attachments/assets/6ebe85eb-cab9-4a99-9129-521422bcd548)
  ![Screenshot from 2022-11-11 20-31-42](https://github.com/user-attachments/assets/d74a0f3b-602e-42b7-ac0c-30a8ff224ef3)
  ![Screenshot from 2022-11-11 20-31-50](https://github.com/user-attachments/assets/2044dedb-5f94-4673-ae7d-8f69e6e2951d)

![Screenshot from 2022-11-11 20-31-58](https://github.com/user-attachments/assets/dd47d3c3-5e03-4972-ade9-2215c3fad427)
![Screenshot from 2022-11-11 20-32-09](https://github.com/user-attachments/assets/54b189f2-2455-482a-964e-744d0f978d1a)
![Screenshot from 2022-11-11 20-32-31](https://github.com/user-attachments/assets/5b9422d0-32ff-49fd-b0a5-360f7e2a47b3)
![Screenshot from 2022-11-11 20-32-31](https://github.com/user-attachments/assets/80ebd19c-c3fe-4b67-a7a7-de5deb87692c)
![Screenshot from 2022-11-11 20-35-22](https://github.com/user-attachments/assets/e19b828d-1b0c-47ce-a8a0-d57a445272a6)
![Screenshot from 2022-11-11 20-35-48](https://github.com/user-attachments/assets/934006a3-537f-41d7-bd9f-a995536ad4cf)





