start /B "Posty Execution"
F:
cd F:\laravel-project\posty
start microsoft-edge:http://posty.kash:9001
php artisan serve --host=posty.kash --port=9001