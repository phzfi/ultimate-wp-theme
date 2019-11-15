#!/usr/bin/env bash

echo 'Removing local plugins'
sudo rm -rf ${WP_DIR}/web/app/plugins/*

echo 'Getting plugins from Production'
sshpass -p ${PROD_SSH_PASS} ssh -oStrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST} "cd $PROD_WP_DIR/web/app && zip -r plugins.zip plugins"
sudo sshpass -p ${PROD_SSH_PASS} scp -oStrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST}:$PROD_WP_DIR/web/app/plugins.zip ${WP_DIR}/web/app/plugins.zip
sshpass -p ${PROD_SSH_PASS} ssh -oStrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST} "cd $PROD_WP_DIR/web/app && rm plugins.zip"

echo 'Extracting plugins from Production to Local'
sudo unzip -n ${WP_DIR}/web/app/plugins.zip -d $WP_DIR/web/app/
sudo rm -rf ${WP_DIR}/web/app/plugins.zip