#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"

if [ -z "$1" ]
  then
    echo "No site argument supplied"
    echo "Usage of this script: copy-prod.sh <site> <local/stg>"
fi

source ${DIR}/${1}/env-prod.sh

sshpass -p ${PROD_SSH_PASS} ssh ${PROD_SSH_USER}@${PROD_SSH_HOST} "cd $PROD_THEME_DIR && mkdir -p $PROD_THEME_DIR_NAME"
sshpass -p ${PROD_SSH_PASS} scp -o StrictHostKeyChecking=no ${DIR}/../build-prod.tar.gz ${PROD_SSH_USER}@${PROD_SSH_HOST}:${PROD_THEME_DIR}/${PROD_THEME_DIR_NAME}/
sshpass -p ${PROD_SSH_PASS} ssh ${PROD_SSH_USER}@${PROD_SSH_HOST} "cd $PROD_THEME_DIR/$PROD_THEME_DIR_NAME && tar -xzf build-prod.tar.gz --strip 1 && rm -f build-prod.tar.gz"

echo "----------DEPLOY COMPLETE----------"
