
# HRMS FYP
## Tech Stack
- Laravel
- PHP
- TailwindCSS
- Alpine.js
- MySQL

## Install on your local system
### Clone the project
Run the command below to clone this repository:
```bash
git clone https://github.com/jhuneu/FYP2.git
```

### Create a new MySQL database
Also remember to fill up your database info (database, username, password) in **.env** file.

 **Example:** 
 ```
 DB_CONNECTION=mysql 
 DB_HOST=127.0.0.1 
 DB_PORT=3306 
 DB_DATABASE=hrms_db 
 DB_USERNAME=user 
 DB_PASSWORD="password"
 ```
 
 ### Migrate database tables
 Run the command below to migrate the db tables with Eloquent ORM:
 ```bash
 php artisan migrate
 ```

### Install all packages
Install all the dependencies needed to run the project:

```bash
npm install
 ```

### Run the project
 Open **2 terminals**, run the commands below on each of the terminals:
 
 **Terminal #1**
 ```bash
 php artisan serve
 ```

**Terminal #2** 
```bash
 npm run watch
 ```

***Note:** `npm run watch` is for TailwindCSS*
