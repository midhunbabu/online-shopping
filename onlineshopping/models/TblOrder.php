<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_order".
 *
 * @property integer $pk_int_order_id
 * @property integer $fk_int_customer_id
 * @property string $date_date
 *
 * @property TblCustomers $fkIntCustomer
 * @property TblOrderDetail[] $tblOrderDetails
 * @property TblOrderDetailStatus[] $tblOrderDetailStatuses
 */
class TblOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_order_id', 'fk_int_customer_id', 'date_date'], 'required'],
            [['pk_int_order_id', 'fk_int_customer_id'], 'integer'],
            [['date_date'], 'safe'],
            [['fk_int_customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCustomers::className(), 'targetAttribute' => ['fk_int_customer_id' => 'pk_int_customer_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_order_id' => 'Pk Int Order ID',
            'fk_int_customer_id' => 'Fk Int Customer ID',
            'date_date' => 'Date Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntCustomer()
    {
        return $this->hasOne(TblCustomers::className(), ['pk_int_customer_id' => 'fk_int_customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrderDetails()
    {
        return $this->hasMany(TblOrderDetail::className(), ['fk_int_order_id' => 'pk_int_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrderDetailStatuses()
    {
        return $this->hasMany(TblOrderDetailStatus::className(), ['fk_int_order_id' => 'pk_int_order_id']);
    }
}
