#! /bin/bash

git clone git@github.com:levihackerman-102/MVC-assignment.git

# import db using PHPMyAdmin and the schema.sql file provided

composer install
curl -s https://getcomposer.org/installer | php
composer dump-autoload

# see sample vhost conf file
sudo nano /etc/apache2/sites-available/<domain name>.conf
sudo nano /etc/hosts
# add 127.0.0.1      <domain name>

sudo a2ensite <domain name>
sudo a2enmod rewrite
sudo apachectl configtest
sudo service apache2 reload

# now visit your domain name to view site