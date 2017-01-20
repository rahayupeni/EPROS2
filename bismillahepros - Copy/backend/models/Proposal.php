<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proposal".
 *
 * @property integer $idproposal
 * @property string $dari
 * @property string $ke
 * @property string $file
 * @property string $k_pengirim
 * @property string $k_admin
 * @property string $level
 * @property string $status
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proposal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dari', 'ke', 'file', 'k_pengirim', 'k_admin', 'level', 'status'], 'required'],
            [['file', 'k_pengirim', 'k_admin'], 'string'],
            [['dari', 'ke'], 'string', 'max' => 50],
            [['level', 'status'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproposal' => 'Idproposal',
            'dari' => 'Pengirim',
            'ke' => 'Penerima',
            'file' => 'File',
            'k_pengirim' => 'Komentar Pengirim',
            'k_admin' => 'Komentar Admin',
            'level' => 'Level Ratting',
            'status' => 'Status',
        ];
    }
}
