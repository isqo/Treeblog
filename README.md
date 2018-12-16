# Miscsite [![Build Status](https://travis-ci.org/isqo/Miscsite.svg?branch=master)](https://travis-ci.org/isqo/Miscsite)
# Useful commands

To start the development server on <http://127.0.0.1:8000>:
```
php artisan serve
```

/!\ To re-create the database (drop all tables and re-run all migrations):
```
php artisan migrate:fresh
```

To rebuild and update a single container :
```
docker-compose up -d --no-deps --build <SERVICE_NAME>
```
