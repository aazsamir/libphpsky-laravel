<?php

declare(strict_types=1);

namespace Aazsamir\LibphpskyLaravel;

use Aazsamir\Libphpsky\Client\ATProtoClient;
use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\Client\Session\PsrCacheSessionStore;
use Illuminate\Support\Facades\App;

class ATProtoClientProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ATProtoClientInterface::class, function ($app) {
            /** @var App $app */
            $builder = ATProtoClientBuilder::default();
            /** @var \Psr\Cache\CacheItemPoolInterface $cache */
            $cache = $app->make('cache.psr6');
            $builder->sessionStore(
                new DecoratedSessionStore(
                    new MemorySessionStore(),
                    new PsrCacheSessionStore($cache)
                )
            )->useQueryCache(false);

            return $builder->build();
        });

        $this->app->alias(ATProtoClient::class, ATProtoClientInterface::class);
    }
}
