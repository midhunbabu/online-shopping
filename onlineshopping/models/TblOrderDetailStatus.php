<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_order_detail_status".
 *
 * @property integer $pk_int_order_status_id
 * @property integer $fk_int_order_id
 * @property integer $fk_int_order_detail_id
 * @property integer $fk_int_status_id
 * @property string $date_date_time
 *
 * @property TblOrder $fkIntOrder
 * @property TblOrderDetail $fkIntOrderDetail
 * @property TblStatus $fkIntStatus
 */
class TblOrderDetailStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order_detail_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_int_order_id', 'fk_int_order_detail_id', 'fk_int_status_id', 'date_date_time'], 'required'],
            [['fk_int_order_id', 'fk_int_order_detail_id', 'fk_int_status_id'], 'integer'],
            [['date_date_time'], 'safe'],
            [['fk_int_order_detail_id'], 'unique'],
            [['fk_int_status_id'], 'unique'],
            [['fk_int_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblOrder::className(), 'targetAttribute' => ['fk_int_order_id' => 'pk_int_order_id']],
            [['fk_int_order_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblOrderDetail::className(), 'targetAttribute' => ['fk_int_order_detail_id' => 'pk_int_order_detail_id']],
            [['fk_int_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatus::className(), 'targetAttribute' => ['fk_int_status_id' => 'pk_int_status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_order_status_id' => 'Pk Int Order Status ID',
            'fk_int_order_id' => 'Fk Int Order ID',
            'fk_int_order_detail_id' => 'Fk Int Order Detail ID',
            'fk_int_status_id' => 'Fk Int Status ID',
            'date_date_time' => 'Date Date Time',
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
    public function getFkIntOrderDetail()
    {
        return $this->hasOne(TblOrderDetail::className(), ['pk_int_order_detail_id' => 'fk_int_order_detail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntStatus()
    {
        return $this->hasOne(TblStatus::className(), ['pk_int_status_id' => 'fk_int_status_id']);
    }
}
