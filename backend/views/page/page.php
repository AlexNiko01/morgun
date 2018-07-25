<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $modelTranslation->name;
//var_dump($model,$modelTranslation);
//die();
?>

<main class="main">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $model,
            'modelTranslation' => $modelTranslation,
            'parents' => $parents
        ]) ?>
    </div>
</main>

