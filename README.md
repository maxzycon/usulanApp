## how to deploy
1. download zip at the top right (green button) 
2. make .env file and copy all of .env.example
3. setting database at .env file
4. setting from `APP_DEBUG=true` to `APP_DEBUG=false`in .env file
5. run `composer install && npm install && php artisan key:generate && php artisan migrate && php artisan db:seed && npm run build` 
6. after that follow video at `10:42` 
