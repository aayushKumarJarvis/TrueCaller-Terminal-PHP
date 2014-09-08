<?php

include_once 'RequestBuilder.php';
include_once 'simple_html_dom.php';

$commandLineArguement = $argv[1];

$htmlPage = constructRequest($commandLineArguement);

echo strip_tags($htmlPage);







