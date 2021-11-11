<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property string $object_name
 * @property string $address
 * @property int $id_object
 * @property int $id_uprav
 *
 * @property Brigades[] $brigades
 * @property GraphicObjects[] $graphicObjects
 * @property StroiUprav $uprav
 * @property Zakazchiki[] $zakazchikis
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_name', 'address', 'id_uprav'], 'required'],
            [['id_uprav'], 'integer'],
            [['object_name', 'address'], 'string', 'max' => 100],
            [['id_uprav'], 'exist', 'skipOnError' => true, 'targetClass' => StroiUprav::className(), 'targetAttribute' => ['id_uprav' => 'id_uprav']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'object_name' => 'Наименование объекта',
            'address' => 'Адрес',
            'id_object' => 'Код объекта',
            'id_uprav' => 'Код управления',
        ];
    }

    /**
     * Gets query for [[Brigades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrigades()
    {
        return $this->hasMany(Brigades::className(), ['id_object' => 'id_object']);
    }

    /**
     * Gets query for [[GraphicObjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGraphicObjects()
    {
        return $this->hasMany(GraphicObjects::className(), ['id_object' => 'id_object']);
    }

    /**
     * Gets query for [[Uprav]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUprav()
    {
        return $this->hasOne(StroiUprav::className(), ['id_uprav' => 'id_uprav']);
    }

    /**
     * Gets query for [[Zakazchikis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazchikis()
    {
        return $this->hasMany(Zakazchiki::className(), ['id_object' => 'id_object']);
    }
}
