<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentas".
 *
 * @property integer $id
 * @property string $fecha_apertura
 * @property integer $usuario_id
 *
 * @property Usuarios $usuario
 */
class Cuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuentas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_apertura'], 'safe'],
            [['usuario_id'], 'required'],
            [['usuario_id'], 'integer'],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_apertura' => 'Fecha Apertura',
            'usuario_id' => 'Usuario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id'])->inverseOf('cuentas');
    }
}
