#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"
echo $DIR

if [ -z "$1" ]
  then
    echo "No site argument supplied"
    echo "Usage of this script: copy-prod.sh <site> <local/stg>"
fi

source ${DIR}/${1}/env-stg.sh

sshpass -p ${STG_SSH_PASS} ssh ${STG_SSH_USER}@${STG_SSH_HOST} "cd $THEME_DIR && mkdir -p $THEME_DIR_NAME"
sshpass -p ${STG_SSH_PASS} scp -o StrictHostKeyChecking=no ${DIR}/../build-stg.tar.gz ${STG_SSH_USER}@${STG_SSH_HOST}:${THEME_DIR}/${THEME_DIR_NAME}/
sshpass -p ${STG_SSH_PASS} ssh ${STG_SSH_USER}@${STG_SSH_HOST} "cd $THEME_DIR/$THEME_DIR_NAME && tar -xzf build-stg.tar.gz  --strip 1 &&  rm -f build-stg.tar.gz"
