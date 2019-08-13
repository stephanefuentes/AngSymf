<?php

//use QueryBuilder\coco\QueryBuilder;
//('coco\QueryBuilder.php');
require_once('QueryBuilder.php');
use coco\QueryBuilder;

$query = new QueryBuilder();

$query->select('a.title, a.author')
->andWhere('a.author = :author')
->andWhere('a.role = " admin "')
->from('article', 'a')
->orderBy('a.id ASC');

var_dump($query->getSql());
// devrait donner :  SELECT a.title, a.author FROM article AS a WHERE a.author = :author AND a.role = " admin " ORDER BY a.id ASC