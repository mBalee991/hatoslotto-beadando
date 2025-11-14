<?php
echo "<pre>";
system('php artisan route:clear');
system('php artisan config:clear');
system('php artisan cache:clear');
system('php artisan view:clear');
echo "Laravel cache cleared!";