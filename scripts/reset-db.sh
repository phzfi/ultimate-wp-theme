#!/usr/bin/env bash
mysql -h ${MYSQL_HOST} -u ${MYSQL_USER} -p${MYSQL_PASS} ${MYSQL_DB} -e "DROP DATABASE ${MYSQL_DB}; CREATE DATABASE ${MYSQL_DB};"