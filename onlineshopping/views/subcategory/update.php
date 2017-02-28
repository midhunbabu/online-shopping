<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSubCategory */

$this->title = 'Update Tbl Sub Category: ' . $model->pk_sub_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_sub_category_id, 'url' => ['view', 'id' => $model->pk_sub_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sub-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
