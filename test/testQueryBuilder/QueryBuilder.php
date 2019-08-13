<?php

namespace coco;




class QueryBuilder
{

    private $select;
    private $swhere = [];
    private $from;
    private $orderBy;


    public function select($select)
    {
        $this->select =  $select;

        return $this;
    }

    public function andWhere($where)
    {
        $this->where[] = $where;

        return $this;
    }

    public function from($table, $alias)
    {
        $this->from = $table.' AS '. $alias;

        return $this;
    }

    public function orderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }


    public function getSql()
    {
        

        $where = implode(' AND ', $this->where);

        return 'SELECT ' . $this->select . ' FROM ' . $this->from  . ' WHERE ' . $where . ' ORDER BY ' . $this->orderBy;
    }

}


