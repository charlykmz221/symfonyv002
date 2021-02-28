FROM alpine
LABEL maintainer="mycollect"
ARG APPLICATION_NAME=app
ARG SERVER_NAME=localhost
ARG SERVER_ADMIN=contact@localhost
ARG DIRECTORY_INDEX=index.php
ARG DOCUMENT_ROOT=/$APPLICATION_NAME/public
ARG PHP_MODULES="apache2 curl json gd mcrypt \
intl sqlite3 gmp mbstring xml zip \
cli imagick xsl imap pdo pdo_mysql pdo_pgsql fileinfo sodium \
ctype soap simplexml tokenizer session dom iconv gettext phar \
xmlwriter sysvsem sysvshm sysvmsg xmlreader pear"
ENV APPLICATION_NAME ${APPLICATION_NAME}
ENV SERVER_NAME ${SERVER_NAME}
ENV SERVER_ADMIN ${SERVER_ADMIN}
ENV DIRECTORY_INDEX ${DIRECTORY_INDEX}
ENV DOCUMENT_ROOT ${DOCUMENT_ROOT}
RUN apk add --no-cache apache2 php7
RUN for module in $PHP_MODULES; do apk add --no-cache php7-"$module" ; done
RUN mkdir -p /run/apache2
RUN apk add graphviz
# Composer
RUN apk update && apk add curl && \
  curl -sS https://getcomposer.org/installer | php \
  && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer
# clean cache
RUN rm -rf /var/cache/apk/*

ENTRYPOINT ["httpd"]
CMD ["-D", "FOREGROUND"]
