<?php

interface ReportInterface
{
    public function getContents();
    
    public function getStatistics();

    public function setTitle(string $title);
}