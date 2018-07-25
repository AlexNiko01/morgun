<?php

use frontend\components\SocialsWidget;

?>
<section class="section_top">
    <div class="section_top_page">
        <img class="parallax" src="/img/contact_bg.jpg" alt="">
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
<div class="contact_section">
    <div class="container">
        <div class="contact_section_form">
            <p class="section_form_title">Получить конфиденциальную консультацию</p>
            <span class="section_form_line"></span>
            <p class="section_form_text">Если вы хотите связаться с нами по электронной почте, пожалуйста, заполните
                форму ниже, и мы свяжемся с вами в течение 24 часов.</p>
            <form action="" class="feedback" data-category="0">
                <input type="text" name="name" placeholder="Ваше имя"
                       pattern="^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$" required>
                <input type="email" name="email" placeholder="Ваш e-mail" required>
                <input type="tel" name="phone" placeholder="Ваш телефон" required>
                <label for="text" class="text_label">Ваше сообщение</label>
                <textarea name="text" id="" cols="30" rows="10" maxlength="400"></textarea>
                <button class="btn" type="submit"><span>ОТПРАВИТЬ</span><i></i></button>
            </form>
        </div>
        <div class="contact_section_right">
            <div class="title_page">
                <h5 class="title_block">Контактная информация</h5>
                <span class="title_page_line"></span>
            </div>
            <div class="address_content" itemscope itemtype="http://schema.org/Organization">
                <div class="container">
                    <h4 class="address_title" itemprop="name">Адвокатская фирма "Моргун и партнёры"</h4>
                    <p style="font-weight: 700">Почтовый адрес:</p>
                    <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span
                                itemprop="streetAddress">ул. Ивана Федорова 9, офис 65</span>,<br>
                        <span
                                itemprop="addressLocality">Киев, Украина</span>, <span
                                itemprop="postalCode">03150</span></address>
                    <div class="address_phone">
                        <a href="tel:+380979811118"><i class="icon-phone"></i><span itemprop="telephone">+38 (097) 981-11-18</span></a>
                        <a href="mailto:help@morgun.ua"><i class="icon-mail"></i><span
                                    itemprop="email">help@morgun.ua</span></a>
                    </div>
                    <div class="time_work">
                        <p class="time_work_title">Время работы</p>
                        <time class="time_work_time">С понедельника по пятницу - 9:00 - 19:00</time>
                        <p class="time_work_text">Встреча по предварительной записи.
                            Позвоните нам и запишитесь на прием.</p>
                    </div>
                    <img itemprop="logo" src="/img/logo-black.svg" alt="morgun_and_partners_logo"
                         style="display: none">
                    <a itemprop="url" href="/" style="display: none"></a>
                    <div itemprop="location" itemscope itemtype="http://schema.org/Place" style="display: none">
                        <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCircle">
                            <div itemprop="geoMidpoint" itemscope itemtype="http://schema.org/GeoCoordinates">
                                <meta itemprop="latitude" content="50.4448760"/>
                                <meta itemprop="longitude" content="30.5331190"/>
                            </div>
                            <meta itemprop="geoRadius" content="50"/>
                        </div>
                    </div>
                    <div class="social_block">
                        <a href="https://www.facebook.com/morgun.ua" target="_blank">
                            <svg class="facebook" viewBox="0 0 96.124 96.123" xml:space="preserve">
	<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
		c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
		c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
		c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
    </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/morgun/" target="_blank">
                            <svg class="linkedin" viewBox="0 0 430.117 430.117" xml:space="preserve">
	<path id="LinkedIn" d="M430.117,261.543V420.56h-92.188V272.193c0-37.271-13.334-62.707-46.703-62.707
		c-25.473,0-40.632,17.142-47.301,33.724c-2.432,5.928-3.058,14.179-3.058,22.477V420.56h-92.219c0,0,1.242-251.285,0-277.32h92.21
		v39.309c-0.187,0.294-0.43,0.611-0.606,0.896h0.606v-0.896c12.251-18.869,34.13-45.824,83.102-45.824
		C384.633,136.724,430.117,176.361,430.117,261.543z M52.183,9.558C20.635,9.558,0,30.251,0,57.463
		c0,26.619,20.038,47.94,50.959,47.94h0.616c32.159,0,52.159-21.317,52.159-47.94C103.128,30.251,83.734,9.558,52.183,9.558z
		 M5.477,420.56h92.184v-277.32H5.477V420.56z"/>
    </svg>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>