# Laravel Client to use the MondialRelay API

## Description
This package uses [QuentinBontemps/php-mondialrelay-api](https://github.com/QuentinBontemps/php-mondialrelay-api).

This client allow to use the [Mondial Relay Soap API](https://api.mondialrelay.com/Web_Services.asmx) with Laravel.

## Requirements
- PHP >= 5.6
- php-soap extension

## Installation
```bash
composer require quentinbontemps/laravel-mondialrelay
```

If you're on Laravel 5.4 or earlier, you'll need to add the following to your  ```config/app.php``` :

```php
'providers' => [
    // ... 
    \QuentinBontemps\LaravelMondialRelay\LaravelMondialRelayServiceProvider::class,
],
```

## Configuration

You need configure your MondialRelay ids :

You have two solutions :

- ```.env``` :
    - MONDIAL_RELAY_ENVIRONMENT=demo|prod (DEFAULT : demo)
    - MONDIAL_RELAY_SITE_ID=xxx
    - MONDIAL_RELAY_SITE_KEY=xxx
    - MONDIAL_RELAY_WSDL=XXX (DEFAULT : https://api.mondialrelay.com/Web_Services.asmx?WSDL)
    
- publish config file :
```bash
php artisan vendor:publish --tag=laravel_mondialrelay_config
```

## Usage

```php
use use QuentinBontemps\LaravelMondialRelay\Facades\LaravelMondialRelay;

$client = LaravelMondialRelay::client();

$shops = $client->findDeliveryPoints([
    'Pays'            => 'FR',
    'Ville'           => 'Paris',
    'CP'              => '75000',
    'DelaiEnvoi'      => "0",
    'RayonRecherche'  => '20',
    'NombreResultats' => '10',
]);
```

## Contribution
Contributions are always welcome.