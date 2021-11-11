<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $id_material
 * @property string $material_name
 * @property int $id_type_job
 * @property int $kolvo
 * @property int $ispolzovano
 * @property int $stoimost
 *
 * @property GraphicObjects $typeJob
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material_name', 'id_type_job', 'kolvo', 'ispolzovano', 'stoimost'], 'required'],
            [['id_type_job', 'kolvo', 'ispolzovano', 'stoimost'], 'integer'],
            [['material_name'], 'string', 'max' => 255],
            [['id_type_job'], 'exist', 'skipOnError' => true, 'targetClass' => GraphicObjects::className(), 'targetAttribute' => ['id_type_job' => 'id_type_job']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material' => 'Код материала',
            'material_name' => 'Наименование материала',
            'id_type_job' => 'Код типа работы',
            'kolvo' => 'Количество',
            'ispolzovano' => 'Использовано',
            'stoimost' => 'Стоимость',
        ];
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
