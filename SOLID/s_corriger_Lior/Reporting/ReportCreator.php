<?php

namespace Reporting;

//use Reporting\Format\HtmlFormatter;
use Reporting\Format\FormatterInterface;


class ReportCreator
{

    protected $report;
    protected $formatter;

    public function __construct(Report $report, FormatterInterface $formatter)
    {
        $this->report = $report;
        $this->formatter = $formatter;
    }

    public function process()
    {
        return $this->formatter->format($this->report);
    }

}