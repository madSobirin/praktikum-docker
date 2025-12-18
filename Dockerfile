# 1. Gunakan PHP 8.2 CLI sebagai base
FROM php:8.2-cli

# 2. Install sistem dependencies, Node.js, dan library SQLite
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install zip pdo pdo_sqlite

# 3. Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www
COPY . .

# 5. Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# 6. Install NPM dependencies & Build Asset (Vite)
# Ini langkah penting untuk memperbaiki error "Vite manifest not found"
RUN npm install && npm run build

# 7. Siapkan Database SQLite & Permission
# Membuat file database kosong jika belum ada
RUN mkdir -p database && touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

# 8. Railway menggunakan port dinamis ($PORT), jadi EXPOSE biasanya diabaikan
# Namun kita tetap jalankan server menggunakan variabel lingkungan PORT
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}