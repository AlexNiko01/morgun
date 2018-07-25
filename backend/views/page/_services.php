<?php

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'Сервисы';
?>

<main class="main">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $services,
            'modelTranslation' => $servicesTranslation
        ]) ?>
    </div>
</main>
