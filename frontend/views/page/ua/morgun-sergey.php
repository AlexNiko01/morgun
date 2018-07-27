<?php
use frontend\components\SocialsWidget;

?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/sergei_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Моргун Сергій</h5>
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
<!--END MAIN SLIDER-->
<!--BEGIN ABOUT FIRM -->
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
            <h3>Моргун Сергій Олександрович</h3>
            <p class="position">Партнер</p>
            <div class="lawyer_contact">
                <a href="mailto:s@morgun.ua"><i class="icon-mail"></i>s@morgun.ua</a>
                <a href="tel:0979811118"><i class="icon-phone"></i>+38 (097) 981-11-18</a>
            </div>
            <p><b>Засновник адвокатської фірми Morgun & partners</b>, досвідчений адвокат у сфері кримінального права і
                процесу. Має перемогу більш ніж в 90% кримінальних справ (кримінальних проваджень) з 2011 по 2017.
            </p>
            <p><b>Магістр права (LLM)</b></p>
            <p>
                <b>Досвідчений фахівець</b> у галузі кримінального права і кримінального переслідування, захисту честі і
                гідності фізичних осіб, а також ділової репутації юридичних та фізичних осіб-підприємців. Ефективно
                здійснює представництво інтересів клієнта в державних органах з наданням правової допомоги під час
                перевірок і в разі отримання запитів від контролюючих і правоохоронних органів.
            </p>
            <p>Як досвідчений адвокат у кримінальних справах, він вважає за краще домогтися правового врегулювання
                кримінального переслідування на досудовому процесі, але у разі необхідності захисту клієнтів в судових
                засіданнях <b>він не зупинитися поки не виграє справу</b> і не відстоїть всі права свого клієнта.</p>
        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>
<!--END ABOUT FIRM-->