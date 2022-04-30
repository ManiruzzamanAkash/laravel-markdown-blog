
## Laravel Markdown Blog
An example blog application using Laravel, Markdown, Prism JS and Markdown JS - the right way.

### Live Demo -
http://laravel-markdown-blog.herokuapp.com


**Why I've done this ?**
Basically I love to write blog articles on my DevsEnv - https://devsenv.com website by Laravel which uses **Tiny MCE Editor**, but I'm not satisfied with that. I believe, using **Markdown** is just a much better way to write blog articles.

### Versions
1. PHP - `^7.3|^8.0`
2. Laravel - `^8.75`

### External packages, I used
1. Laravel Markdown Parser - https://github.com/GrahamCampbell/Laravel-Markdown
1. JavaScript Markdown Editor - https://github.com/sparksuite/simplemde-markdown-editor
1. PrismJS - https://prismjs.com/
1. SimpleMDE - https://simplemde.com/

### How to Start
```sh
## Clone repository
git clone https://github.com/ManiruzzamanAkash/laravel-markdown-blog.git

## Go to that folder
cd laravel-markdown-blog

## Install composer
composer install

## Create file .env and
Copy .env.example to .env

## Create a database called
laravel_markdown

## Generate Key
php artisan key:generate

# Run migrations and seeder file to seed 1,000 tutorials
php artisan migrate --seed

## Install node, as we've used Tailwind CSS
npm install

## Run tailwind CSS in watch mode to detect any file change
## and automatically generate app.css in public/css/app.css
npm run watch
```

### Screenshots

#### Tutorial Lists Page
![Laravel Markdown Blog](https://i.ibb.co/LkQxdX1/01-Tutorial-Lists.png)

#### Tutorial Create Page
![Laravel Create Tutorial](https://i.ibb.co/xswbMf1/02-Create-Tutorial.png)

#### Tutorial Create Tutorial Fill Data
![Tutorial Create Tutorial Fill Data](https://i.ibb.co/P5jtLPP/03-Create-Tutorial-Fill-data.png)

#### Tutorial Detail Page
![Tutorial View](https://i.ibb.co/X569q69/04-View-Tutorial-Detail.png)

#### Tutorial Edit Page
![Tutorial Edit Page](https://i.ibb.co/YLv0Dmx/05-Edit-Tutorial.png)

#### After Save Tutorial
![After Save Tutorial](https://i.ibb.co/XpzQR89/06-After-Save-Tutorial.png)
