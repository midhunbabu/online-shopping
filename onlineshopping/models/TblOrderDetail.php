<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_order_detail".
 *
 * @property integer $pk_int_order_detail_id
 * @property integer $fk_int_order_id
 * @property integer $fk_int_product_id
 * @property integer $int_quantity
 *
 * @property TblOrder $fkIntOrder
 * @property TblProduct $fkIntProduct
 * @property TblOrderDetailStatus $tblOrderDetailStatus
 */
class TblOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_order_detail_id', 'fk_int_order_id', 'fk_int_product_id', 'int_quantity'], 'required'],
            [['pk_int_order_detail_id', 'fk_int_order_id', 'fk_int_product_id', 'int_quantity'], 'integer'],
            [['fk_int_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblOrder::className(), 'targetAttribute' => ['fk_int_order_id' => 'pk_int_order_id']],
            [['fk_int_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProduct::className(), 'targetAttribute' => ['fk_int_product_id' => 'pk_product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_order_detail_id' => 'Pk Int Order Detail ID',
            'fk_int_order_id' => 'Fk Int Order ID',
            'fk_int_product_id' => 'Fk Int Product ID',
            'int_quantity' => 'Int Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntOrder()
    {
        return $this->hasOne(TblOrder::className(), ['pk_int_order_id' => 'fk_int_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntProduct()
    {
        return $this->hasOne(TblProduct::className(), ['pk_product_id' => 'fk_int_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrderDetailStatus()
    {
        return $this->hasOne(TblOrderDetailStatus::className(), ['fk_int_order_detail_id' => 'pk_int_order_detail_id']);
    }
}
