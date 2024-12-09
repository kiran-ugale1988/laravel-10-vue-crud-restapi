```
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
```
=========================vue js installation setup======
```
npm install vue@2 vue-loader vue-template-compiler
npm install --save-dev @vue/cli-plugin-babel

npm install axios

npm install vue@2 @vitejs/plugin-vue2

vite.config.js => Make like following:

import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue2'; // or '@vitejs/plugin-vue' for Vue 3
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
});
```
```
npm run dev
php artisan serve

====First initializing the git====

git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:kiran-ugale1988/laravel-10-vue-crud-restapi.git
git push -u origin main

```

### REST API Call and JSON output
<img width="942" alt="image" src="https://github.com/user-attachments/assets/991a92ba-78ef-48e6-8986-368ec02f753c">

### Consumed API in VueJS
<img width="861" alt="image" src="https://github.com/user-attachments/assets/835dcb45-b2eb-482f-82cc-3a89b3340e74">

