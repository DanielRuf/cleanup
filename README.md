This small PHP script compares database fields with the filesystem and lists unused pictures.

Installation
=====================
Run `composer install` to install the dependencies. Then copy the configuration file with `cp config.php.dist config.php` and update the `config.php` file with your settings.

Usage
=====================
Upload the full directory to your server and run `check.php`, it will list all unused files.