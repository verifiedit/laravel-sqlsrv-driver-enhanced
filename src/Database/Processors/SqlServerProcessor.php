<?php

namespace Verifiedit\LaravelSqlServerDriverEnhanced\Database\Processors;

use Illuminate\Database\Query\Builder;

class SqlServerProcessor extends \Illuminate\Database\Query\Processors\SqlServerProcessor
{
    /**
     * Process an "insert get ID" query.
     *
     * @param Builder $query
     * @param string $sql
     * @param array $values
     * @param string|null $sequence
     * @return int
     */
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null): int
    {
        $connection = $query->getConnection();

        $connection->recordsHaveBeenModified();

        $result = $connection->selectFromWriteConnection($sql, $values)[0];

        $sequence = $sequence ?: 'id';

        $id = is_object($result) ? $result->{$sequence} : $result[$sequence];

        return is_numeric($id) ? (int)$id : $id;
    }
}
