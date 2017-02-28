<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_sub_category".
 *
 * @property integer $pk_sub_category_id
 * @property integer $fk_int_category_id
 * @property string $vchr_sub_category_name
 *
 * @property TblCategory $fkIntCategory
 */
class TblSubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_sub_category_id', 'fk_int_category_id', 'vchr_sub_category_name'], 'required'],
            [['pk_sub_category_id', 'fk_int_category_id'], 'integer'],
            [['vchr_sub_category_name'], 'string', 'max' => 50],
            [['fk_int_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCategory::className(), 'targetAttribute' => ['fk_int_category_id' => 'pk_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_sub_category_id' => 'Pk Sub Category ID',
            'fk_int_category_id' => 'Fk Int Category ID',
            'vchr_sub_category_name' => 'Vchr Sub Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIntCategory()
    {
        return $this->hasOne(TblCategory::className(), ['pk_category_id' => 'fk_int_category_id']);
    }
}
