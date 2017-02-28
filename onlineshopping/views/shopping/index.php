<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pk_category_id',
            'vchr_category_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
