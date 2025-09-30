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
    libzip-dev

# 2. Limpiar caché
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Instalar extensiones de PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# 4. Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# 🟢 4.1 Cambiar DocumentRoot a /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 🟢 4.2 Evitar el warning de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 5. Copiar el proyecto al contenedor
COPY . /var/www/html

# 6. Copiar composer.json y composer.lock
COPY composer.json composer.lock* /var/www/html/

# 7. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 8. Establecer directorio de trabajo
WORKDIR /var/www/html

# 9. Instalar dependencias de Composer (sin desarrollo)
RUN composer install --no-dev --optimize-autoloader

# 10. Configurar permisos de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 11. Exponer puerto 80
EXPOSE 80
