# A PHP composer package for E-Boekhouden.nl

![Tests](https://github.com/intvent/eboekhouden-php/workflows/Tests/badge.svg) ![Psalm](https://github.com/intvent/eboekhouden-php/workflows/Psalm/badge.svg)

With this framework agnostic package you can easily integrate E-boekhouden.nl within any PHP project.  
If you wish to use this package and want to support future development. Please consider to [sponsor](https://github.com/sponsors/petericebear).

View the original [SOAP documentation](https://secure.e-boekhouden.nl/handleiding/Documentatie_soap.pdf).   

## Installation

You can install the package via composer:

```bash
composer require intvent/eboekhouden-php
```

## Usage (Examples)

``` php
require __DIR__ . '/vendor/autoload.php';

$username = 'username';
$sec_code_1 = 'sec_code_1';
$sec_code_2 = 'sec_code_2';

$client = new IntVent\EBoekhouden\Client($username, $sec_code_1, $sec_code2);

// Get a SigleSignOnLink (AutoLogin)
$autoLogin = $client->autoLogin();

// Get all Articles
$articles = $client->getArticles();

// Get all Relations
$relations = $client->getRelations();

// Get all Mutations
$mutations = $client->getMutations();

// Get all Ledgers
$ledgers = $client->getLedgers();

// Get all Invoices
$invoices = $client->getInvoices();

// Get all Balances
$balances = $client->getBalances();
```

## Testing & building

To testing the package locally run:
``` bash
composer test
```

Before publishing any changes you can run code formatting and PSALM.
``` bash
composer format
composer psalm
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
