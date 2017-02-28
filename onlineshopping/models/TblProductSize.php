<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_product_size".
 *
 * @property integer $pk_size_id
 * @property integer $fk_item_id
 * @property string $vchr_size
 *
 * @property TblProduct $pkSize
 */
class TblProductSize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product_size';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_item_id', 'vchr_size'], 'required'],
            [['fk_item_id'], 'integer'],
            [['vchr_size'], 'string', 'max' => 10],
            [['pk_size_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblProduct::className(), 'targetAttribute' => ['pk_size_id' => 'pk_product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_size_id' => 'Pk Size ID',
            'fk_item_id' => 'Fk Item ID',
            'vchr_size' => 'Vchr Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPkSize()
    {
        return $this->hasOne(TblProduct::className(), ['pk_product_id' => 'pk_size_id']);
    }
}
