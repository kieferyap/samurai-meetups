# Public key preparations and connecting to the server
chmod 400 public_key.pem
ssh -i public_key.pem ubuntu@0.0.0.0

# PHP/MySQL/etc Server setup
sudo apt-get update
sudo apt-get install apache2 php5 libapache2-mod-php5 mysql-server libapache2-mod-auth-mysql php5-mysql phpmyadmin git

# GIT Config
cd /var/www/html/
git config --global user.name "Awesomenite Dragonite"
git config --global user.email askawesomenitedragonite@gmail.com
sudo git init
sudo git remote add origin https://github.com/kieferyap/samurai-meetups.git
sudo git pull origin master

# Switching to the correct branch
git remote show origin
sudo git remote update
sudo git fetch
sudo git checkout --track -b feature/04-image-change origin/feature/04-image-change

# Installing PHPMyAdmin
cd /var/www/html
sudo chown ubuntu .
wget https://files.phpmyadmin.net/phpMyAdmin/4.5.0.2/phpMyAdmin-4.5.0.2-all-languages.tar.bz2
tar -jxf phpMyAdmin-4.5.0.2-all-languages.tar.bz2 -C /var/www/html
mv phpMyAdmin-4.5.0.2-all-languages phpmyadmin
rm -rf phpMyAdmin-4.5.0.2-all-languages.tar.bz2

# Setting up the site (making it writable by apache, and making the assets folder)
cd /var/www/html/web/
mkdir assets
sudo chown -R www-data:www-data /var/www/html/.
chmod -R g+rw /var/www/html/.
# sudo chmod -R 777 /var/www/html/. # unsafe. very unsafe. why is this even here??