FROM mysql

ENV MYSQL_ROOT_PASSWORD: localhost
ENV MYSQL_DATABASE: store
ENV MYSQL_USER: isaac
ENV MYSQL_PASSWORD: admin1234

COPY TiendaWeb-1/TiendaWeb-1/store.sql /docker-entrypoint-initdb.d/

FROM php:8.0-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

COPY . /var/lib/html/

EXPOSE 1999
