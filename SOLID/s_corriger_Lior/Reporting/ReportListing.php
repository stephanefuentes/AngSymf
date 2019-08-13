<?php

namespace Reporting;

class ReportListing
{
    protected $formatters = [];

    public function addFormatter(\Reporting\Format\FormatterInterface $formatter)
    {
        $this->formatters[] = $formatter;

        return $this;
    }

    public function process(Report $report)
    {
        foreach ($this->formatters as $formatter) {
            echo $formatter->format($report);
            echo "<hr>";
        }
    }
}