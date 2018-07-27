<?php
use frontend\components\SocialsWidget;
use frontend\components\AboutWidget;
?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/about_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Про фірму</h5>
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
                        echo AboutWidget::widget();
                    } catch (Exception $e) {
                    } ?>

                </div>
                <img class="lawyer_img" src="/img/katya---sergeyabout.png" alt="">
            </aside>
            <h3>Адвокатська фірма “Моргун та партнери”</h3>
            <p>Ми не велика фірма, але ми конкурентоспроможні великим юридичним корпораціям з великими іменами. У
                більшості практик ми займаємо лідируючі позиції. Наша мета не завоювати ринок, а заслужити найцінніше –
                довіру.</p>
            <p><b>Ми виводимо адвокатуру на новий рівень</b> – унікальний діючий варіант захисту. Більшість рішень у нас
                приймається колегіально старшими партнерами, будь-який підхід добре зважується, так як ми маємо
                неупереджений підхід до справи.</p>
            <p><b>Ми не спимо, і завжди готові приїхати на допомогу</b>, так як в компанії у нас присутній графік
                чергувань, з надання допомоги клієнтам, при проведенні заходів правоохоронними органами. Довіртеся
                нашому досвіду і ви отримаєте потрібний результат.</p>
            <p>Принциповим моментом нашої роботи є перш за все чесність і відвертість по відношенню до наших
                клієнтів.</p>
        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>

