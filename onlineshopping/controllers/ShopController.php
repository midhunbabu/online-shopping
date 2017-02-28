<?php

namespace app\controllers;
use app\Models\SearchForm;
//use app\Models\TblProduct;
use app\Models\TblCategory;
use app\Models\TblProduct;
use Yii;
use yii\web\Controller;

/**
 * SubcategoryController implements the CRUD actions for TblSubCategory model.
 */
class ShopController extends Controller
{
  /**
     *loads index page along with data.
     *@return index page along with data.
     */

  public function actionIndex() {
   
       
        $modelCategory= new TblCategory;
        $modelProducts= new TblProduct;

     
        $categories=$modelCategory->getCategory();

        foreach ($categories as $category) {
          $products[$category['vchr_category_name']]=$modelProducts->getProduct($category['pk_category_id']);
        
        }     
          
            
        return $this->render('index', ['products'=>$products]);
       
    }
	 public function actionSearch()
    {
        $model = new SearchForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model
   
         
     $products['data'] = $model->getdata($model->keyword);
        	//TblProduct::find()
    // ->joinWith('fkIntSubCategory')
    // ->where(['like','tbl_sub_category.vchr_sub_category_name',$model->keyword])
    // ->joinWith('fkCategoryInt')
    // ->asArray()
    // ->all();
 
   return $this->render('search-result',$products);
    //return $this->render('search-result1', $products);
   
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('search', ['model' => $model]);
        }
    }
    public function actionAdd()
    {

      $id = $_GET['id'];
      echo $id;
      die();
       
    }
}
?>