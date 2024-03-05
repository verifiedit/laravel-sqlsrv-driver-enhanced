<?php

namespace Verifiedit\LaravelSqlServerDriverEnhanced;

use Verifiedit\LaravelSqlServerDriverEnhanced\Database\SqlServerConnection;
use Illuminate\Database\Connection;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Connection::resolverFor(
            'sqlsrv',
            fn ($connection, $database, $prefix, $config) => new SqlServerConnection(
                $connection,
                $database,
                $prefix,
                $config
            )
        );
    }
}
