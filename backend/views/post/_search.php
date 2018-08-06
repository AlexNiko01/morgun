<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="table_filter">
    <div class="table_filter_elem">
        <p>Отобрать:</p>
        <select name="per-page">
            <option value="20">20 элементов</option>
            <option value="40">40 элементов</option>
            <option value="60">60 элементов</option>
        </select>
    </div>
    <div class="table_filter_elem table_filter_calendar">
        <p>Период:</p>
        <input type="text" class="calendar" data-mode="range" name="range">
    </div>
</div>
<div class="table_search">
    <div class="search">
        <input type="search" placeholder="Поиск..." name="search">
        <button class="btn_search"><i class="fa fa-search"></i></button>
    </div>
</div>
