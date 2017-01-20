<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $level
 * @property string $vemail
 * @property string $vsms
 * @property string $vbukti
 * @property string $vupdate
 * @property string $tanggal
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'authKey', 'level', 'vemail', 'vsms', 'vbukti', 'vupdate', 'tanggal'], 'required'],
            [['level'], 'string'],
            [['tanggal'], 'safe'],
            [['username', 'email', 'password'], 'string', 'max' => 50],
            [['authKey'], 'string', 'max' => 7],
            [['vemail', 'vsms', 'vbukti', 'vupdate'], 'string', 'max' => 1],
            [['username'], 'unique'],
            ['email', 'email'],
            [['authKey'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'level' => 'Level',
            'vemail' => 'Vemail',
            'vsms' => 'Vsms',
            'vbukti' => 'Vbukti',
            'vupdate' => 'Vupdate',
            'tanggal' => 'Tanggal',
        ];
    }
}
