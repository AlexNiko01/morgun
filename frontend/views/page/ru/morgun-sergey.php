<?php
use frontend\components\SocialsWidget;

?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/sergei_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Моргун Сергей</h5>
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
    <div class="main_section_content">
        <div class="main_section_text">
            <aside class="aside_main">
                <div class="about_list">
                    <p class="about_list_title">
                        Про фірму </p>
                    <?php try {
                        echo \frontend\components\AboutWidget::widget();
                    } catch (Exception $e) {
                    } ?>
                </div>
                <img class="lawyer_img" src="/img/sergei_max.jpg" alt="">
            </aside>
            <h3>Моргун Сергей Александрович</h3>
            <p class="position">Партнёр</p>
            <div class="lawyer_contact">
                <a href="mailto:s@morgun.ua"><i class="icon-mail"></i>s@morgun.ua</a>
                <a href="tel:0979811118"><i class="icon-phone"></i>+38 (097) 981-11-18</a>
            </div>
            <p><b>Основатель адвокатской фирмы Morgun & partners</b>, опытный адвокат в сфере уголовного права и
                процесса. Имеет победу более чем в 90% уголовных дел (уголовных производств) с 2011 по 2017.</p>
            <p><b>Магистр права (LLM)</b></p>
            <p><b>Опытный специалист</b> в области уголовного права и уголовного преследования, защиты чести и
                достоинства физических лиц, а также деловой репутации юридических и физических лиц-предпринимателей.
                Эффективно осуществляет представительство интересов клиента в государственных органах с предоставлением
                правовой помощи во время проверок и в случае получения запросов контролирующих и правоохранительных
                органов.</p>
            <p>Как опытный адвокат по уголовным делам, он предпочитает добиться правового урегулирования уголовного
                преследования на досудебном процессе, но в случае необходимости защиты клиентов в судебных
                разбирательствах <b>он не остановиться пока не выиграет дело</b> и не отстоит все права своего клиента.
            </p>

        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>
<!--END ABOUT FIRM-->