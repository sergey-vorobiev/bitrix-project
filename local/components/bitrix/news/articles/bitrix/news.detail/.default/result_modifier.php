<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$baseUrl = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

// Article microdata
$microdata = [
	"@context" => "https://schema.org",
	"@type" => "Article",
	"headline" => $arResult['NAME'],
	"datePublished" => $arResult['ACTIVE_FROM'] . "T00:00:00Z",
	"dateModified" => $arResult['ACTIVE_FROM'] . "T10:00:00Z",
	"author" => [
		"@type" => "Person",
		"name" => "Наталья Иванова"
	],
	"publisher" => [
		"@type" => "Organization",
		"name" => "Futomaki",
		"logo" => [
			"@type" => "ImageObject",
			"url" => $baseUrl . '/bitrix/templates/Futomaki/images/logo.png'
		]
	],
	"image" => [
		"@type" => "ImageObject",
		"url" => $baseUrl . $arResult['DETAIL_PICTURE']['SRC'],
		"width" => $arResult['DETAIL_PICTURE']['WIDTH'],
		"height" => $arResult['DETAIL_PICTURE']['HEIGHT']
	],
	"description" => $arResult['PREVIEW_TEXT'],
	"mainEntityOfPage" => [
		"@type" => "WebPage",
		"@id" => $baseUrl . $arResult['DETAIL_PAGE_URL']
	]
];

$APPLICATION->AddHeadString('<script type="application/ld+json">' . json_encode($microdata) . '</script>', true);

// Breadcrumbs microdata
$microdata = [
	'@context' => 'https://schema.org',
	'@type' => 'BreadcrumbList',
	'itemListElement' => [
		[
			'@type' => 'ListItem',
			'position' => 1,
			'name' => 'Главная',
			'item' => $baseUrl . '/',
		],
		[
			'@type' => 'ListItem',
			'position' => 2,
			'name' => 'Статьи',
			'item' => $baseUrl . '/articles/',
		],
		[
			'@type' => 'ListItem',
			'position' => 3,
			'name' => $arResult['NAME'],
			'item' => $baseUrl . $arResult['DETAIL_PAGE_URL'],
		]
	]
];

$APPLICATION->AddHeadString('<script type="application/ld+json">' . json_encode($microdata) . '</script>', true);