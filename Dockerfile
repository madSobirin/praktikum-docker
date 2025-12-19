# 1. Gunakan PHP 8.2 CLI sebagai base
FROM php:8.2-cli

# 2. Install dependensi sistem dan driver MySQL (PENTING!)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    ca-certificates \
    && update-ca-certificates \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    # Tambahkan pdo_mysql untuk MySQL dan hapus pdo_sqlite
    && docker-php-ext-install zip pdo pdo_mysql gd

# 3. Ambil Composer dari image resmi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 5. Copy seluruh file project
COPY . .

# 6. Install PHP dependencies
# Pastikan kamu sudah menjalankan 'composer require symfony/sendinblue-mailer' di lokal sebelum push
RUN composer install --no-dev --optimize-autoloader

# 7. Build Vite (untuk CSS/JS) agar tampilan tidak rusak
RUN npm install && npm run build

# 8. Setup Permissions
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache \
    && php artisan storage:link \
    && chmod -R 777 storage bootstrap/cache

# 9. Jalankan aplikasi
# Perintah migrate akan otomatis lari ke MySQL Railway
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}