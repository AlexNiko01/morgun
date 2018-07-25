<?php

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'Новости';
?>

<main class="main">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $blog,
            'modelTranslation' => $blogTranslation
        ]) ?>
    </div>
</main>

