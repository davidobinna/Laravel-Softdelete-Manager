I have created a Soft Delete manager in this Laravel application, so when we whenever we delete any data record from or within our web application, then that data is not completely deleted from database. The most intresting part is we will not be able to see that deleted data on our web application front-end side and at back-end. with softdelete manager, we can again recover and display that deleted data record in our application. So this things we will briefly discussed under this repo by taking practical example on how soft delete work in Laravel8 crud application. please not that this file is not a complete laravel app, because of github space i only documented the important files for soft Delete manager.

#How it works
Suppose we have used Soft delete class in Laravel web application, so when we have remove data from our application then that data is not completetly removed from Mysql Database table. But current timestamp time has been updated at the deleted_at column. And when we restore that deleted data then current timestamp value will be updated with nulled in deleted_at table column.

Please follow below step for how to implement soft delete in Laravel application for restore deleted records.

#1. Install laravel framework
 Go to command prompt and run following command.
 composer create-project --prefer-dist laravel/laravel app_name

#2. Make Database Connection
After download latest version of Laravel framework, first we need to make database connection. So for make database connection in Laravel application, we have to open .env file "environment variabel" and under that file, we have to define our MySQL database configuration details.
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=testing
DB_USERNAME=root
DB_PASSWORD=your password

#3. Create Eloquent Model
Once database config is set on Laravel framework, next step is to create one model class and migration file for create table in MySQL database. So for this, we have to run following command in command prompt.
Run this command to cache your configuration if you are using an existing laravel app
 "php artisan config:cache"
 and then run
 "php artisan make:model Post -m"
 This command will make Post.php eloquent model class file in app/Models directory and migration file under database/migrations folder. First we have to open the migrations directory file and under that file, we have to define table column details which you can seen below.
this is the migration file name:
database/migrations/2021_07_05_065844_create_posts_table.php
open the migration file and copy the code from the migration.php file have created.
Ater that, run the command:
"php artisan migrate"

Your database will be populated with table coulmns

#4. Add SoftDelete in Models Class
You need to add Soft Delete in our Post.php model class. But before that, you should create migrations for adding soft delete column to posts table. So for this you have to run following command in command prompt.
"php artisan make:migration add_sorft_delete_column"

This above command will create new migration file at database/migrations directory which will look like this below, now check the file name i created above.

database/migrations/migration_add_sorft_delete_column.php:

After this we have to run migration command in command prompt.


php artisan migrate


Once you run this command, then it will add deleted_at table column to posts table.

I've created a fake database records using Faker factory Database seeder, you can create yours by typing the command,
"php artisan make:seeder FakeListSeeder"

This will create create a Database seeder. browse for more information on how to use lararvel database seeder and facker factory.

Next we want to add soft delete facade in our Post model, you can below find source code for add SoftDelete facade in Post models class.

app/Models/Post.php: go to file.

#5. Create Controller Class
In next step, you have to create PostController and add following code in that controller file. So for a create controller class file, you will have to run following command in command prompt.


"php artisan make:controller PostController"


This command will create PostController.php file at app/Http/Controllers directory. So need to open that file and add following code.

app/Http/Controllers/PostController.php: go to file.

#6. Create View Blade File
In Laravel framework for you to display output on browser you need to create a blade template file for displaying data on web pages. In this example i have created a blade file resources/views/post.blade.php directory: Go to file.

