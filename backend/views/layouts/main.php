<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use backend\components\AdminMenuWidget;
use common\components\WLang;
use yii\helpers\Html;


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
    </head>
    <body>
    <?php $this->beginBody() ?>

    <header class="header_main">
        <div class="container">
            <div class="header_left" id="menu_wrap">
                <div class="btn_nav">
                    <i></i>
                </div>
                <p class="btn_nav_title">Меню</p>
                <nav class="nav">
                    <i class="close_nav icon_close"></i>
                    <div class="nav_wrap">
                        <ul class="nav_list">
                            <?php
                            try {
                                echo AdminMenuWidget::widget(['tpl' => 'menu']);
                            } catch (\Exception $e) {
                                echo $e->getMessage();
                            }; ?>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="header_right">
                <!--            <div class="user_notice">-->
                <!--                <a href="#" class="fa fa-bell"></a>-->
                <!--                <span class="user_notice_count">2</span>-->
                <!--            </div>-->
                <div class="user_data">
                    <div class="user_data_logo">
                        <?= Html::img('@web/img/user/logo-user.jpg', ['alt' => 'logo']) ?>
                    </div>
<!--                    <p class="user_data_name">--><?php //echo \Yii::$app->user->identity->getName(); ?><!--</p>-->
                </div>
                <div class="btn_user"></div>
                <div class="user_nav">
                    <a target="_blank" href="<?php echo Yii::$app->urlManagerFrontend->createUrl(['site/index']); ?>"
                       class="user_nav_elem">Перейти
                        на сайт</a>
                    <!--                <a href="#" class="user_nav_elem">Изменить данные</a>-->
                    <a href="#" class="user_nav_elem">Связаться с поддержкой</a>
                    <?php echo Html::beginForm(['/site/logout'], 'post'); ?>
                    <?php echo Html::submitButton(
                        'Выход<i class="fa fa-sign-out"></i>',
                        ['class' => 'user_nav_elem user_exit logout']
                    ); ?>
                    <?php echo Html::endForm(); ?>
                </div>
            </div>
        </div>

    </header>
    <div class="bg_close"></div>
    <div class="language_set">

    </div>
    <?= $content ?>

    <footer class="footer_main">
        <div class="container">
            <a href="#" class="logo">
                <svg version="1.1" id="Layer_1_copy_3" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     viewBox="0 0 92.2 83.1" style="enable-background:new 0 0 92.2 83.1;"
                     xml:space="preserve">
                        <ellipse id="XMLID_1334_" class="st0" cx="43.1" cy="31.2" rx="30.7" ry="31.2"/>
                    <path id="XMLID_1333_" class="st1" d="M59,59.8c0.4-0.5-4.6-23.9-4.9-29.2c-0.9-8.7-3-12-3-12c1.6-9.1,0.4-13-3.5-12.5
			s-1.1,9.4-1.1,9.4c-2.1-0.6-3.8-0.6-3.8-0.6s-3.5-12-6.1-9S39.2,16,39.2,16c-0.6,0.1-3.8,1.4-4.7,2.5c-0.4,0.5-0.6,1.4-0.6,1.4
			c-4.8,1.9-6.9,4.3-6.9,4.3s-0.9,1.1-0.5,2.1c0.5,1.1,0.4,1.2,0.4,1.2c-0.7,1.7,0,2.7,0,2.7c2.5,5.7,9.7,1.2,9.7,1.2
			c4,4.1,9.6,0.2,9.6,0.2c-3.4,4.8-7.8,2.8-7.8,2.8c0.8,5.7,0.6,12.3,0,18.8c-1.1,6.7,0.2,9.5,0.2,9.5S53.6,66.2,59,59.8z"
                    />
                    <path id="XMLID_1332_" class="st0" d="M39.1,23.7c0,0,0.8-1.6,2.6-1.5c1.7,0.1,1.6,1.3,3.7,1.1c0,0-0.1,0.9-1.2,1.2
			c-0.6,0.2-1.2,0.1-1.7-0.1c-0.2-0.1-0.6-0.2-1-0.5c-0.1-0.1-0.3-0.1-0.4-0.1C40.7,23.6,40,23.5,39.1,23.7z"/>
                    <path id="XMLID_1331_" class="st0"
                          d="M48.4,18.6c0,0,0.2-2.2-0.4-3.7c-0.5-1.5-1.2-5.9,0.5-5.6C50.1,9.5,51.6,16.3,48.4,18.6z"
                    />
                    <path id="XMLID_1330_" class="st0" d="M27.8,26.7c0,0,1.8-2.3,3.4-0.6C31.2,26,32,27.4,27.8,26.7z"/>
                    <g id="XMLID_1325_">
                        <path id="XMLID_24_" class="st0" d="M27.1,83.1V70.4h5.6v9.5h4.9v3.2H27.1z"/>
                    </g>
                    <g id="XMLID_232_">
                        <path id="XMLID_23_" class="st0"
                              d="M44.9,83.1h-5.6l4.4-12.7h8L56,83.1h-5.6L49.7,81h-4.1L44.9,83.1z M46.6,78h2.1l-1-3.1L46.6,78z"
                        />
                    </g>
                    <g id="XMLID_93_">
                        <path id="XMLID_22_" class="st0"
                              d="M58,83.1V70.4h5.4l2.3,2.6l2.3-2.6h5.4v12.7h-5.6v-6.3l-2.1,2.4l-2.1-2.4v6.3H58z"/>
                    </g>
                    <g id="XMLID_84_">
                        <path id="XMLID_21_" class="st0"
                              d="M81,83.1h-5.6l4.4-12.7h8l4.4,12.7h-5.6L85.9,81h-4.1L81,83.1z M82.8,78h2.1l-1-3.1L82.8,78z"
                        />
                    </g>
                    <g id="XMLID_79_">
                        <path id="XMLID_30_" class="st0" d="M0,83.1V70.4h5.6v12.7H0z"/>
                        <path id="XMLID_33_" class="st0" d="M7.2,76.1v-5.6h11.3v5.6h-2.8v7.1H10v-7.1H7.2z"/>
                    </g>
                    </svg>
            </a>
            <div class="footer_links">
                <a href="#">ПАРТНЕРСКИЙ СЕРВИС</a>
                <a href="#">ОНЛАЙН СЕРВИС</a>
                <a href="#" class="footer_links_btn">ПОЗВОНИТЬ</a>
            </div>
        </div>
    </footer>
    <?php
    $message = '';
    $session = Yii::$app->session;
    if ($session->has('success')) {
        $message = $session->getFlash('success');
    } elseif ($session->has('error')) {
        $message = $session->getFlash('error');
    };
    ?>

    <div class="popup_info <?php echo ($session->has('success') || $session->has('error')) ? 'active' : ''; ?>"
         id="popup_warning">
        <div class="popup_info_wrap">
            <i class="popup_info_close fa fa-times"></i>
            <p class="popup_info_title"><?php echo $message; ?></p>
            <div class="popup_info_text">

            </div>
            <button type="button" class="btn"><span>ok</span><i></i></button>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>