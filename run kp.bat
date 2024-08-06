@echo off
cd /d "C:\xampp\htdocs\projectbaru\KP\KP"
echo Starting PHP server...
start cmd /k "php artisan serve"
echo PHP server started.

echo Starting npm development server...
start cmd /k "npm run dev"
echo npm development server started.

timeout /t 25 /nobreak

echo Opening website...
start http://127.0.0.1:8000/
echo website opened

echo Batch file execution completed.

timeout /t 5 /nobreak
exit