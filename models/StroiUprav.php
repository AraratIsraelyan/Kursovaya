<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stroi_uprav".
 *
 * @property int $id_uprav
 * @property string $uprav_name
 * @property string $director
 *
 * @property Objects[] $objects
 * @property Tehnika[] $tehnikas
 */
class StroiUprav extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stroi_uprav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uprav_name', 'director'], 'required'],
            [['uprav_name'], 'string', 'max' => 50],
            [['director'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_uprav' => 'Код управления',
            'uprav_name' => 'Название управления',
            'director' => 'Руководитель',
        ];
    }

    /**
     * Gets query for [[Objects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Objects::className(), ['id_uprav' => 'id_uprav']);
    }

    /**
     * Gets query for [[Tehnikas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTehnikas()
    {
        return $this->hasMany(Tehnika::className(), ['id_uprav' => 'id_uprav']);
    }
}
