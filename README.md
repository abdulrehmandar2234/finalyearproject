# Price Comparing

This repo is base on ecommerce websites scrapping. This will scrap multiple ecommerce website products and store into our database. And then load the products and compare the price of a products getting from multiple websites.
User can store the product into wishlist or cart for buying it later from the original website. This website is not for selling products. It's just for getting products at the lowest price.  

## Installation

1. Clone the repo and `cd` into it
1. `composer install`
1. Rename or copy `.env.example` file to `.env`
1. `php artisan key:generate`
1. Set your database credentials in your `.env` file
1. Set your `APP_URL` to `http://127.0.0.1:8000 in your` `.env` file. This is needed for Spatie Media Library correctly resolve asset URLs.
1. `php artisan migrate --seed`. This will migrate the database and run any seeders necessary. 
1. `npm install`
1. `npm run dev`
1. `php artisan serve`
1. Visit `localhost:8000` in your browser

# Used Packages

## Fabpot Goutte

I use [fabpot/goutte](https://github.com/FriendsOfPHP/Goutte) for web crawling.


## Hardevine LaravelShoppingcart

I use [hardevine/LaravelShoppingcart](https://github.com/hardevine/LaravelShoppingcart) for storing cart which is a forked from [Crinsane/LaravelShoppingcart](https://github.com/Crinsane/LaravelShoppingcart) version that updates quicker.

## Spatie Laravel Permission

I use [spatie/laravel-permission](https://github.com/spatie/laravel-permission) for roles and permissions. 

## Spatie Media Library 

I use [spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary) for storing and downloading images. 

## Spatie Laravel Searchable

I use Laravel [spatie/laravel-searchable](https://github.com/spatie/laravel-searchable) for getting results from multiple models.

## Spatie Laravel Slugable 

I use [spatie/laravel-sluggable](https://github.com/spatie/laravel-searchable) for pretty urls. 

## Nicolaslopezj Searchable 

I use [nicolaslopezj/searchable](https://github.com/nicolaslopezj/searchable) for searching and comparing products price.

## Laravel Livewire 

I use [livewire/livewire](https://laravel-livewire.com/docs) for component rendering.

