<?php
use frontend\components\SocialsWidget;

?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/katya_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Alekseychenko Katerina</h5>
            <span class="title_page_line"></span>
        </div>
        <span class="bg_page"></span>
    </div>
    <div class="button_set">
        <?php

        try {
            echo SocialsWidget::widget();
        } catch (Exception $e) {
            echo $e->getMessage();
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
                <img class="lawyer_img" src="/img/katya_max.jpg" alt="">
            </aside>
            <h3>Алексейченко Катерина</h3>
            <p class="position">Партнер</p>
            <div class="lawyer_contact">
                <a href="mailto:k@morgun.ua"><i class="icon-mail"></i>k@morgun.ua</a>
                <a href="tel:0675932400"><i class="icon-phone"></i>+38 (067) 593-24-00</a>
            </div>
            <p><b>Партнер адвокатской фирмы Morgun & partners</b>, достойный адвокат и профессиональный юрист по
                семейным делам, имеющий необыкновенно большой опыт в ведении переговоров в качестве медиатора в сфере
                семейных споров и конфликтов.
            </p>
            <p>С 2011 года Катерина работала в качестве помощницы известного адвоката, далее с 2014 года адвокатом
                самостоятельно, приобрела значительный опыт в сферах своей специализации, а именно в разных аспектах
                разрешения споров, особенно в гражданском процессе и семейном праве.</p>
            <p><b>Катерина во многом преуспевающий адвокат</b> не только в семейном праве, имеет значительный опыт
                ведения хозяйственных, гражданских и административных дел в судах на всей территории Украины,
                компетентна в защите клиентов уголовных делах.</p>
            <p>Если собрать сумму денежных средств с 2011 по 2017, возвращённых нашим клиентам в результате <b>ее
                успешной судебной практики</b> по работе с должниками, то такое число уже давно зашло за сотни миллионов
                USD.</p>
        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>
<!--END ABOUT FIRM-->