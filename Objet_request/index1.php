<?php

require_once('QueryBuilder.php');

$query = new QueryBuilder();

$query->select('a.title, a.author');

$query->select('a.title, a.author')
    ->andWhere('a.author = :author')
    ->andWhere('a.role = "admin"')
    ->from('article', 'a')
    ->orderBy('a.id ASC');

var_dump($query->getSql());
// devrait donner :  SELECT a.title, a.author FROM article AS a WHERE a.author = :author AND a.role = "admin" ORDER BY a.id ASC



//  Correction


/*

 * @return string
 * /
    public function getSql() : string
{
    $sql = "SELECT  $this->select";
    $sql .= " FROM  $this->from";
    if ($this->where) {
        $where = implode(" AND ", $this->where);
        $sql .= " WHERE $where";
    }
    if ($this->orderBy) {
        $sql .= " ORDER BY $this->orderBy";
    }
    return $sql;
}
}

$query = new QueryBuilder();

$query->select('a.title, a.author')
    ->andWhere('a.author = :author')
    ->andWhere('a.role = "admin"')
    ->from('article', 'a')
    ->orderBy('a.id ASC');

var_dump($query->getSql());
// devrait donner :  SELECT a.title, a.author FROM article AS a WHERE a.author = :author AND a.role = "admin" ORDER BY a.id ASC*/