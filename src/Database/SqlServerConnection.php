<?php

namespace Verifiedit\LaravelSqlServerDriverEnhanced\Database;

use Verifiedit\LaravelSqlServerDriverEnhanced\Database\Grammars\SqlServerGrammar as QueryGrammar;
use Verifiedit\LaravelSqlServerDriverEnhanced\Database\Processors\SqlServerProcessor;

class SqlServerConnection extends \Illuminate\Database\SqlServerConnection
{
    protected function getDefaultQueryGrammar()
    {
        return new QueryGrammar($this);
    }

    protected function getDefaultPostProcessor()
    {
        return new SqlServerProcessor;
    }
}
