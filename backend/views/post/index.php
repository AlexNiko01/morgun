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

$this->title = 'Статьи';
?>

<main class="main">
    <div class="container">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
        'method' => 'get',
        'options' => [
        'class' => 'main_wrap table_site'
        ]
        ]); ?>

        <div class="title_block">
            <p>Список статей</p>
        </div>

        <?php echo $this->render('_search', [
        'searchModel' => $searchModel,
        'form' => $form

        ]);
        ?>

        <div class="table_site_body">
            <div class="divTable">
                <div class="tableHead">
                    <div class="tableRow">
                        <div class="tableCell"><p>Изображение</p></div>
                        <div class="tableCell"><p>Название</p></div>
                        <div class="tableCell"><p>Дата</p></div>
                        <div class="tableCell"><p>Автор</p></div>
                        <div class="tableCell"><p>Дата редактирования</p>
                        </div>
                    </div>
                </div>
                <div class="tableBody tableWrap wrap_control_table" data-url="post">
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
                    'itemView' => function ($searchModel, $key, $index, $widget) {
                    return $this->render('_post', [
                    'searchModel' => $searchModel,
                    ]);
                    },
                    ]);
                    ?>
                </div>

            </div>
            <div class="table_footer_control">
                <?= Html::a('<span>Добавить</span><i></i>', ['create'], ['class' => 'btn']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>


<!--<pre>-->
<!--    --><?php //var_dump($translations) ;?>
<!--</pre>-->


