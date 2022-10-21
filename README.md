# SprykerPHPBridge
## A PHP wrapper for the Spryker Glue API.
> Written in PHP using [Gacela](https://github.com/gacela-project/gacela)

### Q. So what does this do and why is it useful?

A. This package allows you to easily interact with the Spryker Glue API in your 3rd party PHP Application.

### Q. So... erm... why? Why not just use Spryker...? It's already a great PHP application!

A. Well we know...! But this package allows you to use Spryker data in any PHP Application... like WordPress, Joomla, Drupal or even Laraval.


### Installation

```bash
composer require engineered/sprykerphpbridgegacela
```


### Example

```php

<?php

require __DIR__ . '/vendor/autoload.php';

// Change YOUR_GLUE_URL to something like: 'https://glue.de.b2c.demo-spryker.com'
$sprykerBridge = SprykerBridge::create(YOUR_GLUE_URL);


// Login and return the Bearer Token for other protected requests.
$bearerToken = $sprykerBridge->getAccessToken('sonia@spryker.com', 'change123', TokenReturnAttribute::accessToken);


```
