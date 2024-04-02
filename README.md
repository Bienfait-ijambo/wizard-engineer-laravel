

# Laravel Blog application

### This is  a Laravel 8 Project make sure you have a php version for that. [Laravel documentation](https://laravel.com/docs/8.x/releases)


### Steps to run this project:

### `cd in laravel-blog` and run :

1. Run `composer install` command

2. Run `php artisan serve` command


# Api documentation

## PUBLIC ENDPOINTS

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


### 4. [Post Model :get post]()

This endpoints is used to display details of a single post

```js
	GET
```

Endpoint
```js
	/posts/:slug
```

Response body with status 200
```js
[
	{
	"id": 8,
	"title": "What is TypeScript",
	"post_content": "<p></p>",
	"image": "http://127.0.0.1:8000/storage/images/1711706289.jpg",
	"slug": "what-is-typescript-xGckmQ1711806376",
	"created_at": "2024-03-11T17:44:03.000000Z",
	"updated_at": "2024-03-30T13:46:16.000000Z"
	}
]
```



### 5. [Post Model :getPosts]()

Display list of posts on the home page of our vue app

```js
	GET
```

Endpoint
```js
	/posts
```

Response body with status 200
```js
{
"current_page": 1,
	"data": [
		{
		"id": 3,
		"title": "What is Golang ?",
		"post_content": "<p>",
		"image": "http://127.0.0.1:8000/storage/images/1711706163.jpg",
		"slug": "what-is-golang-lZg1Ap1711810344",
		"created_at": "2024-03-10 14:32:29",
		"updated_at": "2024-03-30 14:52:24"
		}
	],
		"first_page_url": "http://127.0.0.1:8000/api/client/posts?page=1",
	"from": 1,
	"last_page": 9,
	"last_page_url": "http://127.0.0.1:8000/api/client/posts?page=9",
	"links": [....],
	"next_page_url": "http://127.0.0.1:8000/api/client/posts?page=2",
	"path": "http://127.0.0.1:8000/api/client/posts",
	"per_page": 1,
	"prev_page_url": null,
	"to": 1,
	"total": 9
}

```





##  SECURED ENDPOINTS : admin

### 1. [Post Model : create post]()

```js
	POST
```

Endpoint
```js
	/posts
```

Request body

```js
	{
		"title": "What is TypeScript",
		"post_content":"content...."
	}
```

Response body with status 200
```js
	{
	  "message":"Post created !"
	}
```


### 2. [Post Model : update post]()

```js
	PUT
```

Endpoint
```js
	/posts/:id
```

Request body

```js
	{
		"title": "What is TypeScript",
		"post_content":"content...."
	}
```

Response body with status 200
```js
	{
	  "message":"Post created !"
	}
```


### 3. [Post Model : delete post]()

```js
	DELETE
```

Endpoint
```js
	/posts/:id
```

Request body

```js

```

Response body with status 200
```js
	{
	  "message":"Post deleted !"
	}
```