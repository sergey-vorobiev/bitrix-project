<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (count($arResult["ITEMS"])) : ?>
    <div class="section-last-articles">
        <div class="container">
            <div class="last-articles">
                <h2 class="block-title">Последние статьи</h2>

                <div class="last-articles-wrapper">
                    <?
                    foreach ($arResult["ITEMS"] as $item) {
                        include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/parts/article-item.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>