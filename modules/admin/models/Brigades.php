<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "brigades".
 *
 * @property int $id_brigad
 * @property string $brigad_name
 * @property int $id_uprav
 * @property int $id_object
 * @property int $id_brigadir
 *
 * @property Objects $object
 * @property GraphicObjects[] $graphicObjects
 * @property Sotrudniki[] $sotrudnikis
 */
class Brigades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brigades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brigad_name', 'id_uprav', 'id_object', 'id_brigadir'], 'required'],
            [['id_uprav', 'id_object', 'id_brigadir'], 'integer'],
            [['brigad_name'], 'string', 'max' => 255],
            [['id_object'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['id_object' => 'id_object']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_brigad' => 'ID бригады',
            'brigad_name' => 'Название бригады',
            'id_uprav' => 'ID управления',
            'id_object' => 'ID объекта',
            'id_brigadir' => 'ID бригадира',
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

    /**
     * Gets query for [[GraphicObjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGraphicObjects()
    {
        return $this->hasMany(GraphicObjects::className(), ['id_brigad' => 'id_brigad']);
    }

    /**
     * Gets query for [[Sotrudnikis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSotrudnikis()
    {
        return $this->hasMany(Sotrudniki::className(), ['id_brigad' => 'id_brigad']);
    }
}
