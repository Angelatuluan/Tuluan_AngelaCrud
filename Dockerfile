FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
        libicu-dev \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install \
        pdo_mysql \
        intl \
        zip \
    && docker-php-ext-enable \
        pdo_mysql intl zip \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache modules
RUN a2enmod rewrite headers expires

# Configure Apache: allow .htaccess and disable directory listing
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && sed -i '/Options Indexes FollowSymLinks/c\Options FollowSymLinks' /etc/apache2/apache2.conf

# Copy project files
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Use the Apache foreground command
CMD ["apache2-foreground"]
