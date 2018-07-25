<?php

use common\models\Post;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список Услуг';
?>

<main class="main">
    <div class="container">
        <div class="services_list main_wrap">
            <div class="title_block">
                <p><?= Html::encode($this->title) ?></p>
            </div>
            <div class="services_list_wrap servicesWrap"  data-url="admin/service">
                <?php

                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => false
                    ],
                    'summary' => false,
                    'itemOptions' => [
                        'tag' => false
                    ],
                    'layout' => '{pager}{items}',
                    'itemView' => function ($serviceTranslation, $key, $index, $widget) {
                        return $this->render('_service', [
                            'serviceTranslation' => $serviceTranslation,
                        ]);
                    },
                ]);
                ?>
                <div class="table_footer_control">
                    <?= Html::a('<span>Добавить</span><i></i>', ['create'], ['class' => 'btn']) ?>
                </div>
            </div>
        </div>
    </div>
</main>


<!--<pre>-->
<!--    --><?php //var_dump($translations) ;?>
<!--</pre>-->


