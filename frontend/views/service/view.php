<?php

use frontend\components\ServicesWidget;
use frontend\components\SocialsWidget;

; ?>
<?php if (isset($service) && !empty($service)): ; ?>
    <section class="section_top">
        <div class="section_top_page">
            <img class="parallax"
                 src="<?php echo (!empty($service->attachment_url)) ? $service->attachment_url : ''; ?>" alt="">
            <div class="title_page">
                <h5 class="title_block">Уголовное право</h5>
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

    <main class="main_section animation">
        <svg class="main_section_top" viewBox="0 0 1130 5000">
            <path d="M 1128 0  L 1128 113 L 2 113 L 2 5000"/>
        </svg>
        <div class="main_section_content" itemscope itemtype="http://schema.org/Service">
            <div class="main_section_text column">
                <aside class="aside_main">
                    <div class="about_list">
                        <p class="about_list_title">
                            <?php echo Yii::t('main', 'Услуги') ?></p>
                        <?php try {
                            echo ServicesWidget::widget();
                        } catch (Exception $e) {
                        } ?>

                    </div>

                </aside>

                <h1 itemprop="serviceType"><?php echo (!empty($service->heading)) ? $service->heading : ''; ?></h1>
                <?php echo (!empty($service->content)) ? $service->content : ''; ?>

            </div>
        </div>
        <img class="shape_left" src="/img/shape-left.png" alt="">
        <img class="shape_right" src="/img/shape-right.png" alt="">
    </main>
<?php endif; ?>
<?php $lang = \common\models\Lang::getCurrent()->url; ?>
<?php switch ($lang) {
    case 'ru':
        echo $this->render('../template_part/ru/_quotes');
        break;
    case 'uk':
        echo $this->render('../template_part/uk/_quotes');
        break;
    case 'en':
        echo $this->render('../template_part/en/_quotes');
}; ?>
