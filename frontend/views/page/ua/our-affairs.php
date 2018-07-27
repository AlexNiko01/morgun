<?php
use frontend\components\SocialsWidget;

?>

<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/cat_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Наші справи</h5>
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
            <h1>Справи в яких брали участь адвокати нашої фірми</h1>
            <ul>
                <li>Адвокати фірми після вступ до 2 справ ініційованих щодо клієнтів за фактом умисного ухилення від
                    сплати податків – відстояли закриття цих справ, припиняючи таку незаконну і антиморальними
                    комерційну наживу податкових правоохоронних органів.
                </li>
                <li>В ініційованому нашими адвокатами кримінальному провадженні у співпраці з правоохоронними органами
                    захищено підприємство потерпілого від рейдерського захоплення (майно яким володіло це підприємство
                    ціною більш ніж 15 000 000 доларів США).
                </li>
                <li>В рамках одного кримінального провадження, зібравши за місяць спростувальну доказову базу,
                    аргументуючи свою позицію в суді, адвокатами фірми знято арешти з 57 об’єктів нерухомості і знято 2
                    арешту з цінних паперів.
                </li>
                <li>Після тривалого судового розгляду в політичній кримінальній справі, яка тривала понад 7 років, в
                    лічені місяці після вступу в справу, адвокати нашої фірми досягли виправдувального вироку.
                </li>
            </ul>

        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>
<!--END ABOUT FIRM-->