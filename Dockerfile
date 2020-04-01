FROM carlosbensant/laravel-for-dokku
# Delete sample app
RUN rm -fr /app/*
# Copy our app into the app folder
COPY . /app
# Create our .env file (we use a commited file called .env.staging)
RUN cp .env.staging .env
RUN touch /app/storage/logs/laravel.log && chmod 777 /app/storage/logs/laravel.log
RUN rm -rf /storage/
# Composer Install
ENV GITHUB_TOKEN fbaa6f20adb7fb818b0e286e3117aead1b10e11d
RUN composer config --global github-oauth.github.com $GITHUB_TOKEN
RUN composer install --no-interaction
# PHP Artisan Commands
RUN php artisan key:generate
RUN php artisan cache:clear
RUN php artisan config:clear
RUN php artisan storage:link 
# RUN php artisan migrate:refresh --seed
#
#RUN chmod 777 /app/storage/oauth-private.key
#RUN chmod 777 /app/storage/oauth-public.key
# Run our command (It runs chmod on our storage and cache folders as well as php artisan migrate)
CMD ["/run.sh"]
