<?php

interface IItem
{
    public function setPrice($price);
}


interface ISalesService
{
    public function applyDiscount($discount);
    public function applyPromotionalCode($code);
}


interface IFabricItem extends IItem
{
    public function setColor($color);
}


interface IReadableItem extends IItem
{
    public function setPreviewPages($pdf);
}



class Book implements IReadableItem
{
    private $pdf;

    private $price;


    public function setPreviewPages($pdf)
    {
        $this->pdf = $pdf;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}


class TShirt implements IFabricItem, ISalesService
{
    private $code;

    private $color;

    private $discount;

    private $price;


    public function applyDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function applyPromotionalCode($code)
    {
        $this->code = $code;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}

class Bag implements IFabricItem
{
    private $color;

    private $price;


    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}




// (...) CODE CLIENT

$items = [ new Book(), new TShirt() ];

foreach($items as $item)
{
    echo '<h1>Nouveau produit : '.get_class($item).'</h1>';

    if($item instanceof ISalesService)
    {
        $item->applyDiscount(1.6);
        $item->applyPromotionalCode('XMAS2017');
    }

    if($item instanceof IFabricItem)
    {
        $item->setColor('red');
    }

    if($item instanceof IReadableItem)
    {
        $item->setPreviewPages('/files/preview.pdf');
    }

    $item->setPrice(18.25);
}