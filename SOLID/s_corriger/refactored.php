<?php

/**
 * 1. Le rapport ne doit plus avoir la responsabilité du formatage et doit se concentrer uniquement sur la manipulation
 *    de son contenu (bonne pratique S de S.O.L.I.D).
 *
 * 2. Chaque méthode de formatage est déplacée dans une classe spécialisée pour chaque format (HTML, JSON, etc.).
 *
 * 3. Création d'une interface définissant le contrat que chaque classe de formatage doit respecter.
 *
 * 4. Les classes de formatage reçoivent en argument une instance du rapport afin de pouvoir travailler, mais il vaut
 *    mieux dépendre d'une abstraction que d'une implémentation. Par conséquent, création d'une interface représentant
 *    le rapport (bonne pratique D de S.O.L.I.D).
 *
 * 5. L'exemple de code client s'occupe désormais d'instancier les classes nécessaires.
 */




interface IReport
{
    public function getContents();
    public function getStatistics();
    public function setTitle($title);
}


interface IReportFormatter
{
    public function format(IReport $report);
}



class Report implements IReport
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


class HtmlReportFormatter implements IReportFormatter
{
    public function format(IReport $report)
    {
        $contents = $report->getContents();

        return '<h2>'.$contents['title'].'</h2><em>'.$contents['date'].'</em>';
    }
}


class JsonReportFormatter implements IReportFormatter
{
    public function format(IReport $report)
    {
        return json_encode($report->getContents());
    }
}




// (...) EXEMPLE DE CODE CLIENT

$report = new Report('2016-04-21', 'Titre de mon rapport');

$htmlReport = new HtmlReportFormatter();
$jsonReport = new JsonReportFormatter();

echo $htmlReport->format($report);
echo '<hr>';
echo $jsonReport->format($report);