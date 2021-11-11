<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "graphic_objects".
 *
 * @property int $id_type_job
 * @property int $id_object
 * @property string $date_nachalo
 * @property string $date_end
 * @property string $job_name
 * @property string $date_cdachi
 * @property int $id_brigad
 *
 * @property Objects $object
 * @property Brigades $brigad
 * @property Material[] $materials
 * @property Tehnika[] $tehnikas
 */
class GraphicObjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'graphic_objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_object', 'date_nachalo', 'date_end', 'job_name', 'date_cdachi', 'id_brigad'], 'required'],
            [['id_object', 'id_brigad'], 'integer'],
            [['date_nachalo', 'date_end', 'date_cdachi'], 'safe'],
            [['job_name'], 'string', 'max' => 255],
            [['id_object'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['id_object' => 'id_object']],
            [['id_brigad'], 'exist', 'skipOnError' => true, 'targetClass' => Brigades::className(), 'targetAttribute' => ['id_brigad' => 'id_brigad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_type_job' => 'Код вида работы',
            'id_object' => 'Код объекта',
            'date_nachalo' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'job_name' => 'Вид работы',
            'date_cdachi' => 'Дата сдачи',
            'id_brigad' => 'Код бригады',
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
     * Gets query for [[Brigad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrigad()
    {
        return $this->hasOne(Brigades::className(), ['id_brigad' => 'id_brigad']);
    }

    /**
     * Gets query for [[Materials]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id_type_job' => 'id_type_job']);
    }

    /**
     * Gets query for [[Tehnikas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTehnikas()
    {
        return $this->hasMany(Tehnika::className(), ['id_type_job' => 'id_type_job']);
    }
}
