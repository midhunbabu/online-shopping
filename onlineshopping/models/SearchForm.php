<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SearchForm extends Model
{
    public $keyword;
     public $keyword1;
    public function rules()
    {
        return [
            [['keyword'], 'required'],
             ['keyword', 'string'],
            
        ];
    }


    public function getdata($arg)
    {
      return  TblProduct::find()
    ->joinWith('fkIntSubCategory')
    ->where(['like','tbl_sub_category.vchr_sub_category_name',$arg])
    ->joinWith('fkCategoryInt')
    ->asArray()
    ->all();
    }
}