<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pesanadmin".
 *
 * @property integer $id
 * @property string $pesan
 */
class Pesanadmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesanadmin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pesan'], 'required'],
            [['pesan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pesan' => 'Pesan',
        ];
    }
}
