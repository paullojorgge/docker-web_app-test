FROM ubuntu:latest
RUN apt-get update && apt-get -y upgrade
# next line will set a environment variable in order to avoid to ask to set timezone :)
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get -y install apache2 php php-mysqli libapache2-mod-php7.2 tzdata 
RUN useradd -m -s /bin/bash -d /home/worker worker
WORKDIR /var/www/html
ADD css css
ADD js js
ADD templates templates
COPY database.php database.php
COPY add.php add.php
COPY create.php create.php
COPY index.php index.php
COPY update.php update.php
COPY edit.php edit.php
COPY delete.php delete.php
RUN rm -f index.html
RUN chown -R worker /var/www/html
USER root
CMD ["apachectl","-D","FOREGROUND"]
VOLUME ["/var/www/html"]
VOLUME ["/etc/apache2"]
