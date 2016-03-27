# WeDraw
proyek ppl kelompok b02

local server:  
- start Apache & MySQL (XAMPP)  
- clone repo ke folder htdocs (XAMPP)  
- run command "composer install"  di dalam folder  
- copy file .env.example ke file baru dengan nama .env  
- ubah baris-baris berikut di .env  
	DB_DATABASE=wedraw  
	DB_USERNAME=root  
	DB_PASSWORD=  
- run command "php artisan key:generate"  
- buat database "wedraw" di phpMyAdmin   
- run command "php artisan migrate" di dalam folder  
- buka "localhost:8080/wedraw/public" / "localhost/wedraw/public" di browser
