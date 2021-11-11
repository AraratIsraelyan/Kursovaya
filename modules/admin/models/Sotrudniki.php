<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sotrudniki".
 *
 * @property int $id_sotrudnika
 * @property int $id_brigad
 * @property string $firstname
 * @property string $surname
 * @property string $date_birth
 * @property string $date_naim
 * @property int $passport
 * @property string $phone_number
 * @property int $id_dolzhnosti
 *
 * @property Dolzhnosti $dolzhnosti
 * @property Brigades $brigad
 */
class Sotrudniki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sotrudniki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_brigad', 'firstname', 'surname', 'date_birth', 'date_naim', 'passport', 'phone_number', 'id_dolzhnosti'], 'required'],
            [['id_brigad', 'passport', 'id_dolzhnosti'], 'integer'],
            [['date_birth', 'date_naim'], 'safe'],
            [['firstname', 'surname'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
            [['id_dolzhnosti'], 'exist', 'skipOnError' => true, 'targetClass' => Dolzhnosti::className(), 'targetAttribute' => ['id_dolzhnosti' => 'id_dolzhnosti']],
            [['id_brigad'], 'exist', 'skipOnError' => true, 'targetClass' => Brigades::className(), 'targetAttribute' => ['id_brigad' => 'id_brigad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sotrudnika' => 'ID сотрудника',
           'id_brigad' => 'ID бригады',
            'firstname' => 'Имя',
            'surname' => 'Фамилия',
            'date_birth' => 'Дата рождения',
            'date_naim' => 'Дата найма',
            'passport' => 'Паспортные данные',
            'phone_number' => 'Номер телефона',
            'id_dolzhnosti' => 'ID должности',
        ];
    }

    /**
     * Gets query for [[Dolzhnosti]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDolzhnosti()
    {
        return $this->hasOne(Dolzhnosti::className(), ['id_dolzhnosti' => 'id_dolzhnosti']);
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
}
