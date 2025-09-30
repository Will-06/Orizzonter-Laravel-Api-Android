FROM php:8.2-apache

# 1. Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Instalar extensiones de PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# 3. Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# 4. Cambiar DocumentRoot a /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 5. Configurar Apache para permitir .htaccess en /var/www/html/public
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# 6. Evitar warning de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 7. Copiar proyecto al contenedor
COPY . /var/www/html

# 8. Copiar composer.json y composer.lock (esto puede ser redundante pero no hace daño)
COPY composer.json composer.lock* /var/www/html/

# 9. Copiar composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 10. Establecer directorio de trabajo
WORKDIR /var/www/html

# 11. Instalar dependencias de Composer sin desarrollo y optimizar autoload
RUN composer install --no-dev --optimize-autoloader

# 12. Configurar permisos correctos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 13. Exponer puerto 80
EXPOSE 80
