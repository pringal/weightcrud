# Weightcrud

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

A simple package for weight data CRUD using Vue.Js , Laravel 9

## Install the package

- Vue Scaffolding should preset
```angular2html
composer require laravel/ui
php artisan ui vue
```
Via Composer

``` bash
$ composer require pringal/weightcrud
```

Next, Paste this code snippet in resources/js/app.js in your laravel

```angular2html
import Weight from '../../vendor/pringal/weightcrud/resources/js/components/Weight.vue'
app.component('weight', Weight)
```

You can see the CRUD page at
```angular2html
http://127.0.0.1:8000/weight-crud
```
## Usage

Weight Management CRUD

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email pringal.development@gmail.com instead of using the issue tracker.

## Credits

- [pringal][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/pringal/weightcrud.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pringal/weightcrud.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pringal/weightcrud/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/pringal/weightcrud
[link-downloads]: https://packagist.org/packages/pringal/weightcrud
[link-travis]: https://travis-ci.org/pringal/weightcrud
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/pringal
[link-contributors]: ../../contributors
