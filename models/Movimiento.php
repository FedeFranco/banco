<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimientos".
 *
 * @property integer $id
 * @property string $fecha_aparicion
 * @property string $concepto
 * @property string $importe
 * @property integer $cuenta_id
 *
 * @property Movimiento $cuenta
 * @property Movimiento[] $movimientos
 */
class Movimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_aparicion'], 'safe'],
            [['concepto', 'importe', 'cuenta_id'], 'required'],
            [['concepto'], 'string'],
            [['importe'], 'number'],
            [['cuenta_id'], 'integer'],
            [['cuenta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movimiento::className(), 'targetAttribute' => ['cuenta_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_aparicion' => 'Fecha Aparicion',
            'concepto' => 'Concepto',
            'importe' => 'Importe',
            'cuenta_id' => 'Cuenta ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta()
    {
        return $this->hasOne(Movimiento::className(), ['id' => 'cuenta_id'])->inverseOf('movimientos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimiento::className(), ['cuenta_id' => 'id'])->inverseOf('cuenta');
    }
}
