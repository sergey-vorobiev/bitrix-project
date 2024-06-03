<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "breadcrumbs",
    array(
        "START_FROM" => "0",
        "PATH" => "",
        "SITE_ID" => "s1",
    ),
    false
);
?>

<div class="section-articles-list">
	<div class="container">
		<div class="articles-list">
			<div class="articles-list-wrapper">
				<? 
				foreach ($arResult["ITEMS"] as $item) {
					include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/parts/article-item.php');
				}
				?>
			</div>

			<?= $arResult["NAV_STRING"] ?>
		</div>
	</div>
</div>