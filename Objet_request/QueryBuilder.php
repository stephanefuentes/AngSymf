<?php

class QueryBuilder
{

    private $select = "";
    private $from = "";
    private $orderBy = "";
    private $where = array();


    public function getSql()
    {
        $where = implode(' AND ', $this->where);
        return 'SELECT ' . $this->select . ' FROM ' . $this->from . ' WHERE ' . $where . ' ORDER BY ' . $this->orderBy;

    }


    public function select($select)
    {
        $this->select = $select;

        return $this;

    }

    public function andWhere($where)
    {
        $this->where[] = $where;

        return $this;

    }

    public function from($table, $alias)
    {
        $this->from = $table . ' AS ' . $alias;

        return $this;

    }

    public function orderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;

    }



}
/*
$query->select('a.title, a.author')
    ->andWhere('a.author = :author')
    ->andWhere('a.role = " admin "')
    ->from('article', 'a')
    ->orderBy('a.id ASC');

var_dump($query->getSql());*/
// devrait donner :  SELECT a.title, a.author FROM article AS a WHERE a.author = :author AND a.role = " admin " ORDER BY a.id ASC