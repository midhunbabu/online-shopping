<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategory */

$this->title = 'Update Tbl Category: ' . $model->pk_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_category_id, 'url' => ['view', 'id' => $model->pk_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
