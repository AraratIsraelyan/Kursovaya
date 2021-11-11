<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tehnika".
 *
 * @property int $id_tehnika
 * @property int $id_object
 * @property string $tehnic_name
 * @property int $kolichestvo
 * @property int $id_type_job
 * @property int $id_uprav
 *
 * @property StroiUprav $uprav
 * @property GraphicObjects $typeJob
 */
class Tehnika extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tehnika';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_object', 'tehnic_name', 'kolichestvo', 'id_type_job', 'id_uprav'], 'required'],
            [['id_object', 'kolichestvo', 'id_type_job', 'id_uprav'], 'integer'],
            [['tehnic_name'], 'string', 'max' => 255],
            [['id_uprav'], 'exist', 'skipOnError' => true, 'targetClass' => StroiUprav::className(), 'targetAttribute' => ['id_uprav' => 'id_uprav']],
            [['id_type_job'], 'exist', 'skipOnError' => true, 'targetClass' => GraphicObjects::className(), 'targetAttribute' => ['id_type_job' => 'id_type_job']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tehnika' => 'ID техники',
            'id_object' => 'ID объекта',
            'tehnic_name' => 'Название техники',
            'kolichestvo' => 'Количество',
            'id_type_job' => 'ID типа работы',
            'id_uprav' => 'ID управления',
        ];
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
     * Gets query for [[TypeJob]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeJob()
    {
        return $this->hasOne(GraphicObjects::className(), ['id_type_job' => 'id_type_job']);
    }
}
