<?php
require __DIR__ . '/vendor/autoload.php';

use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;

$file = dirname(__DIR__) . '/index.html';
$html = file_get_contents($file);
$lead = substr($html, 0, strpos($html, '<div class="container">'));
$tail = substr($html, strpos($html, '</footer>') + 9);
$html = $lead . file_get_contents(__DIR__ . '/front.html') . $tail;


$environment = Environment::createCommonMarkEnvironment();
$converter = new Converter(
    new DocParser($environment),
    new HtmlRenderer($environment)
);

$examples = $converter->convertToHtml(
	file_get_contents(__DIR__ . '/front.md'),
);

$html = str_replace(
	'{{FRONT}}',
	$examples,
	$html
);

file_put_contents($file, $html);
