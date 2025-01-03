# Treeblog [![Build Status](https://travis-ci.org/isqo/Treeblog.svg?branch=master)](https://travis-ci.org/isqo/Treeblog) [![Coverage Status](https://coveralls.io/repos/github/isqo/Treeblog/badge.svg?branch=master)](https://coveralls.io/github/isqo/Treeblog?branch=master)
# Useful commands


# Docker compose
```
docker-compose up
```
<p align="center">
 <img src="https://github.com/isqo/Treeblog/blob/test/doc/blog1.png" style="width:450px;height:450px;">
</p>
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/test/doc/blog2.png" style="width:450px;height:450px;">
</p>

<img src="https://github.com/isqo/Treeblog/blob/test/doc/blog3.png">
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/test/doc/tree.png">
 </p>
<p align="center">
<img src="https://github.com/isqo/Treeblog/blob/test/doc/create node2.png">
 </p>
 <p align="center">
<img src="https://github.com/isqo/Treeblog/blob/test/doc/tree page.png">
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
