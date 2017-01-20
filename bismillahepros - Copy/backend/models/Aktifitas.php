<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aktifitas".
 *
 * @property integer $id
 * @property string $kepada
 * @property string $pesan
 * @property string $status
 */
class Aktifitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aktifitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kepada', 'pesan', 'status'], 'required'],
            [['kepada', 'pesan'], 'string'],
            [['status'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kepada' => 'Kepada',
            'pesan' => 'Pesan',
            'status' => 'Status',
        ];
    }
}
