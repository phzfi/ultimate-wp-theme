#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"

# Take a mysql Dumpfile from the prod
echo 'Taking a dump, from Productions MySQL db'
mysqldump -P ${PROD_MYSQL_PORT} -h ${PROD_MYSQL_HOST} -u ${PROD_MYSQL_USER} -p${PROD_MYSQL_PASS} ${PROD_MYSQL_DB} > ${DIR}/../dump.sql

# Clear DB
echo 'Clearing Local Database'
${DIR}/reset-db.sh

# Replace prod urls with staging/local urls
echo 'Replacing prod urls with staging/local urls'
sed -n s,${PROD_URL},${URL},g ${DIR}/../dump.sql

# Insert dump into db
echo 'Inserting prod dump.sql into local'
mysql -P ${MYSQL_PORT} -h ${MYSQL_HOST} -u ${MYSQL_USER} -p${MYSQL_PASS} ${MYSQL_DB} < ${DIR}/../dump.sql

# Remove the Dumpfile
echo 'Removing dump.sql'
rm ${DIR}/../dump.sql