<?php


spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
    require_once($className . ".php");
});

use Reporting\Report;
use Reporting\Format\HtmlFormatter;
use Reporting\Format\CsvFormatter;
use Reporting\Format\JsonFormatter;
use Reporting\ReportListing;
use Reporting\ReportCreator;

// (...) EXEMPLE DE CODE CLIENT

$report = new Report("2019-01-05", "Mon second rapport");
$jsonFormatter = new JsonFormatter();
$htmlFormatter = new HtmlFormatter();

$reportCreator = new ReportCreator($report, $htmlFormatter);
echo $reportCreator->process();



// $report = new Report('2016-04-21', 'Titre de mon rapport');

// $htmlFormatter = new HtmlFormatter();
// $jsonFormatter = new JsonFormatter();
// $csvFormatter = new CsvFormatter();

// $reportListing = new ReportListing();

// // Fluent

// $reportListing->addFormatter($htmlFormatter)
//     ->addFormatter($csvFormatter)
//     ->addFormatter($jsonFormatter)
//     ->process($report);