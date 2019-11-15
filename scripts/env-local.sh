#!/usr/bin/env bash
set -a

MYSQL_HOST=localhost
MYSQL_PORT=3306
MYSQL_USER=homestead
MYSQL_PASS=secret
MYSQL_DB=wordpress

WP_DIR=/home/vagrant/wordpress
THEME_DIR=/home/vagrant/wordpress/web/app/themes/ultimate-wp-theme
URL=http://wordpress.local

WP_OWNER=vagrant
WP_GROUP=vagrant
WS_GROUP=www-data

SUDO_PASS=secret