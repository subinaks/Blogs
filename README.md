Assignment Requirement Status

DataBase Design and Migration

1.User Model:
The User model and its corresponding migration have been completed.
2. Post Model:
The Post model and its corresponding migration have also been completed.

Database Seeding

Two users' data have been seeded using a seeder. You can run  php artisan db:seed  to populate the database.

Authentication

Laravel Breeze has been utilized for authentication, enabling handling of login, registration, password reset, email verification, and password confirmation. Additionally, Breeze includes a simple "profile" page where users may update their name, email address, and password.

CRUD

Basic CRUD operations for creating and modifying blogs have been implemented. Visitors can view all blogs, but only authors can modify them.

Middleware

Middleware provides a convenient mechanism for inspecting and filtering HTTP requests entering your application. Here, the auth and verified middleware ensure that a user is authenticated before they can modify a blog post.

Blade Templates

Layouts have been created via "template inheritance" using the @section, @yield, and @extends directives.

Eloquent

Eloquent relationships are defined as methods on our Eloquent model classes. In this case, a HasOne relation with the Post model has been established for the User model.

Validation 

A custom request, PostRequest class, has been created to encapsulate validation and authorization logic.


Unit Testing

Basic unit tests have been conducted to ensure that blog CRUD operations work perfectly.


Working Guide

Laravel version : 10.45.1
Php Version : 8.3.3

I have utilized a Bootstrap blog template to display blogs. 


Steps to Run the Project

1. Clone the project from Git.
2. Run composer update to update dependencies.
3. Execute php artisan migrate to run migrations.
4. Seed the database with sample data using php artisan db:seed.
5. Start the Laravel development server with php artisan serve.


Login sample credential after seeding you can use

Email : john@example.com
Password : password

Alternatively, you can register as a new user.

Visitors can view all blogs posted in this system, while only authors can make modifications.

A demo video is attached for your reference, illustrating the functionality of this system.



