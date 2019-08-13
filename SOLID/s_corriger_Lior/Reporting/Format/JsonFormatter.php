<?php

namespace Reporting\Format;

class JsonFormatter implements FormatterInterface
{
    public function format(\Reporting\Report $report) : string
    {
        $content = $report->getContents();
        return json_encode($content);
    }
}