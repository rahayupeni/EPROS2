<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property integer $idperusahaan
 * @property string $nama
 * @property string $phone
 * @property string $alamat
 * @property string $tanggal
 * @property string $cabang
 * @property string $gambar
 * @property string $latitude
 * @property string $longitude
 * @property string $iduser
 * @property string $acara
 * @property string $menerima
 * @property string $jangka_waktu
 * @property string $timbal_balik
 * @property string $sponsor
 * @property string $bukti
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'phone', 'alamat', 'tanggal', 'cabang', 'gambar', 'latitude', 'longitude', 'iduser', 'acara', 'menerima', 'jangka_waktu', 'timbal_balik', 'sponsor', 'bukti'], 'required'],
            [['alamat', 'acara', 'menerima', 'jangka_waktu', 'timbal_balik', 'sponsor', 'bukti'], 'string'],
            [['tanggal'], 'safe'],
            [['nama', 'cabang', 'latitude', 'longitude', 'iduser'], 'string', 'max' => 50],
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
            'idperusahaan' => 'Idperusahaan',
            'nama' => 'Nama',
            'phone' => 'Phone',
            'alamat' => 'Alamat',
            'tanggal' => 'Tanggal',
            'cabang' => 'Cabang',
            'gambar' => 'Gambar',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'iduser' => 'Iduser',
            'acara' => 'Acara',
            'menerima' => 'Menerima',
            'jangka_waktu' => 'Jangka Waktu',
            'timbal_balik' => 'Timbal Balik',
            'sponsor' => 'Sponsor',
            'bukti' => 'Bukti',
        ];
    }
}
