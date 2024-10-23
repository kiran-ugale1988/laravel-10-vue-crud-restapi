composer create-project laravel/laravel:^10.* .

php artisan migrate

php artisan make:model Todo -m
=> Create model with migration table

php artisan make:controller TodoController --api
=> Create controller without edit and create method as this is only for API.

php artisan make:test TodoControllerTest --unit
=>To place test controller in Unit folder (Useful when you need to test small, independant code to be tested like Tests a single "unit" (method or function))

php artisan make:test TodoControllerTest
=>To place test controller in Feature folder (Useful when you need to test feature which has broader features (multiple components))

test cases run:
=> php artisan test   or vendor/bin/phpunit

php artisan make:factory TodoFactory --model=Todo
=>This is needed to generate fake data for testing

php artisan make:seeder TodoSeeder
=> create todo seeder

php artisan db:seed
=> to Run db seed

php artisan tinker
=> check the seeded data => App\Models\Todo::all();

