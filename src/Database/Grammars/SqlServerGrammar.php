<?php

namespace Verifiedit\LaravelSqlServerDriverEnhanced\Database\Grammars;

use Illuminate\Database\Query\Builder;

class SqlServerGrammar extends \Illuminate\Database\Query\Grammars\SqlServerGrammar
{
    /**
     * Compile an insert and get ID statement into SQL.
     *
     * @param Builder $query
     * @param array $values
     * @param string $sequence
     * @return string
     */
    public function compileInsertGetId(Builder $query, $values, $sequence): string
    {
        $sql = $this->compileInsert($query, $values);

        return 'set nocount on;' . $sql . ';select scope_identity() as ' . $this->wrap($sequence ?: 'id');
    }
}
