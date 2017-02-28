<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\Models\TblSubCategory;
$data = TblSubCategory::find()
    ->select(['vchr_sub_category_name as value'])
    ->asArray()
    ->all();
  

$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('search form submitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            search for productssssssss
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'search-form']); ?>
                                                        
                    <?= $form->field($model, 'keyword') ?>
                                       
                    <div class="form-group">
                        <?= Html::submitButton('Search',['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
               
               <?php //$data = app\models\TblSubCategory::find()
            //->select(['pk_sub_category_id as value', 'vchr_sub_category_name as label'])
            //->asArray()
           // ->all();
//echo $form->field($model, 'kaution')->widget(AutoComplete::className(), ['clientOptions' => ['source' => $data],]);
?>
            </div>
        </div>

    <?php endif; ?>
</div>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\Models\TblSubCategory;
$data = TblSubCategory::find()
    ->select(['vchr_sub_category_name as value'])
    ->asArray()
    ->all();
  

$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('search form submitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            search for productssssssss
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'search-form']); ?>
                                                        
                    <?= $form->field($model, 'keyword') ?>
                                       
                    <div class="form-group">
                        <?= Html::submitButton('Search',['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
               
               <?php //$data = app\models\TblSubCategory::find()
            //->select(['pk_sub_category_id as value', 'vchr_sub_category_name as label'])
            //->asArray()
           // ->all();
//echo $form->field($model, 'kaution')->widget(AutoComplete::className(), ['clientOptions' => ['source' => $data],]);
?>
            </div>
        </div>

    <?php endif; ?>
</div>
