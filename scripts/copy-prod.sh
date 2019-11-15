#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"

if [ -z "$1" ]
  then
    echo "No site argument supplied"
    echo "Usage of this script: copy-prod.sh <site> <local/stg>"
fi

if [ -z "$2" ]
  then
    echo "No env argument supplied"
    echo "Usage of this script: copy-prod.sh <site> <local/stg>"
fi

source ${DIR}/${1}/env-prod.sh

if [ "$2" == "local" ]; then
    source ${DIR}/env-local.sh
else
    source ${DIR}/${1}/env-stg.sh
fi

${DIR}/copy-db-from-prod.sh
${DIR}/copy-env-from-prod.sh
${DIR}/copy-uploads-from-prod.sh
${DIR}/copy-plugins-from-prod.sh

echo ${SUDO_PASS} | sudo -S -E ${DIR}/fix-permissions.sh