# Treeblog [![Build Status](https://travis-ci.org/isqo/Treeblog.svg?branch=master)](https://travis-ci.org/isqo/Treeblog) [![Coverage Status](https://coveralls.io/repos/github/isqo/Treeblog/badge.svg?branch=master)](https://coveralls.io/github/isqo/Treeblog?branch=master)
# Useful commands


# Docker compose

![blog1](https://github.com/isqo/Treeblog/blob/master/doc/blog1.png)

# Vanilla
To start the development server on <http://127.0.0.1:8000>:

```
php artisan serve
```

/!\ To re-create the database (re-run all migrations):

```
php artisan migrate:fresh
```

To rebuild and update a single container :

```
docker-compose up -d --no-deps --build <SERVICE_NAME>

```
![alt text](https://github.com/[username]/[reponame]/blob/[branch]/image.jpg?raw=true)