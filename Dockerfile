# --- Build stage ---
FROM php:8.2-cli AS builder

# system deps & php extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    nodejs npm \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml zip \
  && rm -rf /var/lib/apt/lists/*

# composer (copy from official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# copy composer files first for caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-progress

# copy rest of app
COPY . .

# build frontend (if package.json exists)
RUN if [ -f package.json ]; then npm ci && npm run production || true; fi

# optimize laravel (optional safe steps)
RUN php artisan key:generate --ansi || true
RUN php artisan config:cache || true || true
RUN php artisan route:cache || true || true
RUN php artisan view:cache || true || true

# --- Runtime stage ---
FROM php:8.2-cli AS runtime

WORKDIR /srv/app

# runtime deps & extensions
RUN apt-get update && apt-get install -y libpng-dev libzip-dev unzip && docker-php-ext-install pdo_mysql mbstring gd zip xml bcmath && rm -rf /var/lib/apt/lists/*

# copy composer from builder (optional)
COPY --from=builder /usr/bin/composer /usr/bin/composer

# copy application
COPY --from=builder /app /srv/app

WORKDIR /srv/app

# permissions
RUN chown -R www-data:www-data /srv/app/storage /srv/app/bootstrap/cache || true
RUN chmod -R 775 /srv/app/storage /srv/app/bootstrap/cache || true

# expose port Railway will provide via $PORT env
ENV PORT=8080
EXPOSE 8080

# Startup: avoid forcing migrations automatically in production unless you want to
CMD php artisan storage:link --force || true && php artisan serve --host=0.0.0.0 --port=${PORT}
