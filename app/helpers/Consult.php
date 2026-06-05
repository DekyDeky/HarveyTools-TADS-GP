<?php

namespace App\Helpers;

class Consult {

    public static function read(
        \PDO $pdo, 
        string $table, 
        ?array $columns = [], 
        ?array $whereColumns = [], 
        ?array $join = [], 
        ?string $orderBy = "", 
        ?array $useGroupConcat = [],
        ?string $groupBy = ""

    ): array{

         try {
            
            $columnsStr = FormatSQL::formatColumns(['*'], $columns);
            $whereStr = FormatSQL::formatWhere($whereColumns);
            $param = FormatSQL::formatParams($whereColumns);
            $innerJoin = FormatSQL::formatInnerJoin($join, $table);

            if(!empty($useGroupConcat)){
                $columnsStr .= ", GROUP_CONCAT(".$useGroupConcat[0].") AS ". $useGroupConcat[1] . " ";
            }

            $sql = "SELECT $columnsStr FROM $table ";

            if(!empty($join)){
                $sql .= $innerJoin;
            }

            if(!empty($whereColumns)){
                $sql .= "WHERE " . $whereStr;
            }

            if(!empty($groupBy)) {
                $sql .= " GROUP BY " . $groupBy;
            }

            if(!empty($orderBy)) {
                $sql .= " ORDER BY " . $orderBy;
            }

            $stmt = $pdo->prepare($sql);
            $stmt->execute($param);

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if(count($result) > 1){
                return $result;
            }else {
                return reset($result);
            }

        }catch (\Throwable $e){
            return [
                'type' => 'exception',
                'section' => 'Consult::Read',
                'message' => $e->getMessage()
            ];
        }
    
    }
}