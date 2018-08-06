<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Редактирование новости: ';

?>
<main class="main">
    <div class="container">

        <?= $this->render('_form', [
            'post' => $post,
            'postTranslation' => $postTranslation
        ]) ?>
    </div>
</main>

