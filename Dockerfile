
FROM php:8.0.2-apache

RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y mariadb-client libxml2-dev vim curl git
RUN apt-get autoremove -y && apt-get autoclean
RUN docker-php-ext-install mysqli pdo pdo_mysql xml
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN a2enmod rewrite

# # sendmail config
# ############################################

# RUN apt update && upgrade
# RUN apt-get install -y ssmtp mailutils

# # root is the person who gets all mail for userids < 1000
# RUN echo "root=yourAdmin@email.com" >> /etc/ssmtp/ssmtp.conf

# # Here is the gmail configuration (or change it to your private smtp server)
# RUN echo "mailhub=smtp.gmail.com:587" >> /etc/ssmtp/ssmtp.conf
# RUN echo "AuthUser=your@gmail.com" >> /etc/ssmtp/ssmtp.conf
# RUN echo "AuthPass=yourGmailPass" >> /etc/ssmtp/ssmtp.conf

# RUN echo "UseTLS=YES" >> /etc/ssmtp/ssmtp.conf
# RUN echo "UseSTARTTLS=YES" >> /etc/ssmtp/ssmtp.conf


# # Set up php sendmail config
# RUN echo "sendmail_path=sendmail -i -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini