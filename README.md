# Agventure

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone git@github.com:aswinr19/Agventure.git
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database dbname
```

And run the initial migrations.

```
php artisan migrate
```
