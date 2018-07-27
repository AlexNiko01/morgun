<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\components\WLang;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use \frontend\components\MenuWidget;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122307379-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-122307379-1');
    </script>
</head>
<body itemscope="" itemtype="http://schema.org/WebPage">
<?php $this->beginBody() ?>
<header class="header_main" itemscope="" itemtype="http://schema.org/WPHeader">
    <div class="header_main_top">
        <div class="header_main_wrap">
            <div class="top_contact">
                <span class="top_contact_bg"></span>
                <span class="top_contact_text">
<?php echo Yii::t('main', 'Позвоните нам сейчас'); ?>
                </span><a href="tel:+0979811118"><i
                            class="icon-phone"></i>(097) 981-11-18</a>
            </div>
        </div>
    </div>
    <div class="header_main_bottom">
        <div class="container">
            <div class="btn_nav btn_nav_open">
                <i></i><i></i><i></i>
                <p class="btn_nav_text"><span>
<?php echo Yii::t('main', 'Меню'); ?>
</span></p>
            </div>
            <a href="/" class="logo">
                <img src="/img/logo-black.svg" alt="morgun_and_partners_logo">
            </a>
            <?php try {
                echo WLang::widget();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }; ?>
            <nav class="nav_main" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                <ul class="list_page">
                    <?php try {
                        echo MenuWidget::widget();
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }; ?>
                    <span class="scroll_nav"><i></i></span>
                </ul>
            </nav>
        </div>
    </div>
</header>
<?= $content ?>
<div class="footer_address animation">
    <img class="parallax" src="/img/address_bg.jpg" alt="">
    <div class="address_content">
        <div class="container">
            <svg class="address_line_left" viewBox="0 0 362 4">
                <path d="M 0 1  L 362 1"/>
            </svg>
            <svg class="address_line_right" viewBox="0 0 362 4">
                <path d="M 362 1 L 0 1"/>
            </svg>
            <h4 class="address_title"><?php echo Yii::t('main', 'Адвокатская фирма "Моргун и партнёры"'); ?></h4>
            <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span
                        itemprop="streetAddress"><?php echo Yii::t('main', 'ул. Евгения Коновальца 3, офис 29 Б'); ?></span>,<br>
                <span
                        itemprop="postalCode">03150</span><span
                        itemprop="addressLocality"><?php echo Yii::t('main', 'Киев, Украина') ?></span></address>
            <div class="address_phone">
                <a href="tel:+380979811118"><i class="icon-phone"></i>+38 (097) 981-11-18</a>
                <a href="mailto:help@morgun.ua"><i class="icon-mail"></i>help@morgun.ua</a>
            </div>
            <div class="social_block">
                <a href="#">
                    <svg class="facebook" viewBox="0 0 96.124 96.123" xml:space="preserve">
	<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
		c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
		c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
		c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
    </svg>
                </a>
                <a href="#">
                    <svg class="linkedin" viewBox="0 0 430.117 430.117" xml:space="preserve">
	<path id="LinkedIn" d="M430.117,261.543V420.56h-92.188V272.193c0-37.271-13.334-62.707-46.703-62.707
		c-25.473,0-40.632,17.142-47.301,33.724c-2.432,5.928-3.058,14.179-3.058,22.477V420.56h-92.219c0,0,1.242-251.285,0-277.32h92.21
		v39.309c-0.187,0.294-0.43,0.611-0.606,0.896h0.606v-0.896c12.251-18.869,34.13-45.824,83.102-45.824
		C384.633,136.724,430.117,176.361,430.117,261.543z M52.183,9.558C20.635,9.558,0,30.251,0,57.463
		c0,26.619,20.038,47.94,50.959,47.94h0.616c32.159,0,52.159-21.317,52.159-47.94C103.128,30.251,83.734,9.558,52.183,9.558z
		 M5.477,420.56h92.184v-277.32H5.477V420.56z"/>
    </svg>
                </a>
            </div>
            <svg class="address_bottom_left" viewBox="0 0 1030 195">
                <path d="M 2 0  L 2 193 L 1030 193"/>
            </svg>
            <svg class="address_top_right" viewBox="0 0 1030 195">
                <path d="M 1028 195  L 1028 2 L 0 2"/>
            </svg>

        </div>
    </div>

</div>

<footer class="footer_main">
    <div class="footer_map">
        <div id="map"></div>
    </div>
    <div class="footer_certificate">
        <div class="certificate_wrap">
            <div>
                <img src="/img/certificate1.png" alt="">
            </div>
            <div>
                <img src="/img/certificate2.png" alt="">
            </div>
            <div>
                <img src="/img/certificate3.png" alt="">
            </div>
            <div>
                <img src="/img/europe_lawyers_logo.jpg" alt="">
            </div>
            <div>
                <img src="/img/certificate4.png" alt="">
            </div>
            <div>
                <img src="/img/certificate3.png" alt="">
            </div>
            <div>
                <img src="/img/certificate4.png" alt="">
            </div>
            <div>
                <img src="/img/certificate1.png" alt="">
            </div>
            <div>
                <img src="/img/certificate2.png" alt="">
            </div>
        </div>
    </div>
    <div class="site_map">
        <span>&#169 <span class="site_map_year">2016</span> Morgun.ua All rights reserved</span>
        <a href="#">Disclaimer</a>
        <a href="#">Site Map</a>
    </div>
    <div class="success">
        <p><?php echo Yii::t('main', '*Рейтинг основан на проценте выигранных дел по отношению ко всем остальным делам в которых принимал участие
            адвокат'); ?></p>
    </div>

</footer>
<div class="feed_back_popup">
    <span class="close_feedback"><i></i><i></i></span>
    <h6 class="feed_back_title"><?php echo Yii::t('main', 'Закажите вашу приватную консультацию'); ?></h6>
    <form class="feedback">
        <input type="text" name="name" placeholder="Ваше имя"
               pattern="^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$" required>
        <input type="email" name="email" placeholder="Ваш e-mail" required>
        <input type="tel" name="phone" placeholder="Ваш телефон" required>
        <label for="text" class="text_label"><?php echo Yii::t('main', 'Ваше сообщение'); ?></label>
        <textarea name="text" id="" cols="30" rows="10" maxlength="400"></textarea>
        <button class="btn" type="submit"><span><?php echo Yii::t('main', 'ОТПРАВИТЬ'); ?></span><i></i></button>
    </form>
</div>
<div class="main_popup_bg"></div>
<div class="menu_popup_bg"></div>
<div class="send_successful">
    <div class="send_successful_wrap">
        <i class="send_successful_close"></i>
        <p class="send_successful_text"><?php echo Yii::t('main', 'Ваши данные успешно отправлены!'); ?></p>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
