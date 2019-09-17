This small PHP script compares database fields with the filesystem and lists unused pictures.

Installation
=====================
Run `composer install` to install the dependencies. Then copy the configuration file with `cp config.php.dist config.php` and update the `config.php` file with your settings.

Usage
=====================
Upload the full directory to your server, rename / copy `config.php.dist` to `config.php`, adjust the settings and run `check.php`.