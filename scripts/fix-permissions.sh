#!/usr/bin/env bash
# reset to safe defaults
find ${WP_DIR}/web -exec chown ${WP_OWNER}:${WP_GROUP} {} \;
find ${WP_DIR}/web -type d -exec chmod 755 {} \;
find ${WP_DIR}/web -type f -exec chmod 644 {} \;

# allow wordpress to manage wp-config.php (but prevent world access)
chgrp ${WS_GROUP} ${WP_DIR}/web/wp-config.php
chmod 660 ${WP_DIR}/web/wp-config.php

# allow wordpress to manage wp-content
find ${WP_DIR}/web/app -exec chgrp ${WS_GROUP} {} \;
find ${WP_DIR}/web/app -type d -exec chmod 775 {} \;
find ${WP_DIR}/web/app -type f -exec chmod 664 {} \;

chmod +x ${THEME_DIR}/*.sh
chmod +x ${THEME_DIR}/scripts/*.sh
chmod +x ${THEME_DIR}/scripts/*/*.sh