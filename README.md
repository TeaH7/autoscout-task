## First Step

Install Wamp Server : www.wampserver.com/en/
Install Composer : www.getcomposer.org/download/

## Second Step

Clone the git repository to C:/wampp64/www

Run wampserver
Open PhpMyAdmin
Create new Database

Open Project with your code editor

run the command: composer install

run the command: npm install

copy .env.example to .env file

change the DB info username , password, db name

run the command: php artisan key:generate

run the command: php artisan migrate --seed

run the command: php artisan serve

And on the other terminal run the command : npm run dev

Defaut Admin Credentials:

Email: admin@autoscout.com
Password: password
