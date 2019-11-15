#!/usr/bin/env bash

echo 'Removing local uploads'
sudo rm -rf ${WP_DIR}/web/app/uploads/*

echo 'Getting uploads from Production'
sshpass -p ${PROD_SSH_PASS} ssh -oStrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST} "cd $PROD_WP_DIR/web/app && zip -r uploads.zip uploads"
sudo sshpass -p ${PROD_SSH_PASS} scp -oStrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST}:$PROD_WP_DIR/web/app/uploads.zip ${WP_DIR}/web/app/uploads.zip
sshpass -p ${PROD_SSH_PASS} ssh -oStrictHostKeyChecking=no ${PROD_SSH_USER}@${PROD_SSH_HOST} "cd $PROD_WP_DIR/web/app && rm uploads.zip"

echo 'Extracting uploads from Production to Local'
sudo unzip -n ${WP_DIR}/web/app/uploads.zip -d $WP_DIR/web/app/
sudo rm -rf ${WP_DIR}/web/app/uploads.zip