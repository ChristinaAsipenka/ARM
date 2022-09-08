<?php

namespace Engine\Core\Database;

class QueryBuilder
{
    /**
     * @var array
     */
    protected $sql = [];

    /**
     * @var array
     */
    public $values = [];

    /**
     * @param string $fields
     * @return $this
     */
    public function select($fields = '*')
    {
        $this->reset();
        $this->sql['select'] = "SELECT {$fields} ";

        return $this;
    }

	
    public function delete()
    {
        $this->reset();
        $this->sql['delete'] = "DELETE ";

        return $this;
    }	
	
	
	
    /**
     * @param $table
     * @return $this
     */
    public function from($table)
    {
        $this->sql['from'] = "FROM {$table} ";

        return $this;
    }

    /**
     * @param string $column
     * @param string $value
     * @param string $operator
     * @return $this
     */
    public function where($column, $value, $operator = '=')
    {
        $this->sql['where'][] = "{$column} {$operator} ?";
        $this->values[] = $value;
        return $this;
    }
	
	public function whereIsNull($column)
    {
        $this->sql['where'][] = "{$column} is null ";

        return $this;
    }
	
	public function orWhereIsNull($column)
    {
        $this->sql['orwhere'][] = "{$column} is null ";

        return $this;
    }
	
	public function whereIsNotNull($column)
    {
        $this->sql['where'][] = "{$column} is not null ";

        return $this;
    }
	
	public function orWhere($column, $value, $operator = '=')
    {
        $this->sql['orwhere'][] = "{$column} {$operator} ?";
        $this->values[] = $value;

        return $this;
    }
	
	public function WhereIf($condition, $option1, $option2)
    {
        $this->sql['whereif'][] = "IF($condition ? $option1, $option2)";
      //  $this->values[] = $value;

        return $this;
    }
	
	public function whereReplace($column, $value, $operator = '=')
    {
        $this->sql['where'][] = "REPLACE({$column},' ','') {$operator} ?";
        $this->values[] = $value;

        return $this;
    }

    /**
     * @param $field
     * @param $order
     * @return $this
     */
    public function orderBy($field, $order)
    {
       // $this->sql['order_by'] = " ORDER BY {$field} {$order}";
        $this->sql['order_by'][] = "{$field} {$order}";

        return $this;
    }
	
	public function orderByRand()
    {
       // $this->sql['order_by'] = " ORDER BY {$field} {$order}";
        $this->sql['order_by_rand'] = " ORDER BY rand()";

        return $this;
    }
	
	public function groupBy($field)
    {
        $this->sql['group_by'] = " GROUP BY {$field} ";

        return $this;
    }

    /**
     * @param $number
     * @return $this
     */
    public function limit($number)
    {
        $this->sql['limit'] = " LIMIT {$number}";

        return $this;
    }
	
	public function offset($number)
    {
        $this->sql['offset'] = " OFFSET {$number}";

        return $this;
    }

	public function joinTable($table, $fields)
    {
        $this->sql['join'][] = " JOIN {$table} ON {$fields}";

        return $this;
    }
	
	public function joinLeftTable($table, $fields)
    {
        $this->sql['joinleft'][] = " LEFT JOIN {$table} ON {$fields}";

        return $this;
    }
    /**
     * @param $table
     * @return $this
     */
    public function update($table)
    {
        $this->reset();
        $this->sql['update'] = "UPDATE {$table} ";

        return $this;
    }

    public function insert($table)
    {
        $this->reset();
        $this->sql['insert'] = "INSERT INTO {$table} ";

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function set($data = [])
    {
        $this->sql['set'] = " SET ";

        if(!empty($data)) {
            foreach ($data as $key => $value) {
                $this->sql['set'] .= "{$key} = ?, ";
               /* if (next($data)) {
                    $this->sql['set'] .= ", ";
                }*/
				
                $this->values[]    = $value;
            }
			 $this->sql['set'] = substr($this->sql['set'], 0, -2)." ";
        }

        return $this;
    }
///// Создание индекса
	
	public function createIndex($name, $table, $fields)
    {
        $this->sql['createIndex'][] = "CREATE INDEX ".$name." ON ".$table." (".$fields.")";

           return $this;
    }

///// Удаление индекса
	
	public function dropIndex($name, $table)
    {
        $this->sql['dropIndex'][] = "DROP INDEX ".$name." ON ".$table;

           return $this;
    }
/****************  WHERE условие в скобках OR  
 * пример:
 * $sql = $this->queryBuilder->blockWhere('reestr_object.del_e = 1 OR reestr_object.elektro_is IS NULL OR reestr_object.elektro_is = 0');
 * */	
	public function blockWhere($value)
    {
		$this->sql['blockWhere'][] = "( {$value} )";
      //  $this->values[] = $value;

        return $this;
	}

	public function union_all($value)
    {
		$this->sql['union_all'][] = " {$value} ";
      //  $this->values[] = $value;

        return $this;
	}


	public function blockWhereOr($value)
    {
		$this->sql['blockWhereOr'][] = "( {$value} )";
      //  $this->values[] = $value;

        return $this;
	}	
/*	public function blockWhereOr($column, $value, $operator = '=')
    {
		$this->sql['blockWhereOr'][] = "{$column} {$operator} ?";
        $this->values[] = $value;

        return $this;
	}
	
	public function blockWhereEnd($column, $value, $operator = '=')
    {
		$this->sql['blockWhereEnd'][] = "{$column} {$operator} ?";
        $this->values[] = $value;

        return $this;
	}*/
/*********************************************************/
    /**
     * @return string
     */
    public function sql()
    {
		
        $sql = '';
		$isWhere = 0; // признак для блока where чтобы определить, указана ли директива where или нет

        if(!empty($this->sql)) {
            foreach ($this->sql as $key => $value) {
                if ($key == 'where') {
                    $sql .= ' WHERE ';
					$isWhere = 1;
                    foreach ($value as $where) {
                        $sql .= $where;
                        if (count($value) > 1 and next($value)) {
							
								$sql .= ' AND ';
							
                        }
                    }
                }else if($key == 'whereif'){ 
					$sql .= ' WHERE ';
					$isWhere = 1;
                    foreach ($value as $where) {
                        $sql .= $where;
                        if (count($value) > 1 and next($value)) {
							
								$sql .= ' AND ';
							
                        }
                    }
				}else if($key == 'createIndex'){ 
					
			
                    foreach ($value as $createIndex) {
                        $sql .= $createIndex;
                        if (count($value) > 1 and next($value)) {
							
								$sql .= ';';
							
                        }
                    }
				}else if($key == 'dropIndex'){ 
					
			
                    foreach ($value as $dropIndex) {
                        $sql .= $dropIndex;
                        if (count($value) > 1 and next($value)) {
							
								$sql .= ';';
							
                        }
                    }
				}else if($key == 'orwhere'){
					foreach ($value as $where) {
                        $sql .=' OR '.$where;
                       
                    }
                }else if($key == 'blockWhere'){
					
					if($isWhere == 0){
						$sql .= ' WHERE ';
					}else{
						$sql .= ' AND ';
					}
					
					foreach ($value as $where) {
						
						$sql .= $where;
                        if (count($value) > 1 and next($value)) {
							
								$sql .= ' AND ';
							
                        }
                       
                    }
					
				}else if($key == 'union_all'){
	
					foreach ($value as $union_all) {
						$sql .= ' UNION ALL ';
						$sql .= $union_all;
                       /* if (count($value) > 1 and next($value)) {*/
							
								
							
                       /* }*/
                       
                    }
					
				}else if($key == 'blockWhereOr'){
					
					
					
					foreach ($value as $where) {
                        $sql .=' OR '.$where;
                       
                    }	
				} else if($key == 'join'){
				
					foreach ($value as $join) {
                        $sql .= $join;
					} 
                }else if($key == 'joinleft'){
					
					foreach ($value as $join) {
                        $sql .= $join;
                        
                    }	
				} else if($key == 'order_by'){
					$sql .= ' ORDER BY ';
					foreach ($value as $order) {
                        $sql .= $order;
						
						if (count($value) > 1 and next($value)) {
							
								$sql .= ', ';
							
                        }
                        
                    }	
				}else {
                    $sql .= $value;
                }
            }
        }
//echo $sql.'<br/>';

        return $sql;
    }

    /**
     * Reset Builder
     */
    public function reset()
    {
        $this->sql    = [];
        $this->values = [];
    }
}