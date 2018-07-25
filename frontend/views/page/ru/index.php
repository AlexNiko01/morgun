<?php use frontend\components\SocialsWidget; ?>
<section class="section_top dote_scroll section_top_height">
    <div class="slider_main">
        <div class="slider_main_elem">
            <div class="slider_main_img">
                <img src="/img/slide1.jpg" alt="">
            </div>
            <div class="slider_main_content">
                <h3 class="slider_main_text">Мы видим то, что не видят другие.</h3>
                <div class="btn dark get_feedback"><span>ЗВОНИТЕ НАМ</span><i></i></div>
            </div>
        </div>
        <div class="slider_main_elem">
            <div class="slider_main_img">
                <img src="/img/morgun-and-partners_pic1.jpg" alt="">
            </div>
            <div class="slider_main_content">
                <h3 class="slider_main_text">Пройденный путь и есть награда</h3>
                <div class="btn dark get_feedback"><span>ЗВОНИТЕ НАМ</span><i></i></div>
            </div>
        </div>
        <div class="slider_main_elem">
            <div class="slider_main_img">
                <img src="/img/morgun-and-partners_pic2.jpg" alt="">
            </div>
            <div class="slider_main_content">
                <h3 class="slider_main_text">Потерпеть неудачу невозможно, пока ты не сдаёшься.</h3>
                <div class="btn dark get_feedback"><span>ЗВОНИТЕ НАМ</span><i></i></div>
            </div>
        </div>
        <div class="slider_main_elem">
            <div class="slider_main_img">
                <img src="/img/full-news.jpg" alt="">
            </div>
            <div class="slider_main_content">
                <h3 class="slider_main_text">Адвокат – как врач. Главное - не навредить своему клиенту!</h3>
                <div class="btn dark get_feedback"><span>ЗВОНИТЕ НАМ</span><i></i></div>
            </div>
        </div>
        <div class="slider_main_control">
            <button class="control_left"><i class="control_left_icon"></i></button>
            <button class="control_right"><i class="control_right_icon"></i></button>
        </div>
    </div>
    <?php
    try {
        echo SocialsWidget::widget();
    } catch (Exception $e) {
    } ?>
</section>

<section class="about_us animation dote_scroll">
    <img src="/img/katya.jpg" alt="" class="left_img_bg">
    <svg class="about_line_top" viewBox="0 0 3 200">
        <path d="M 2 0 L2 200"/>
    </svg>
    <div class="container">
        <div class="about_triangle"></div>
        <div class="about_us_left">
            <h3 class="title_block">
                ЗНАКОМТЕСЬ<span>с Morgun & partners</span>
                <svg class="about_line_left" viewBox="0 0 110 3">
                    <path d="M 110 1 L0 1"/>
                </svg>
            </h3>
            <p><b>Morgun & partners</b> – украинская адвокатская фирма, имеющая достойный опыт в различных сферах
                юридической
                практики. Адвокаты фирмы наделены выдающимся послужным списком успеха. Мы специализируемся в практиках
                уголовного и семейного права, в разрешении
                споров и в праве интеллектуальной собственности.
            </p>
            <p>Мы относимся к нашим клиентам на личном уровне. В своей работе мы предпочитаем качество вместо
                количества, а самое главное гарантируем честность и откровенность по отношению к нашим клиентам.</p>
            <p>Мы взаимодействуем с партнерами во многих зарубежных юрисдикциях, что позволяет нам эффективно
                представлять интересы украинских клиентов за границей и иностранных клиентов в Украине.
            </p>
        </div>
        <div class="about_us_right">
            <div class="about_us_photo">
                <img src="/img/yuristy.jpg" alt="">
            </div>
            <div class="about_us_success">
                <img src="/img/suc_bg.png" alt="">
                <div class="success_content">
                    <h3 class="success_text">
                        <span class="success_title">УСПЕХ В БОЛЕЕ ЧЕМ</span>
                        <span class="success_interest">
                            <svg viewBox="0 0 110 3">
                                <path d="M 0 2 L110 2"/>
                            </svg>
                                90%
                            <svg viewBox="0 0 110 3">
                                <path d="M 110 2 L0, 2"/>
                            </svg>
                          </span>
                        делах, в 2016 и 2017 годах*
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <img src="/img/sergey.jpg" alt="" class="right_img_bg">
</section>

<div class="practice animation dote_scroll" itemscope itemtype="http:/schema.org/Service">
    <div class="container">
        <svg class="practice_top_right" viewBox="0 0 943 566">
            <path d="M 2 2 L 940 2 L 940 563 L 2 563  z"/>
        </svg>
        <svg class="practice_top_left" viewBox="0 0 943 566">
            <path d="M 2 2 L 940 2 L 940 563 L 2 563  z"/>
        </svg>

        <h3 class="title_block" itemprop="serviceType">Наши практики</h3>
        <div class="practice_content" itemprop="hasOfferCatalog" itemscope itemtype="http:/schema.org/OfferCatalog">
            <div class="practice_content_left">
                <div class="practice_card">
                    <img src="/img/practice1.png" alt="">
                    <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                         itemtype="http:/schema.org/OfferCatalog">
                        <a href="/uslugi/advokat-po-ugolovnim-delam/" itemprop="url"></a>
                        <h4 class="practice_card_title" itemprop="name">Уголовное право</h4>
                        <span class="practice_card_line"></span>
                        <p class="practice_card_text" itemprop="itemListElement" itemscope
                           itemtype="http:/schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                   itemtype="http:/schema.org/Service"><span
                                        itemprop="name">Защита в уголовном производстве.</span></span>
                        </p>
                        <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                        <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                    </div>
                </div>
            </div>
            <div class="practice_content_right">
                <div class="practice_card">
                    <img src="/img/practice2.png" alt="">
                    <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                         itemtype="http:/schema.org/OfferCatalog">
                        <a href="/uslugi/razreshenie-sporov/" itemprop="url"></a>
                        <h4 class="practice_card_title" itemprop="name">РАЗРЕШЕНИЕ СПОРОв</h4>
                        <span class="practice_card_line"></span>
                        <p class="practice_card_text" itemprop="itemListElement" itemscope
                           itemtype="http:/schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                   itemtype="http:/schema.org/Service"><span
                                        itemprop="name">Досудебное урегулирование.</span></span></p>
                        <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                        <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                    </div>
                </div>
                <div class="practice_card">
                    <img src="/img/practice3.png" alt="">
                    <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                         itemtype="http:/schema.org/OfferCatalog">
                        <a href="/uslugi/advokat-po-semeymin-delam/" itemprop="url"></a>
                        <h4 class="practice_card_title" itemprop="name">семейное право</h4>
                        <span class="practice_card_line"></span>
                        <p class="practice_card_text" itemprop="itemListElement" itemscope
                           itemtype="http:/schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                   itemtype="http:/schema.org/Service"><span
                                        itemprop="name">Семейные споры.</span></span>
                        </p>
                        <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                        <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                    </div>
                </div>
                <div class="practice_card">
                    <img src="/img/practice4.png" alt="">
                    <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                         itemtype="http:/schema.org/OfferCatalog">
                        <a href="/uslugi/nedvizhimost-i-zemelnoe-pravo/" itemprop="url"></a>
                        <h4 class="practice_card_title" itemprop="name">недвижимость</h4>
                        <span class="practice_card_line"></span>
                        <p class="practice_card_text" itemprop="itemListElement" itemscope
                           itemtype="http:/schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                   itemtype="http:/schema.org/Service"><span
                                        itemprop="name">и земельное право</span></span></p>
                        <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                        <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                    </div>
                </div>
                <div class="practice_card">
                    <img src="/img/practice5.png" alt="">
                    <div class="practice_card_wrap" itemprop="itemListElement" itemscope
                         itemtype="http:/schema.org/OfferCatalog">
                        <a href="/uslugi/intellektualnaya-sobstvennost/" itemprop="url"></a>
                        <h4 class="practice_card_title" itemprop="name">интеллектуальная собственность</h4>
                        <span class="practice_card_line"></span>
                        <p class="practice_card_text" itemprop="itemListElement" itemscope
                           itemtype="http:/schema.org/Offer"><span itemprop="itemOffered" itemscope
                                                                   itemtype="http:/schema.org/Service"><span
                                        itemprop="name">IT и Интернет право.</span></span>
                        </p>
                        <div class="line_effect"><span></span><span></span><span></span><span></span></div>
                        <div class="line_effect2"><span></span><span></span><span></span><span></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_logo_block">
        <img src="/img/logo_bg.png" alt="">
    </div>
</div>
<section class="advantage animation dote_scroll">
    <img src="/img/advantage_bg.png" alt="">
    <div class="container">
        <h3 class="title_block">
            <svg class="advantage_top_right" viewBox="0 0 160 230">
                <path d="M 157 0 L 157 227 L 0 227"/>
            </svg>
            Наше стратегическое преимущество
            <svg class="advantage_top_left" viewBox="0 0 95 635">
                <path d="M 95 3 L 3 3 L 3 635"/>
            </svg>
        </h3>
        <div class="advantage_content">
            <div class="advantage_card">
                <i class="advantage_card_icon icon-medal"></i>
                <span class="advantage_card_line"></span>
                <p class="advantage_card_text">Успех в более чем 90%<br> делах, в 2016 и 2017 годах.</p>
            </div>
            <div class="advantage_card">
                <i class="advantage_card_icon icon-placeholder"></i>
                <span class="advantage_card_line"></span>
                <p class="advantage_card_text">Удобное расположение<br> главного офиса.</p>
            </div>
            <div class="advantage_card">
                <i class="advantage_card_icon icon-briefcase"></i>
                <span class="advantage_card_line"></span>
                <p class="advantage_card_text">Полностью сосредотачиваемся<br> над делом.</p>
            </div>
            <div class="advantage_card">
                <i class="advantage_card_icon icon-bulb"></i>
                <span class="advantage_card_line"></span>
                <p class="advantage_card_text">Особое внимание к уголовным производствам и семейным спорам.</p>
            </div>
            <div class="advantage_card mode_width">
                <i class="advantage_card_icon icon-thinking"></i>
                <span class="advantage_card_line"></span>
                <p class="advantage_card_text">
                    Отличное знание вашего дела и способности в полной мере представлять вас лучше, чем вы можете себе
                    представить.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="victory animation dote_scroll">
    <div class="container">
        <svg class="victory_top_left" viewBox="0 0 1150 210">
            <path d="M 3 207 L 3 3 L 1150 3"/>
        </svg>
        <h3 class="title_block">Наши победы</h3>
        <div class="victory_slider">
            <div class="victory_slider_wrap">
                <div class="victory_slider_elem">
                    <h5 class="victory_slider_title">Cнято аресты с 57 объектов недвижимости</h5>
                    <p class="victory_slider_text">В рамках одного уголовного производства, собрав за месяц
                        опровергающую доказательную базу, аргументируя свою позицию в суде, адвокатами фирмы снято
                        аресты с 57 объектов недвижимости и снято 2 ареста с ценных бумаг.</p>
                </div>
                <div class="victory_slider_elem">
                    <h5 class="victory_slider_title">Закрыто 95% процентов уголовных дел</h5>
                    <p class="victory_slider_text">95% процентов уголовных дел, в которые вступали адвокаты нашей фирмы,
                        в результате грамотной защиты закрывались на этапе досудебного расследования.</p>
                </div>
                <div class="victory_slider_elem">
                    <h5 class="victory_slider_title">Прекращены вымогательства со стороны правоохранительных
                        органов</h5>
                    <p class="victory_slider_text">99% уголовных дел, инициированных в отношение клиентов с признаками
                        вымогательства со стороны правоохранительных органов, после вступление в дело наших адвокатов –
                        закрывались, пресекая такую незаконную и антиморальную коммерческую наживу.</p>
                </div>
                <div class="victory_slider_elem">
                    <h5 class="victory_slider_title">Защищено предприятие потерпевшего от рейдерского захвата</h5>
                    <p class="victory_slider_text">В инициированном нашими адвокатами уголовном производстве в
                        сотрудничестве с правоохранительными органами защищено предприятие потерпевшего от рейдерского
                        захвата (имущество которым владело это предприятие ценой более чем 15 000 000 доларів США).</p>
                </div>
            </div>
            <div class="victory_slider_dot">

            </div>
        </div>
        <svg class="victory_top_right" viewBox="0 0 1150 210">
            <path d="M 1147 0  L 1147 207 L 3 207"/>
        </svg>
    </div>
</section>

<section class="consultation animation dote_scroll">
    <img class="parallax" src="/img/cl_bg.png" alt="">
    <div class="container">
        <h3 class="title_block">
            <svg class="consultation_top_left" viewBox="0 0 61 303">
                <path d="M 3 0  L 3 300 L 61 300"/>
            </svg>
            На первой консультации
            <svg class="consultation_top_right" viewBox="0 0 260 3">
                <path d="M 0 2  L 260 2"/>
            </svg>
        </h3>
        <div class="consultation_text">
            <p><b>Morgun & partners</b> мы ценим наших клиентов, их жизненные истории, их вопросы и проблематику. Мы
                приглашаем Вас дать нам возможность решить ваши дела и предложить возможные решения. Мы не просим
                выбрать нас, мы просим Вас выбрать правильного адвоката!
            </p>
        </div>
        <div class="btn get_feedback"><span>СВЯЖИТЕСЬ С НАМИ</span><i></i></div>
    </div>
</section>

<div class="dote_block white">
    <div class="dote_block_list"></div>
    <div class="dote_block_next">
        <i class="icon-right-open"></i>
    </div>
</div>
