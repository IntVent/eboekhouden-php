# A PHP framework agnostic package for E-boekhouden.nl

With this package you can easily integrate it within your own PHP project.  
If you wish to use this package and want to support future development. Please consider to sponsor.  

## Installation

You can install the package via composer:

```bash
composer require intvent/eboekhouden-php
```

## Usage

``` php
$username = 'username';
$sec_code_1 = 'sec_code_1';
$sec_code_2 = 'sec_code_2';

$client = new Intvent\Eboekhouden\Client($username, $sec_code_1, $sec_code2);

// Get SigleSignOnLink (AutoLogin)
$autoLogin = $client->autoLogin();

// Get the Relations
$relations = $client->getRelations();

// Get the Mutations
$mutations = $client->getMutations();

// Get the Ledgers
$ledgers = $client->getLedgers();

// Get the Invoices
$invoices = $client->getInvoices();
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email info@intvent.nl instead of using the issue tracker.

## Credits

- [IntVent](https://github.com/IntVent)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
