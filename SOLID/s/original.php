<?php

require_once('Report.php');
require_once('HtmlReportFormatter.php');
require_once('JsonReportFormatter.php');
require_once('ReportFormatterInterface.php');
/*
class Report
{
    private $date;

    private $title;


    public function __construct($date, $title)
    {
        $this->date  = $date;
        $this->title = $title;
    }

    public function formatToHTML()
    {
        return "<h2>$this->title</h2><em>$this->date</em>";
    }

    public function formatToJSON()
    {
        return json_encode($this->getContents());
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

*/


// (...) EXEMPLE DE CODE CLIENT

$report = new Report('2016-04-21', 'Titre de mon rapport');
$html = new HtmlReportFormatter();
$json = new JsonReportFormatter();

echo $html->format($report);
echo $json->format($report);

/*
echo $report->formatToHTML();
echo '<hr>';
echo $report->formatToJSON();*/


