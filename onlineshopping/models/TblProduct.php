<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_product".
 *
 * @property integer $pk_product_id
 * @property integer $fk_category_int_id
 * @property integer $fk_int_sub_category_id
 * @property string $vchr_product_name
 * @property integer $int_price
 *
 * @property TblOrderDetail[] $tblOrderDetails
 * @property TblCategory $fkCategoryInt
 * @property TblSubCategory $fkIntSubCategory
 * @property TblProductSize $tblProductSize
 */
class TblProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_product_id', 'fk_category_int_id', 'fk_int_sub_category_id', 'vchr_product_name', 'int_price'], 'required'],
            [['pk_product_id', 'fk_category_int_id', 'fk_int_sub_category_id', 'int_price'], 'integer'],
            [['vchr_product_name'], 'string', 'max' => 50],
            [['fk_category_int_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCategory::className(), 'targetAttribute' => ['fk_category_int_id' => 'pk_category_id']],
            [['fk_int_sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSubCategory::className(), 'targetAttribute' => ['fk_int_sub_category_id' => 'pk_sub_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_product_id' => 'Pk Product ID',
            'fk_category_int_id' => 'Fk Category Int ID',
            'fk_int_sub_category_id' => 'Fk Int Sub Category ID',
            'vchr_product_name' => 'Vchr Product Name',
            'int_price' => 'Int Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrderDetails()
    {
        return $this->hasMany(TblOrderDetail::className(), ['fk_int_product_id' => 'pk_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCategoryInt()
    {
        return $this->hasOne(TblCategory::className(), ['pk_category_id' => 'fk_category_int_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntSubCategory()
    {
        return $this->hasOne(TblSubCategory::className(), ['pk_sub_category_id' => 'fk_int_sub_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProductSize()
    {
        return $this->hasOne(TblProductSize::className(), ['pk_size_id' => 'pk_product_id']);
    }
     public function getProduct($productId)
    {
        return TblProduct::find()
             ->where(['fk_int_category_id'=>$productId])
             ->joinWith('fkIntSubCategory')
             ->asArray()
             ->all();
    }
}
