<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<div class="section-slider">
    <div class="container">
        <div class="slider">
            <div class="slider-carousel">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$mobileUrl = null;
					if (!empty($arItem['PROPERTIES']['MOBILE_IMAGE']['VALUE'])) {

                        $mobileUrl = CFile::ResizeImageGet($arItem['PROPERTIES']['MOBILE_IMAGE']['VALUE'], ['width' => 446, 'height' => 276]);
						// $mobileUrl = CFile::GetPath($arItem['PROPERTIES']['MOBILE_IMAGE']['VALUE']);
					}

                    $desktop = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], ['width' => 1392, 'height' => 387]);
					?>

					<div class="slider__item">
						<picture>
							<?if ($mobileUrl):?>
								<source srcset="<?= $mobileUrl['src']?>" media="(max-width: 767px)" width="<?= 446?>" height="<?= 276?>">
							<?endif;?>
							<img src="<?= $desktop['src'];?>" <?/*loading="lazy"*/?> width="<?= $arItem["PREVIEW_PICTURE"]['WIDTH']?>" height="<?= $arItem["PREVIEW_PICTURE"]['HEIGHT']?>" alt="">
						</picture>
					</div>
				<?endforeach;?>
            </div>

            <div class="slider__prev">
                <svg>
                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/images/iconpack.svg#icon-arrow-left"></use>
                </svg>
            </div>

            <div class="slider__next">
                <svg>
                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/images/iconpack.svg#icon-arrow-right"></use>
                </svg>
            </div>
        </div>
    </div>
</div>