<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "luces".
 *
 * @property string $id_luz
 * @property string $fk_sector
 * @property int $estado_luz
 * @property string $last_update
 *
 * @property Sectores $fkSector
 */
class Luces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'luces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_luz', 'fk_sector', 'estado_luz', 'last_update'], 'required'],
            [['estado_luz'], 'integer'],
            [['last_update'], 'safe'],
            [['id_luz', 'fk_sector'], 'string', 'max' => 2],
            [['id_luz'], 'unique'],
            [['fk_sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sectores::class, 'targetAttribute' => ['fk_sector' => 'id_sector']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_luz' => Yii::t('app', 'Id Luz'),
            'fk_sector' => Yii::t('app', 'Fk Sector'),
            'estado_luz' => Yii::t('app', 'Estado Luz'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * Gets query for [[FkSector]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkSector()
    {
        return $this->hasOne(Sectores::class, ['id_sector' => 'fk_sector']);
    }
}
