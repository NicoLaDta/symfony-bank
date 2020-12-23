# Symfony Bank

Symfony bank is a project carried out as part of my student training. The goal is to create a fictitious banking application.

## Getting Started

After installing the project, fictitious users must be retrieved to use the application.
You must have Symfony installed on your machine. 

### Database

Update `.env` file with your logs to your database

Add the database with these commands : 

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### User root and admin

At the root cause of the project, launch this command

```
php bin/console doctrine:fixtures:load
```
You now have two users to use the application. 

### To login

You have an admin user at your disposal. 

```
user : admin 
password : admin01
```

...And a normal user. 

```
user : root
password : root
```

