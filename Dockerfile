# 1. On utilise une machine virtuelle avec PHP 8.2
FROM php:8.2-cli

# 2. On installe les outils nécessaires sur le serveur
RUN apt-get update && apt-get install -y unzip zip git libsqlite3-dev

# 3. On installe Composer (le gestionnaire de paquets PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. On crée le dossier de l'application sur le serveur
WORKDIR /app

# 5. On copie tout ton code vers le serveur
COPY . /app

# 6. On configure les variables de sécurité (car le fichier .env n'est pas envoyé sur GitHub)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_KEY=DjimEDemBeLePoRtFoLioLaRaVeL2026
ENV DB_CONNECTION=sqlite

# 7. On installe les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# 8. On prépare la base de données
RUN touch database/database.sqlite
RUN php artisan migrate --force

# 9. On lance le serveur Laravel !
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
