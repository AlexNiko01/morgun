<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = Yii::t('app', 'Update Service: ' . $service->id, [
    'nameAttribute' => '' . $service->id,
]);

?>

<main class="main">
    <div class="container">
    <?= $this->render('_form', [
        'service' => $service,
        'serviceTranslation' => $serviceTranslation
    ]) ?>
    </div>
</main>

