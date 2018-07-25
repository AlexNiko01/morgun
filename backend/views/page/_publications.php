<?php

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'Наши статьи';
?>

<main class="main">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $publications,
            'modelTranslation' => $publicationsTranslation
        ]) ?>
    </div>
</main>

