<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// print_r($data);
?>

<div class="product-view">

<?php foreach ($data as $product): ?>
  
 <?= DetailView::widget([
        'model' => $product,
        'attributes' => [
            'vchr_product_name',
            'int_price',
            'pk_product_id',
        ],
    ]) ?>
   <p>
        <?= Html::a('add to cart', ['add'], ['class' => 'btn btn-primary']) ?>
  
    </p>
<?php endforeach; 
?>


    

   
</div>