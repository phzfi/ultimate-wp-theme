#!/usr/bin/env bash

# Create Bedrock project
mkdir -p /home/vagrant/temp
cd /home/vagrant/temp
composer create-project roots/bedrock wordpress
sudo mv -f /home/vagrant/temp/wordpress/* /home/vagrant/wordpress
sudo mv -f /home/vagrant/temp/wordpress/.* /home/vagrant/wordpress
sudo mv -f /home/vagrant/temp/wordpress/web/* /home/vagrant/wordpress/web
sudo mv -f /home/vagrant/temp/wordpress/web/.* /home/vagrant/wordpress/web
sudo mv -f /home/vagrant/temp/wordpress/web/app/* /home/vagrant/wordpress/web/app
sudo mv -f /home/vagrant/temp/wordpress/web/app/.* /home/vagrant/wordpress/web/app
rm -rf /home/vagrant/temp

# Composer install
cd /home/vagrant/wordpress
composer install
npm i
npm run dev

# Install sshpass
sudo apt-get install -y sshpass

# Enable deployment to staging
sudo cp /home/vagrant/wordpress/web/app/themes/ultimate-wp-theme/resources/ssh/known_hosts /home/vagrant/.ssh