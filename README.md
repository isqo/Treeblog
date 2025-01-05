# Treeblog [![Build Status](https://travis-ci.org/isqo/Treeblog.svg?branch=master)](https://travis-ci.org/isqo/Treeblog) [![Coverage Status](https://coveralls.io/repos/github/isqo/Treeblog/badge.svg?branch=master)](https://coveralls.io/github/isqo/Treeblog?branch=master)

 <img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/treeblog.png">

# Deployment locally with compose
```
docker compose up --build --force-rebuild
```
<p align="center">
 <img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/setup1.png">
</p>
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/setup2.png">
</p>
 
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
