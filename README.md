# laravel5.4-angular2
This is initial setup of Angular 2 with Laravel 5.4.

1. First clone it or download it.
2. Run this command in your terminal-
```
composer install
```
3. Rename .env.example to .env (already done)
4. Run this command in your terminal- 
```
php artisan key:generate
npm install
```
5. Go **_node_modules>elixer-typescript>index.js_** and comment this line
```
//.pipe($.concat(paths.output.name))  (already done)
```
6. Run this command in your terminal-
```
gulp
```
7. Launch it into your browser with localhost or php artisan command -
```
php artisan serve
```
