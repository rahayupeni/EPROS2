<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "komunitas".
 *
 * @property integer $idkomunitas
 * @property integer $iduser
 * @property string $nama
 * @property string $phone
 * @property string $alamat
 * @property string $tanggal
 * @property string $cabang
 * @property string $gambar
 * @property string $latitude
 * @property string $longitude
 * @property string $bukti
 */
class Komunitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komunitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'nama', 'phone', 'alamat', 'tanggal', 'cabang', 'gambar', 'latitude', 'longitude', 'bukti'], 'required'],
            [['iduser'], 'integer'],
            [['alamat', 'bukti'], 'string'],
            [['tanggal'], 'safe'],
            [['nama', 'cabang', 'latitude', 'longitude'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['gambar'], 'string', 'max' => 100],
            [['iduser'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idkomunitas' => 'Idkomunitas',
            'iduser' => 'Iduser',
            'nama' => 'Nama',
            'phone' => 'Phone',
            'alamat' => 'Alamat',
            'tanggal' => 'Tanggal',
            'cabang' => 'Cabang',
            'gambar' => 'Gambar',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'bukti' => 'Bukti',
        ];
    }
}
