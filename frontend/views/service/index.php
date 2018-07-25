<?php

use frontend\components\PageHelper;
use frontend\components\SocialsWidget;
use yii\helpers\Url;

?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/practic_bg.png" alt="">
        <div class="title_page">
            <h5 class="title_block"><?php echo Yii::t('main', 'SERVICES') ?> </h5>
            <span class="title_page_line"></span>
        </div>
        <span class="bg_page"></span>
    </div>
    <div class="button_set">
        <?php try {
            echo SocialsWidget::widget();
        } catch (Exception $e) {
        } ?>
    </div>
</section>
<div class="practice animation" itemscope itemtype="http://schema.org/Service">
    <div class="container">
        <svg class="practice_top_right" viewBox="0 0 943 566">
            <path d="M 0 -3 L 943 -3 L 943 569 L 0 569  z"/>
        </svg>
        <svg class="practice_top_left" viewBox="0 0 943 566">
            <path d="M 0 -3 L 943 -3 L 943 569 L 0 569  z"/>
        </svg>
        <h3 class="title_block" itemprop="serviceType">Our Practice</h3>
        <?php if ($services): ; ?>
            <div class="practice_content" itemprop="hasOfferCatalog" itemscope
                 itemtype="http://schema.org/OfferCatalog">
                <div class="practice_content_left">
                    <?php foreach ($services as $key => $service): ; ?>
                        <?php if ($key > 3) {
                            break;
                        }; ?>
                        <?php if (!empty($service)): ; ?>
                            <div class="practice_card">
                                <?php if (!empty($service['thumbnailUrl'])): ; ?>
                                    <img src="<?php echo $service['thumbnailUrl']; ?>" alt="">
                                <?php endif; ?>
                                <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                                     itemtype="http://schema.org/OfferCatalog">
                                    <a href="<?php echo Url::to(
                                        ['page/gate', 'slug' => $service['slug'], 'parentSlug' => PageHelper::pageSlug('services')]
                                    ); ?>" itemprop="url"></a>
                                    <h4 class="practice_card_title"
                                        itemprop="name"><?php echo !empty($service['name']) ? $service['name'] : ''; ?></h4>
                                    <span class="practice_card_line"></span>
                                    <p class="practice_card_text" itemprop="itemListElement" itemscope
                                       itemtype="http://schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                                itemtype="http://schema.org/Service"><span
                                                    itemprop="name">
                                    <?php echo !empty($service['excerpt']) ? $service['excerpt'] : ''; ?>
                                </span></span></p>
                                    <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                                    <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="practice_content_right vertically">
                    <?php foreach ($services as $key => $service): ; ?>
                        <?php if ($key < 3) {
                            continue;
                        }; ?>
                        <?php if (!empty($service)): ; ?>
                            <div class="practice_card">
                                <?php if (!empty($service['thumbnailUrl'])): ; ?>
                                    <img src="<?php echo $service['thumbnailUrl']; ?>" alt="">
                                <?php endif; ?>
                                <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                                     itemtype="http://schema.org/OfferCatalog">
                                    <a href="
<?php echo Url::to(['page/gate', 'slug' => $service['slug'], 'parentSlug' => PageHelper::pageSlug('services')]
                                    ); ?>" itemprop="url"></a>
                                    <h4 class="practice_card_title"
                                        itemprop="name"><?php echo !empty($service['name']) ? $service['name'] : ''; ?></h4>
                                    <span class="practice_card_line"></span>
                                    <p class="practice_card_text" itemprop="itemListElement" itemscope
                                       itemtype="http://schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                                itemtype="http://schema.org/Service"><span
                                                    itemprop="name">
                                                <?php echo !empty($service['excerpt']) ? $service['excerpt'] : ''; ?>
                                            </span></span>
                                    </p>
                                    <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                                    <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="bg_logo_block">
        <img src="/img/logo_bg.png" alt="">
    </div>
</div>
