<?php
use frontend\components\SocialsWidget;
use frontend\components\AboutWidget;
?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/about_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">О фирме</h5>
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
            <h3>Адвокатская фирма «Моргун и партнёры»</h3>
            <p>Мы не большая фирма, но мы конкурентоспособные большим юридическим корпорациям с большими именами. В
                большинстве практик мы занимаем лидирующие позиции. Наша цель не завоевать рынок, а заслужить самое
                ценное – доверие.</p>
            <p><b>Мы выводим адвокатуру на новый уровень</b> — уникальный действующий вариант защиты. Большинство
                решений у нас принимается коллегиально старшими партнерами, любой подход хорошо взвешивается, так как мы
                имеем беспристрастный подход к делу.</p>
            <p><b>Мы не спим, и всегда готовы приехать на помощь</b>, так как в компании у нас присутствует график
                дежурств, по оказанию помощи клиентам, при проведении мероприятий правоохранительными органами.
                Доверьтесь нашему опыту, и вы получите нужный результат.</p>
            <p>Принципиальным моментом нашей работы является прежде всего честность и откровенность по отношению к нашим
                клиентам.</p>
        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>


