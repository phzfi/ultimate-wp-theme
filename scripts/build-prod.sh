#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"

echo '********** Starting to build **********'

cd ${DIR}/../ &&
composer install --no-dev &&
npm install &&
npm run prod

echo '********** NPM done! **********'

THEME_PATH=$PWD
THEME_SHORT_PATH=${THEME_PATH##*/}

tar  -zcvf build-prod.tar.gz --exclude="node_modules" --exclude="assets/js" --exclude="assets/scss" --exclude=".vagrant" --exclude=".git" --warning=no-file-changed --directory=../  ${THEME_SHORT_PATH}
echo '********** TAR done! **********'