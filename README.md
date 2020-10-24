# m533-backend

## Requirements
* PHP
* Composer
* MySQL server

## Install

Navigate to your projects folder and clone this repository with the command:

```git clone https://github.com/inaci0314/m533-backend```

Then, run this command to install the required composer packages:

```php composer.phar install```

Create and fill the database using the sql files in 'src/data/':

```
cd src/data/
mysql -u -p > webshop.sql
mysql -u -p > filltables.sql

```

Make sure that the config.ini file in 'src/config/' has the right information to connect to your database.


## Usage

To run this project, start your web and databse servers. <br>
If you are using the built-in PHP server, make sure that you are in the 'src/public' directory when you start it:

```
cd src/public/
php -S localhost:8080

```


Personnaly, I use Laragon with Apache 'httpd-2.4.46-win64-VS16' and PHP 'php-7.4.11-Win32-vc15-x64'.<br>
The root document is set to be the parent directory of my project, so Laragon can generate the "pretty URL", which in this case is "m533-backend.test".
