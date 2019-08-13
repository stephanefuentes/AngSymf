<?php

namespace Reporting\Format;

class HtmlFormatter implements FormatterInterface
{
    public function format(\Reporting\Report $report) : string
    {
        $content = $report->getContents();
        $title = $content['title'];
        $date = $content['date'];

        return "<h2>$title</h2><em>$date</em>";
        //return "<h2>$this->title</h2><em>$this->date</em>";
    }

}