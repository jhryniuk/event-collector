FROM nginx:1.10

ADD ./php.conf /etc/nginx/conf.d/default.conf

ENV PROJECT_NAME customUser
ENV PROJECT_WEB_DIR web
ENV PROJECT_INDEX_FILE app.php
ENV PROJECT_DEV_INDEX_FILE app_dev.php

EXPOSE 80

VOLUME /var/www
WORKDIR /var/www

ADD entrypoint.sh /entrypoint.sh

CMD ["/bin/bash", "/entrypoint.sh"]