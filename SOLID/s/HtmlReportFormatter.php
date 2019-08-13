<?php

require_once('ReportFormatterInterface.php');
require_once('Report.php');


class HtmlReportFormatter implements ReportFormatterInterface
{
    public function format(Report $report)
    {
        
        $content = $report->getContents();
        $title = $content['title'];
        $date = $content['date'];

        return "<p><h2>$title</h2><em>$date</em></p>";

        
    }

}
