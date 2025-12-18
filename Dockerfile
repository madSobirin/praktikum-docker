# 1. Gunakan PHP 8.2 CLI sebagai base
FROM php:8.2-cli

# 2. Install system dependencies, Node.js, dan library untuk GD & PDF
RUN apt-get update && apt-get install -y \
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

# ... (sisanya sama seperti sebelumnya)

# 4. Set working directory
WORKDIR /var/www
COPY . .

# 5. Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# 6. Build Vite
RUN npm install && npm run build

# 7. Siapkan Database & Storage Link
RUN mkdir -p database && touch database/database.sqlite
RUN php artisan storage:link
RUN chmod -R 777 storage bootstrap/cache database

# 8. Jalankan aplikasi
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}