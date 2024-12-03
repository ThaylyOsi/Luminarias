<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sectores".
 *
 * @property string $id_sector
 * @property string $nombre_sector
 * @property int $capacidad_sector
 *
 * @property Clases[] $clases
 * @property Luces[] $luces
 */
class Sectores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sectores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sector', 'nombre_sector', 'capacidad_sector'], 'required'],
            [['capacidad_sector'], 'integer'],
            [['id_sector'], 'string', 'max' => 2],
            [['nombre_sector'], 'string', 'max' => 20],
            [['id_sector'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sector' => Yii::t('app', 'Id Sector'),
            'nombre_sector' => Yii::t('app', 'Nombre Sector'),
            'capacidad_sector' => Yii::t('app', 'Capacidad Sector'),
        ];
    }

    /**
     * Gets query for [[Clases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::class, ['fk_sector' => 'id_sector']);
    }

    /**
     * Gets query for [[Luces]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLuces()
    {
        return $this->hasMany(Luces::class, ['fk_sector' => 'id_sector']);
    }
}
