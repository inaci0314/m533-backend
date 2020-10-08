# m533-backend

## Requirements
* PHP
* Composer

## Install

Navigate to your projects folder and clone this repository with the command:

```git clone https://github.com/inaci0314/m533-backend```

Then, run this command to install the required composer packages:

```php composer.phar install```

## Usage

The simplest way to run this project is navigating to 'src/public' and running the PHP built-in server:

```
cd src/public/
php -S localhost:8080

```

Personnaly, I use Laragon with Apache 'httpd-2.4.46-win64-VS16' and PHP 'php-7.4.11-Win32-vc15-x64'.<br>
The root document is set to be the parent directory of my project, so Laragon can generate the "pretty URL", which in this case it's "m533-backend.test".
