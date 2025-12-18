# 1. Gunakan PHP 8.2 CLI sebagai base
FROM php:8.2-cli

# 2. Install dependensi sistem, library GD (untuk PDF), dan sertifikat SSL (untuk Email)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    ca-certificates \
    && update-ca-certificates \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip pdo pdo_sqlite gd

# 3. Ambil Composer dari image resmi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 5. Copy seluruh file project
COPY . .

# 6. Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# 7. Build Vite (untuk CSS/JS) - Menghindari error "Vite manifest not found"
RUN npm install && npm run build

# 8. Setup Link Storage & Permissions
# Kita buat file database kosong di folder storage agar bisa dipersistenkan lewat Volume
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache \
    && mkdir -p database \
    && touch storage/database.sqlite \
    && php artisan storage:link \
    && chmod -R 777 storage bootstrap/cache database

# 9. Jalankan aplikasi
# Note: Database dipindah ke folder storage agar aman saat redeploy (jika pakai Volume)
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}