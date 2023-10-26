
# Symfony Fired

The project with Etienne for evaluate my competences


## Installation

- Download the zip directory
- Decompress the directory and open this with vscode
- Start your database server, pick the sql file in docs/db/symfo_fired.sql for import the database and data
- Install the composers :
```bash
composer install
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