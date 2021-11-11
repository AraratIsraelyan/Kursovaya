<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zakazchiki".
 *
 * @property int $id_zakazchika
 * @property int $id_object
 * @property string $zak_name
 *
 * @property Objects $object
 */
class Zakazchiki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakazchiki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_object', 'zak_name'], 'required'],
            [['id_object'], 'integer'],
            [['zak_name'], 'string', 'max' => 255],
            [['id_object'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['id_object' => 'id_object']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_zakazchika' => 'Код заказчика',
            'id_object' => 'Код объекта',
            'zak_name' => 'Заказчик',
        ];
    }

    /**
     * Gets query for [[Object]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObject()
    {
        return $this->hasOne(Objects::className(), ['id_object' => 'id_object']);
    }
}
