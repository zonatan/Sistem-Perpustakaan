# Gunakan PHP + Apache sebagai base image
FROM php:8.1-apache

# Install ekstensi yang diperlukan (misalnya mysqli untuk database MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy semua file proyek ke dalam container
COPY . /var/www/html/

# Set working directory ke dalam folder proyek
WORKDIR /var/www/html

# Expose port 80 agar bisa diakses
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
