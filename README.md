

# Laravel Blog application

### This is  a Laravel 8 Project make sure you have a php version for that. [Laravel documentation](https://laravel.com/docs/8.x/releases)


### Steps to run this project:

### `cd in laravel-blog` and run :

1. Run `composer install` command

2. Run `php artisan serve` command


### Api documentation

#### User Model : create user

```js
	POST
```

Endpoint

```js
	/users
```

Request body

```js
	{
	  "name": "string",
	  "email": "string",
	  "password": "string"
	}
```

Response body

```js
	{
		user: {
		  "name": "string",
		  "email": "string",
		  "password": "string"
		},
		message:"user created !"
	}
```