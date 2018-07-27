<?php
use frontend\components\SocialsWidget;

?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/cat_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Наши дела</h5>
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
<!--END MAIN SLIDER-->
<!--BEGIN ABOUT FIRM -->
<main class="main_section animation">
    <svg class="main_section_top" viewBox="0 0 1130 5000">
        <path d="M 1128 0  L 1128 113 L 2 113 L 2 5000"/>
    </svg>
    <div class="main_section_content">
        <div class="main_section_text column">
            <aside class="aside_main">
                <div class="about_list">
                    <p class="about_list_title">
                        Про фірму </p>
                    <?php try {
                        echo \frontend\components\AboutWidget::widget();
                    } catch (Exception $e) {
                    } ?>
                </div>
            </aside>
            <h1>Дела в которых принимали участие адвокаты нашей фирмы</h1>
            <ul>
                <li>Адвокаты фирмы после вступление в 2 дела инициированные в отношение клиентов по факту умышленного
                    уклонения от уплаты налогов – отстояли закрытие этих дел, пресекая такую незаконную и антиморальную
                    коммерческую наживу налоговых правоохранительных органов.
                </li>
                <li>В инициированном нашими адвокатами уголовном производстве в сотрудничестве с правоохранительными
                    органами защищено предприятие потерпевшего от рейдерского захвата (имущество которым владело это
                    предприятие ценой более чем 15 000 000 долларов США).
                </li>
                <li>В рамках одного уголовного производства, собрав за месяц опровергающую доказательную базу,
                    аргументируя свою позицию в суде, адвокатами фирмы снято аресты с 57 объектов недвижимости и снято 2
                    ареста с ценных бумаг.
                </li>
                <li>После длительного судебного разбирательства в политическом уголовном деле, которое продлилось более
                    7 лет, в считанные месяца после вступления в дело, адвокаты нашей фирмы достигли оправдательного
                    приговора.
                </li>
            </ul>

        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>
<!--END ABOUT FIRM-->