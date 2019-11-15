#!/usr/bin/env bash

echo 'Checking if wp-cli is installed'
if ! [ -x "$(command -v wp)" ]; then
    # WP-cli
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    chmod +x wp-cli.phar
    sudo mv wp-cli.phar /usr/local/bin/wp
fi
echo 'Installing wp-cli dotenv command'
wp package install --quiet aaemnnosttv/wp-cli-dotenv-command:^1.0

echo 'Copying .env from Production'
sshpass -p ${PROD_SSH_PASS} scp -o StrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST}:${PROD_WP_DIR}/.env ${WP_DIR}/

echo 'Overwriting necessary env variables with local variables'
cd ${WP_DIR}
wp dotenv set DB_HOST ${MYSQL_HOST}
wp dotenv set DB_NAME ${MYSQL_DB}
wp dotenv set DB_USER ${MYSQL_USER}
wp dotenv set DB_PASSWORD ${MYSQL_PASS}
wp dotenv set WP_HOME ${URL}