# Treeblog [![Build Status](https://travis-ci.org/isqo/Treeblog.svg?branch=master)](https://travis-ci.org/isqo/Treeblog) [![Coverage Status](https://coveralls.io/repos/github/isqo/Treeblog/badge.svg?branch=master)](https://coveralls.io/github/isqo/Treeblog?branch=master)
Treeblog is a unique blog site that allows bloggers dive deep inside the Arborescence of their content, 
the depth of their tree is unlimited. Enjoy!

<p align="center">
 <img src="https://github.com/isqo/Treeblog/blob/complete-readme/doc/treeblog.png">
</p>

# Setup

## Deployment locally
### Prerequisites
- Docker compose: Docker version 27.4.1, build b9d17ea

  
Command to launch the containers
```
docker compose up --build --force-rebuild
```
The next step is going to launch the steps that mainly initialize the database structure and inject some data for the blog.

<p align="center">
 <img src="https://github.com/isqo/Treeblog/blob/master/doc/setup1.png">
</p>

Don't forget to save *securely* this setup generated password, so that you don't lose your admin access forever.

<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/master/doc/setup2.png">
</p>

  if you log out, As an admin you can login with this path http://127.0.0.1:81/login (/login most importantly)
 
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/master/doc/login.png">
</p>

 Once you are logged-in, you have the admin view:
 
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/master/doc/admin-view.png">
</p>

let's create this arborescence:

<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/master/doc/arborescence.png">
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
