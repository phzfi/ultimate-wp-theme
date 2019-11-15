#!/usr/bin/env bash
set -a

STG_SSH_USER=root
STG_SSH_PASS=root
STG_SSH_HOST=localhost

MYSQL_HOST=localhost
MYSQL_PORT=3306
MYSQL_USER=wordpress
MYSQL_PASS=wordpress
MYSQL_DB=wordpress

WP_DIR=/var/www/
THEME_DIR=/var/www/web/app/themes
THEME_DIR_NAME=ultimate-wp-theme
URL=http://localhost

WP_OWNER=www-data
WP_GROUP=www-data
WS_GROUP=www-data

SUDO_PASS=admin
