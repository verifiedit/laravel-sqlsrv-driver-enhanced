<?php

namespace Verifiedit\LaravelSqlServerDriverEnhanced\Database;

use Verifiedit\LaravelSqlServerDriverEnhanced\Database\Grammars\SqlServerGrammar as QueryGrammar;
use Verifiedit\LaravelSqlServerDriverEnhanced\Database\Processors\SqlServerProcessor;

class SqlServerConnection extends \Illuminate\Database\SqlServerConnection
{
    protected function getDefaultQueryGrammar()
    {
        ($grammar = new QueryGrammar)->setConnection($this);

        return $this->withTablePrefix($grammar);
    }

    protected function getDefaultPostProcessor()
    {
        return new SqlServerProcessor;
    }
}
