<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?$APPLICATION->ShowTitle()?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
	
	<?$APPLICATION->ShowHead();?>
</head>
<body>
		<div id="panel"><?$APPLICATION->ShowPanel();?></div>	
		<div id="page-wrapper">
					
				<div id="workarea">
					<div id="workarea-inner">
						<h5><?$APPLICATION->ShowTitle(false);?></h5> 

						