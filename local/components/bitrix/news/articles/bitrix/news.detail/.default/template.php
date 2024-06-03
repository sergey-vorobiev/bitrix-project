<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$tags = [];

if (isset($arResult['PROPERTIES']['OTHER_ARTICLES']['VALUE']) && count($arResult['PROPERTIES']['OTHER_ARTICLES']['VALUE'])) {
	$arSelect = array("ID", "NAME", "DETAIL_PAGE_URL");
	$arFilter = array("IBLOCK_ID" => IBLOCK_ARTICLE_ID, "ID" => $arResult['PROPERTIES']['OTHER_ARTICLES']['VALUE']);
	$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

	while ($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();

		$tags[$arFields['ID']] = [
			'NAME' => $arFields['NAME'],
			'DETAIL_PAGE_URL' => $arFields['DETAIL_PAGE_URL'],
		];
	}
}
?>

<div class="section-breadcrumbs section-breadcrumbs--article">
	<div class="container">
		<div class="breadcrumbs" style="background-image: url(<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>)">
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"breadcrumbs-article",
				array(
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "s1",
				),
				false
			);
			?>
		</div>
	</div>
</div>

<div class="section-article-detail">
	<div class="container">
		<div class="article-detail">
			<div class="article-detail-content typography">
				<?= $arResult['DETAIL_TEXT'] ?>

				<script async src="https://usocial.pro/usocial/usocial.js?uid=e1458b9c7af75875&v=6.1.5" data-script="usocial" charset="utf-8"></script>
				<div class="uSocial-Share" data-pid="5f70c5079f98d50c8f33942a764bed09" data-type="share" data-options="round-rect,style1,default,absolute,horizontal,size32,eachCounter0,counter0,mobile_position_right" data-social="telegram,wa,ok,vk"></div>
			</div>

			<? if (count($tags)) : ?>
				<div class="article-detail-other">
					<h2 class="article-detail-other__title">Похожие статьи:</h2>

					<div class="article-detail-other__list">
						<? foreach ($tags as $tag) : ?>
							<a href="<?= $tag['DETAIL_PAGE_URL'] ?>"><?= $tag['NAME'] ?></a>
						<? endforeach; ?>
					</div>
				</div>
			<? endif; ?>
		</div>
	</div>
</div>