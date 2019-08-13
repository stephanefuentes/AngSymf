<?php


namespace Reporting\Format;

class CsvFormatter implements FormatterInterface
{
    public function format(\Reporting\Report $report) : string
    {
        $content = $report->getContents();
        return implode(";", $content);
    }
}