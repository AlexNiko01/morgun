<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'Главная';
?>

<main class="main">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $home,
            'modelTranslation'=>$homeTranslation
        ]) ?>
    </div>
</main>

