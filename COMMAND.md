## Create New Project
- $ cd /var/www/php-projects
- $ composer create-project --prefer-dist laravel/larave project-name
- $ cd project-name 
- $ php artisan serve

---
## Generate basic scaffolding...
- $ composer require laravel/ui
- $ php artisan ui bootstrap
- $ npm install && npm run dev


## Authintecation Scaffold
- $ composer require laravel/ui
- $ php artisan ui bootstrap --auth
- $ npm install && npm run dev

---

## create DB and congig .env file 

## Database
<this is comment>
- $ php artisan migrate

## Generate Controller 
* $ php artisan make:controller ControllerName

* If you would like to generate a Resource Controller "CRUD":
    - $ php artisan make:controller ControllerName --resource
* Specifying The Resource Model - If you are using route model binding and would 
     like   the resource controller's methods to type-hint a model instance:
     
    - $ php artisan make:controller ControllerName --resource --model=ModelName

## Generate Model
* $ php artisan make:model model-name

* If you would like to generate a database migration with creation of model: 
    - $ php artisan make:model ModelName -m


## Generating Migrations
- $ php artisan make:migration create_users_table --create|table=users 
- Run Migration to DB
    - $ php artisan migrate
- Rolling Back Migrations
    - $ php artisan migrate:rollback
    - $ php artisan migrate
- or 
    <!-- Roll Back & Migrate Using A Single Command -->
    - $ php artisan migrate:refresh

----
## MySQL Commands
- show tables;
- describe tb-name;



## Show Routes List
- $ php artisan route:list

## Composer
- $ composer update
