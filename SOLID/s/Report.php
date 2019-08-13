<?php

require_once('ReportInterface.php');


class Report implements ReportInterface
{
    private $date;

    private $title;


    public function __construct($date, $title)
    {
        $this->date  = $date;
        $this->title = $title;
    }


    public function getContents()
    {
        return
        [
            'date'  => $this->date,
            'title' => $this->title
        ];
    }

    public function getStatistics()
    {
        // Génère des statistiques sur le contenu du rapport.
        return
        [
            'pages' => 5,
            'words' => 1236
        ];
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }


}