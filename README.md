
# HRMS FYP
## Tech Stack
- [Laravel](https://laravel.com/)
- [PHP](https://www.php.net/)
- [TailwindCSS](https://tailwindcss.com/)
- [Alpine.js](https://alpinejs.dev/)
- [MySQL](https://www.mysql.com/)

## Prerequisite
- [Node.js](https://nodejs.org/en/) version > 16.5.4
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/manual/en/install.php)

## Install on your local system
### Clone the project
Run the command below to clone this repository:
```bash
git clone https://github.com/jhuneu/FYP2.git
```
 
 ### Install all packages
> Please create a new `.env` file before running the commands below. Use `env.example` as a guideline and fill in the necessary details.
Install all the dependencies needed to run the project:

```bash
composer install
```
 
```bash
npm install
```

### Generate app key
Generate the app key in .env file with the following command:

```bash
php artisan key:generate
```

### Create a new MySQL database
> If you use `XAMPP`, you can create new tables with `phpMyAdmin`. Simply open the XAMPP control panel and click the `Admin` beside `MySQL`. You'll also have to start the `Apache` server before accessing **phpMyAdmin**. 

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


## Important Notes
1. Please create a new .env file before running the `npm/composer install` commands. Use `env.example` as a guideline and fill in the necessary details.  

2. The app is using [BrowserSync](https://laravel-mix.com/docs/main/browsersync), so when you run `npm run watch`, a new tab will be opened on a different port. On the new tab, when you make changes to the files, the browser will reload automatically. To modify, go to `webpack.mix.js` and change the settings to your liking. Check the [documentation](https://browsersync.io/docs/options/) for more information.

3. By default, [MailHog](https://github.com/mailhog/MailHog) is used as the fake SMTP server for the email features. You could opt for other alternatives such as [MailTrap](https://mailtrap.io/).   
