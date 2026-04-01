# 1. Base Image: PHP 8.0 ke saath Apache server
FROM php:8.0-apache

# 2. MySQL se connection ke liye 'mysqli' extension install karein
# Yeh step zaroori hai kyunki default PHP image mein MySQL driver nahi hota
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 3. Apni saari files (HTML, CSS, JS, PHP, Images) container mein copy karein
# '.' ka matlab hai current folder, aur '/var/www/html/' Apache ka default folder hai
COPY . /var/www/html/

# 4. Permissions set karein taake Apache files ko read/write kar sake
RUN chown -R www-data:www-data /var/www/html

# 5. Apache ki port 80 ko expose karein
EXPOSE 80

# 6. Container start hote hi Apache ko background mein chalayein
CMD ["apache2-foreground"]
