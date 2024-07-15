# Use the official PHP 5.6 FPM image as the base
FROM php:5.6.40-fpm-alpine

# Install necessary extensions and dependencies
RUN apk add --no-cache \
  freetype-dev \
  libjpeg-turbo-dev \
  libpng-dev \
  libmcrypt-dev \
  oniguruma-dev \
  libxml2-dev \
  curl \
  zip \
  unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd \
  && docker-php-ext-install pdo pdo_mysql mysqli mbstring exif pcntl bcmath xml

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --prefer-dist --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Required to make artisan key:generate work
RUN echo -e "\
APP_KEY=\
" >> .env

RUN php artisan key:generate

# Expose port 9000 for PHP-FPM
EXPOSE 9000

CMD php artisan migrate --force && php artisan db:seed --force && php-fpm
