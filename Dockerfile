FROM php:8.2.4-apache

RUN curl -L http://pear.php.net/go-pear.phar > go-pear.phar && \ 
    php go-pear.phar && \
    rm go-pear.phar

RUN curl -L https://github.com/apereo/phpCAS/releases/download/1.6.1/CAS-1.6.1.tgz > CAS-1.6.1.tgz && \
  pear install CAS-1.6.1.tgz /usr/share/pear/ && \
  rm CAS-1.6.1.tgz

COPY var-www-html/ /var/www/html/
