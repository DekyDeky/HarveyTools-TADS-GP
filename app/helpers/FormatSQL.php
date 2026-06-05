<?php

namespace App\Helpers;

use Exception;

class FormatSQL {

    public static function formatColumns(array $defaultColumns, ?array $columns = null){
        $cols = $columns ? $columns : $defaultColumns;
        return implode(', ', $cols);
    }

    public static function formatWhere(array $params): string {
    $conditions = [];

    foreach ($params as $type => $columns) {
            foreach ($columns as $col => $value) {
                $param = str_replace('.', '_', $col);

                switch ($type) {
                    case 'null':
                        $conditions[] = "$col IS NULL";
                        break;

                    case 'like':
                        $conditions[] = "$col LIKE :$param";
                        break;

                    case 'bigOrEq':
                        $conditions[] = "$col >= :$param";
                        break;

                    case 'less':
                        $conditions[] = "$col < :$param";
                        break;

                    case 'big':
                        $conditions[] = "$col > :$param";
                        break;
                    
                    case 'not':
                        $conditions[] = "$col <> :$param";
                        break;

                    default:
                        $conditions[] = "$col = :$param";
                }
            }
        }

        return implode(' AND ', $conditions);
    }


    public static function formatParams(array $params): array {
        $binds = [];

        foreach ($params as $type => $columns) {
            // null não entra nos parâmetros
            if ($type === 'null') {
                continue;
            }

            foreach ($columns as $col => $value) {
                $param = str_replace('.', '_', $col);
                $binds[":$param"] = $value;
            }
        }

        return $binds;
    }

    public static function formatInnerJoin(array $params, string $initTable): string {
        $join = "";

        foreach ($params as $table => $column) {
            $column1 = $column[0];
            $column2 = $column[1];

            // separa tabela e alias, se existir
            $tableParts = explode(' ', trim($table));
            $tableName  = $tableParts[0];
            $alias      = $tableParts[1] ?? $tableName;

            $join .= " INNER JOIN $tableName $alias ON $alias.$column1 = $initTable.$column2 ";
        }

        return $join;
    }

}