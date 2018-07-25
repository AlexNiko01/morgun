<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */


?>
<main class="main">
    <div class="container">
        <?= $this->render('_form', [
            'model' => $contacts,
            'modelTranslation' => $contactsTranslation
        ]) ?>
    </div>
</main>
