FROM wordpress:6-php8.2

# Adicionar os comandos necessários para enviar as alterações para a imagem
# COPY memorial-theme/ ./wp-content/themes/memorial-theme/
COPY memorial-theme/ ./wp-content/themes/memorial-theme/
