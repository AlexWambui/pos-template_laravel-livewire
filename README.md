# Web App Template
This is a blue print to help build web applications faster.



# Usage
1. Install laravel
```
composer create-project --prefer-dist laravel/laravel project_name
```
2. Install livewire and publish it's config file
```
composer require livewire/livewire
```
```
php artisan livewire:publish --config
```
3. In the config file for livewire, change the layout
```
 - 'layout' => 'components.layouts.app',
 + 'layout' => 'layouts.app',
 ```
 4. Install tailwindcss v4
 ```
 npm install tailwindcss @tailwindcss/vite
 ```
