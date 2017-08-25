# Test links showcase

This is a simple showcase how could work React with Chart JS under Laravel PHP framework.
Live DEMO at http://test-links.vilport.com/

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Get composer in order to install PHP dependencies - download instructions at https://getcomposer.org/download/
Additionally, if also interested on front-end UI, get Nodejs and Npm - download instructions at https://nodejs.org/en/ and https://docs.npmjs.com/getting-started/installing-node

### Installing

Get vendor directory with composer

```
composer install
```

Next step is to establish a database connection and create links table

```
php artisan migrate
```

If you aren't familiar with Laravel setup (Environment, database, etc) don't forget to check out Laravel documentation at https://laravel.com/docs

For UI you can get node modules with command

```
npm install
```



## Built With

* [Laravel](https://laravel.com/) - PHP web framework used
* [React](https://facebook.github.io/react/) - Javascript UI
* [ChartJS](http://www.chartjs.org/) - Used to visualize test data

## License

This project is licensed under the MIT License.
