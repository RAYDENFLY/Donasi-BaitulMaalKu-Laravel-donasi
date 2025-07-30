# Gunakan base image PHP + Apache
FROM php:8.2-apache

# Install sistem dependency
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libonig-dev libxml2-dev libzip-dev libsqlite3-dev supervisor \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js & npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy source code
COPY . .

RUN printf '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>\n' > /etc/apache2/sites-available/000-default.conf


# Install Laravel & Vite dependencies
RUN composer install --no-interaction --optimize-autoloader \
    && npm install

# Run storage link
RUN php artisan storage:link

# Set permission
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

# Tambah file konfigurasi supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port Apache
EXPOSE 80

# Jalankan supervisord
CMD ["/usr/bin/supervisord"]
