<?php

namespace Reporting\Format;

interface FormatterInterface
{
    public function format(\Reporting\Report $report) : string;
}