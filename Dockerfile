FROM php:8.2-cli-alpine 


# environment variable
ENV \
    APP_DIR="app" \
    APP_PORT="8001"
# memindahkan file / folder ke directory yg di inginkan di docker
COPY . $APP_DIR 
COPY .env.example $APP_DIR/.env 

# menginstall kebutuhan yg ingin kita gunakan
RUN apk add --update \
    curl \
    php \
    php-opcache \
    php-pdo \
    php-json \
    php-phar \
    php-dom \
    && rm -rf /var/cache/apk/*

# menginstall composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer


# menjalankan perintah composer
RUN cd $APP_DIR && composer update 
RUN cd $APP_DIR && php artisan key:generate 

# entrypoint
WORKDIR $APP_DIR 


CMD php artisan serve --host=0.0.0.0 --port=$APP_PORT 


#akses ke direktory
EXPOSE $APP_PORT 