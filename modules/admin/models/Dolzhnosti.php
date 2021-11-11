<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dolzhnosti".
 *
 * @property int $id_dolzhnosti
 * @property string $dolzhnost_name
 * @property string $specialnost
 * @property string $atribut1
 *
 * @property Sotrudniki[] $sotrudnikis
 */
class Dolzhnosti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dolzhnosti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dolzhnost_name', 'specialnost', 'atribut1'], 'required'],
            [['dolzhnost_name', 'specialnost', 'atribut1'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dolzhnosti' => 'ID должности',
            'dolzhnost_name' => 'Название должности',
            'specialnost' => 'Специальность',
            'atribut1' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Sotrudnikis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSotrudnikis()
    {
        return $this->hasMany(Sotrudniki::className(), ['id_dolzhnosti' => 'id_dolzhnosti']);
    }
}
