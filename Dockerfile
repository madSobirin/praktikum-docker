# 1. Gunakan PHP 8.2 CLI sebagai base
FROM php:8.2-cli

# 2. Install dependensi sistem dan library untuk GD (PDF)
RUN apt-get update && apt-get install -y \
    ca-certificates \
    && update-ca-certificates \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip pdo pdo_sqlite gd

# 3. AMBIL COMPOSER DARI IMAGE RESMI (PENTING!)
# Baris ini yang akan memperbaiki error "composer: not found"
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 5. Copy semua file project
COPY . .

# 6. Jalankan Composer Install
# Sekarang perintah ini tidak akan error lagi
RUN composer install --no-dev --optimize-autoloader

# 7. Build Vite (untuk CSS/JS)
RUN npm install && npm run build

# 8. Setup Database & Permission
RUN mkdir -p database && touch database/database.sqlite
RUN php artisan storage:link
RUN chmod -R 777 storage bootstrap/cache database

# 9. Jalankan aplikasi
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}