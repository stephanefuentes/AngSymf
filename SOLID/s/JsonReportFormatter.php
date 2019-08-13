<?php

//require_once('ReportFormatterInterface.php');

class JsonReportFormatter implements ReportFormatterInterface
{
    public function format(Report $report)
    {
        $content = $report->getContents();

        return '<p>'.json_encode($content).'</p>';
    }

}