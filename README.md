## Requirements:
* Debian Linux 8/9 x86/x64
* Apache2
* php5 + extension(php-curl, php-mysql, php5-mysql)
* mysql server + client
* phpmyadmin (manually)


## Installation:
1) Install LAMP stack:
apt install apache2
apt install mysql-server mysql-client
apt install php5 php-pear php5-mysql php5-curl
apt install phpmyadmin

2) Enable mod_rewrite:
a2enmod rewrite

3) Add .htaccess routing
at /etc/apache2/apache2.conf:
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Allow from all
        Require all granted
</Directory>

4) Restart Apache web server:
service apache2 restart

5) upload via ftp node directory

6) Change permissions for installer may write config 
chmod -R 777 /var/www/html/node/

7) Install node via installer:
open in url:
http://serv_host/node/

8) Set all configuration fields in every steps,
for BlockCypher Token register new account at 
http://blockcypher.com/
and get free or buy private api key.

9) Remove node installation directory from node/install/

10) Check access into node again: http://serv_host/node/

