

# Laravel Blog application

### This is  a Laravel 8 Project make sure you have a php version for that. [Laravel documentation](https://laravel.com/docs/8.x/releases)


### Steps to run this project:

### `cd in laravel-blog` and run :

1. Run `composer install` command

2. Run `php artisan serve` command


## Api documentation

### 1. [User Model : create user]()

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


### 2. [User Model : login user]()

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
	  "email": "string",
	  "password": "string"
	}
```

Response body

```js
	{
		user: {
		  "name": "ben",
		  "email": "ben@gmail.com",
		},
		token:"$2b$10$0O.pVCtZO2QgxfPKh0WNsudCHglKsoGwhJ0GXciLYzHCa73x99Gpa"
	}
```

### 3. [User Model : logout user]()

```js
	POST
```

Endpoint
```js
	/logout
```

Request body

```js
	{
	  "userId": 1,
	}
```

Response body with status 200
```js
	{
		"message":"user logged out !"
	}
```