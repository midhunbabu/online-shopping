<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblSubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sub-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pk_sub_category_id')->textInput() ?>

    <?= $form->field($model, 'fk_int_category_id')->textInput() ?>

    <?= $form->field($model, 'vchr_sub_category_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
