<?php

namespace app\models;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $type
 * @property int $inn
 * @property string $organisation_name
 */
class Users extends \yii\db\ActiveRecord
{
    const TYPE_FIZ = 1;
    const TYPE_IP = 2;
    const TYPE_ORG = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios [self::TYPE_FIZ] = ['name', 'email', 'type'];
        $scenarios [self::TYPE_IP] = ['name', 'email', 'inn', 'type'];
        $scenarios [self::TYPE_ORG] = ['inn', 'organisation_name', 'type'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['name','email','type','inn','organisation_name'] , 'required'],
            ['email', 'email'],
            ['inn', 'integer', 'integerOnly' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'email' => 'E-mail',
            'type' => 'Тип',
            'inn' => 'ИНН',
            'organisation_name' => 'Наименование организации',
        ];
    }

    public function getUserTypes()
    {
        return [
            self::TYPE_FIZ => 'Физическое лицо',
            self::TYPE_IP => 'ИП',
            self::TYPE_ORG => 'Организация',
        ];
    }
}
