# Instructions
Here we have a Laravel framework (v7). This has 1 model and 1 database table called `users` there are 200 users already seeded in the database. Modify the `get` function in the [UserController.php](/app/Http/Controllers/UserController.php) file to pass as many tests as possible. The tests are included in the appliaction [here](/tests/Route/UserRouteTest.php). The goal of the `get` function is to set up pagination ability for the GET User route, this is just a simple API to get the users from the database.

# Setup
- Clone the repository
- Run command 'docker-compose up -d'
- Run command 'composer install'
- Run command 'php artisan migrate:fresh --seed'

## Rules
- All unit tests must pass.
- You should not change any tests.

## Getting Started
- Initially you will see 5 tests, of which 0 passes and 5 fail.
- Modify the `get` function in the controller and run `./vendor/bin/phpunit` in the terminal as necessary to pass as many tests as you can.