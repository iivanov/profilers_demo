FROM phpdockerio/php71-fpm:latest

RUN apt-get update \
    && apt-get install -y git vim wget

RUN wget -O - https://packagecloud.io/gpg.key | apt-key add - \
    && echo "deb http://packages.blackfire.io/debian any main" | tee /etc/apt/sources.list.d/blackfire.list


# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.1-mysql  php-tideways php-xhprof php-xdebug blackfire-agent blackfire-php graphviz \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*



WORKDIR "/application"