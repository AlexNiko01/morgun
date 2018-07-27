<?php
use frontend\components\SocialsWidget;

?>

<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/katya_bg.jpg" alt="">
        <div class="title_page">
            <h5 class="title_block">Алєксєйченко Катерина</h5>
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
                <img class="lawyer_img" src="/img/katya_max.jpg" alt="">
            </aside>
            <h3>Алєксєйченко Катерина</h3>
            <p class="position">Партнер</p>
            <div class="lawyer_contact">
                <a href="mailto:k@morgun.ua"><i class="icon-mail"></i>k@morgun.ua</a>
                <a href="tel:0675932400"><i class="icon-phone"></i>+38 (067) 593-24-00</a>
            </div>

            <p><b>Партнер адвокатської фірми Morgun & partners</b>, гідний адвокат і професійний юрист у сімейних
                справах, який має надзвичайно великий досвід у веденні переговорів в якості медіатора в сфері сімейних
                спорів і конфліктів.</p>

            <p>З 2011 року Катерина працювала в якості помічниці відомого адвоката, далі з 2014 року адвокатом
                самостійно, набула значного досвіду в сферах своєї спеціалізації, а саме в різних аспектах вирішення
                спорів, особливо в цивільному процесі і сімейному праві.</p>
            <p><b>Катерина успішний адвокат не тільки у сімейному праві</b>, вона має значний досвід ведення
                господарських, цивільних та адміністративних справ у судах на всій території України, компетентна в
                захисті клієнтів у кримінальних справах.</p>
            <p>Якщо зібрати суму грошових коштів з 2011 по 2017, повернутих клієнтам в результаті <b>її успішної судової
                практики</b> по роботі з боржниками, то таке число вже давно зайшло за сотні мільйонів USD.</p>
        </div>
    </div>
    <img class="shape_left" src="/img/shape-left.png" alt="">
    <img class="shape_right" src="/img/shape-right.png" alt="">
</main>
