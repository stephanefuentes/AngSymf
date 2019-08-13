<?php

interface ReportFormatterInterface
{
    public function format(Report $report);
}