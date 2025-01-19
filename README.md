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

class MyController extends Controller
{
    public function __construct(
        private \Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient $metaClient,
        private \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle $resolveHandle
    ) {}

    public function index()
    {
        // use ATProtoMetaClient
        dd($this->metaClient->comAtprotoIdentityResolveHandle('bsky.app'));
        // or plain Libphpsky type
        dd($this->resolveHandle->query('bsky.app'));
    }
}