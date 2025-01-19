# Libphpsky Laravel

This is a subpackage bringing Libphpsky to Laravel.

## Installation

```bash
composer require aazsamir/libphpsky-laravel
```

## Usage

```php
<?php

namespace App\Http\Controllers;

use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;
use Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;

class MyController extends Controller
{
    public function __construct(
        private ATProtoMetaClient $metaClient,
        private ResolveHandle $resolveHandle
    ) {}

    public function index()
    {
        // use ATProtoMetaClient
        dd($this->metaClient->comAtprotoIdentityResolveHandle('bsky.app'));
        // or plain Libphpsky type
        dd($this->resolveHandle->query('bsky.app'));
        // or if you're not a fan of dependency injection
        dd(ResolveHandle::default()->query('bsky.app'));
    }
}
```
## Authorization

Set the `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables.

## Docs

Checkout the [Libphpsky documentation](https://aazsamir.github.io/libphpsky/) for more information.