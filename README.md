# Treeblog [![Build Status](https://travis-ci.org/isqo/Treeblog.svg?branch=master)](https://travis-ci.org/isqo/Treeblog) [![Coverage Status](https://coveralls.io/repos/github/isqo/Treeblog/badge.svg?branch=master)](https://coveralls.io/github/isqo/Treeblog?branch=master)
Treeblog is a unique blog that allows bloggers to dive deep inside the Arborescence of their content, 
the depth of their tree is unlimited. Enjoy!

<p align="center">
 <img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/treeblog.png">
</p>

#Setup

## Deployment locally with compose
### prerequisites
- docker compose
```
docker compose up --build --force-rebuild
```
It is going to launch the setup steps which mainly initialize the database structure and some data.

<p align="center">
 <img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/setup1.png">
</p>
Don't forget to save *securely* the setup generated password, so that you don't lose your admin access
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/setup2.png">
</p>
 
# Vanilla setup
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
