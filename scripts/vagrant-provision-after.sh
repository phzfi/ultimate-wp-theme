#!/usr/bin/env bash

# Switch to the default site
cd /home/vagrant/wordpress/web/app/themes/ultimate-wp-theme
./switch-site.sh default

# Create a symlink for easier access
ln -s /home/vagrant/wordpress/web/app/themes/ultimate-wp-theme /home/vagrant/ultimate-wp-theme