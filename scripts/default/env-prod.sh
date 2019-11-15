#!/usr/bin/env bash
set -a

PROD_MYSQL_DB=wordpress
PROD_MYSQL_USER=wordpress
PROD_MYSQL_PASS=default
PROD_MYSQL_HOST=localhost
PROD_MYSQL_PORT=3306

PROD_SSH_USER=root
PROD_SSH_PASS=root
PROD_SSH_HOST=localhost

PROD_WP_DIR=/var/www
PROD_THEME_DIR=/var/www/web/app/themes
PROD_THEME_DIR_NAME=ultimate-wp-theme
PROD_URL=http://localhost

WP_OWNER=
WP_GROUP=
WS_GROUP=

# NEVER INCLUDE THESE VARIABLES IN THIS FILE
# MYSQL_*
