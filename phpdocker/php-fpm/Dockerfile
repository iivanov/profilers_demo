FROM phpdockerio/php71-fpm:latest

RUN apt-get update \
    && apt-get install -y git vim wget

RUN wget -O - https://packagecloud.io/gpg.key | apt-key add - \
    && echo "deb http://packages.blackfire.io/debian any main" | tee /etc/apt/sources.list.d/blackfire.list

RUN wget -O - https://download.newrelic.com/548C16BF.gpg | apt-key add - \
    && echo "deb http://apt.newrelic.com/debian/ newrelic non-free" | tee /etc/apt/sources.list.d/newrelic.list

# Install selected extensions and other stuff
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get -y --no-install-recommends install  php7.1-mysql  php-tideways php-xhprof php-xdebug blackfire-agent blackfire-php graphviz newrelic-php5 \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN cp /etc/newrelic/newrelic.cfg.template /etc/newrelic/newrelic.cfg

WORKDIR "/application"