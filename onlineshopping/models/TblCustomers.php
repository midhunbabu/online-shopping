<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_customers".
 *
 * @property integer $pk_int_customer_id
 * @property string $vchr_name
 * @property string $vchr_gender
 * @property string $vchr_email
 * @property string $vchr_mobile_no
 * @property string $text_address
 * @property string $vchr_password
 *
 * @property TblOrder[] $tblOrders
 */
class TblCustomers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_int_customer_id', 'vchr_name', 'vchr_gender', 'vchr_email', 'vchr_mobile_no', 'text_address', 'vchr_password'], 'required'],
            [['pk_int_customer_id'], 'integer'],
            [['text_address'], 'string'],
            [['vchr_name'], 'string', 'max' => 30],
            [['vchr_gender', 'vchr_mobile_no'], 'string', 'max' => 10],
            [['vchr_email'], 'string', 'max' => 50],
            [['vchr_password'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_int_customer_id' => 'Pk Int Customer ID',
            'vchr_name' => 'Vchr Name',
            'vchr_gender' => 'Vchr Gender',
            'vchr_email' => 'Vchr Email',
            'vchr_mobile_no' => 'Vchr Mobile No',
            'text_address' => 'Text Address',
            'vchr_password' => 'Vchr Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrders()
    {
        return $this->hasMany(TblOrder::className(), ['fk_int_customer_id' => 'pk_int_customer_id']);
    }
}
