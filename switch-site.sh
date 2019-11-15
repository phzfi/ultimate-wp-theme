#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"
DEFAULT_SITE=default

if [ $# -gt  0 ]; then
    IS_DEFAULT="$1"
    if [ $IS_DEFAULT = "default" ]; then
        ./scripts/copy-prod.sh ${DEFAULT_SITE} local
        exit 1
    fi
fi

echo "Available sites"
source ${DIR}/scripts/list-sites.sh
echo ""
echo "Current default is ($DEFAULT_SITE)"

siteCount=${#DIRS[@]}
finished=0

while [ $finished -eq 0 ]; do
    printf 'Please insert which site you want to switch to: '
    read input

    if [ ${input} -eq ${input} 2>/dev/null ]
        then
            if [  ${input} -ge 1 -a ${input} -le ${siteCount} ]; then
                finished=1
            fi
    else
        echo "$input is not an integer between 1 and $siteCount"
    fi
done

echo '-------------'

${DIR}/../scripts/copy-prod.sh ${DIRS[$input-1]} local
