# medicom_v1
Gestion intelligente d'une boite de communication

# Laravel 5 
Laravel 5.5 and Vue JS 2.5 project.

# Official documentations
- <a href="https://laravel.com/docs/5.5">Laravel 5.5</a> Full docs.
- Every thing you want to know about<a href="https://laravel.com/docs/5.5"> Vue Js 2.0</a>.

# Download
- Clone the project into a folder of your choice with "https://github.com/badry-abderrahmane/medicom_v1.git ."
- Through composer run "composer install"
(To get the latest packages, run <code>composer update</code>)

# Install
To get this working, you need to install dependencies and set up your .env...

- run <code>composer install</code>
- run <code>php artisan key:generate</code>
- Now add the app key to your .env file, this is also where you define your database (there is an example in root called .env.example)
- Next, you need to run the database migrations...
- <code>php artisan migrate</code> Creates the tables in the database
