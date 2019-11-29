# An example rest client

I hope this small example client can inspire you to make better rest api clients in php.

STOP THE ARRAY MADNESS AND EMBRACE AUTOCOMPLETION!

## Guidelines for a good rest client

- Make sure the underlying client can be modified, use PSR-17/18
- Provide request objects
- If not single scalar response, always provide response objects that are carefully type hinted
- Use descriptive function names
- Handle authentication centrally / in a middleware

## How to use, a guzzle example

composer example

```json
{
    "name": "phpro/rest-demo-client-usage",
    "description": "Usage example of the rest client demo",
    "type": "project",
    "license": "MIT",
    "repositories": [
        {
            "type": "github",
            "url": "https://github.com/janvernieuwe/rest-demo.git"
        }
    ],
    "require": {
        "phpro/rest-demo": "dev-master",
        "php-http/guzzle6-adapter": "^2.0"
    }
}

```

usage example
```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Phpro\RestDemo\Request\Film\SearchFilmRequest;
use Phpro\RestDemo\StarwarsClient;

$guzzle = new Client();
$httpClient = new GuzzleAdapter($guzzle);
$client = new StarwarsClient($httpClient);

$films = $client->searchFilms(SearchFilmRequest::byTitle('return'));
var_dump($films);

```

End the array madness now, be lazy and autocomplete all the things!