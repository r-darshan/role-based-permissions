# Role based access Admin Panel

Admin has access to create sub-admins and admin will decide who to give what permissions

steps:
1. clone the project
2. run `composer install` command
3. copy and paste `.env.example` and rename it to `.env`
4. create a database with name `admin_panel` in your phpmyadmin
5. run `php artisan migrate:fresh --seed` command
     ->  several users will be ceated
        admin creds
        email: admin1@gmail.com
        password: admin1@gmail.com
6. run `php artisan serve` to start the server

