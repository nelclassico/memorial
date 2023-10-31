FROM wordpress:6-php8.2

# Copie o tema para a pasta wp-content/themes/memorial-theme no contêiner
COPY memorial-theme/ /var/www/html/wp-content/themes/memorial-theme/

