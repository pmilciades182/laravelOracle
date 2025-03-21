FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libaio1 \
    wget \
    alien \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Oracle Instant Client
RUN mkdir -p /opt/oracle
WORKDIR /opt/oracle

# Descargar e instalar Oracle Instant Client
RUN wget https://download.oracle.com/otn_software/linux/instantclient/236000/oracle-instantclient23.6-basic-23.6.0.24.07-1.x86_64.rpm \
    && alien -i oracle-instantclient23.6-basic-23.6.0.24.07-1.x86_64.rpm \
    && rm oracle-instantclient23.6-basic-23.6.0.24.07-1.x86_64.rpm

# Configurar variables de entorno para Oracle
ENV LD_LIBRARY_PATH=/usr/lib/oracle/23.6/client64/lib
ENV OCI_LIB_DIR=/usr/lib/oracle/23.6/client64/lib
ENV OCI_INC_DIR=/usr/include/oracle/23.6/client64

# Instalar y configurar la extensión OCI8
RUN docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/lib/oracle/23.6/client64/lib \
    && docker-php-ext-install oci8

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install

# Configurar permisos
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Exponer el puerto 9000
EXPOSE 9000

# Iniciar PHP-FPM
CMD ["php-fpm"] 