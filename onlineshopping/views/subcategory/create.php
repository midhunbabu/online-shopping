<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblSubCategory */

$this->title = 'Create Tbl Sub Category';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sub-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
