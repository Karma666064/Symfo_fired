
# Symfony Fired

The project with Etienne for evaluate my competences


## Installation

- Download the zip directory
- Decompress the directory and open this with vscode
- Start your database server, pick the sql file in `docs/db/symfo_fired.sql` for import the database and data
- Install the composers :
```bash
composer install
```
- Copy the `.env` and paste with the name `.env.local` and config your database
if your database is mysql and is local (line 27)
```
DATABASE_URL="mysql://root@127.0.0.1:3306/symfo_fired?charset=utf8mb4"
DATABASE_URL="mysql://[username][password]@127.0.0.1:3306/[database name]?charset=utf8mb4"
```
- Execute the migration command :
```bash
symfony console d:m:m
```
- Start the symfony server :
```bash
symfony serve
```
- Open the page :
```bash
symfony server:open
```

## Features

- Authentification (login, register, logout)
- Create lists
- Add tasks
- See, modify and delete lists
- See tasks
## Tech Stack

**Client:** TailwindCSS (DaisyUi)

**Server:** Wamp


## Authors

- [@Karma66](https://www.github.com/karma666064)