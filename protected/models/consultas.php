<?php

/**
 * This is the model class for table "consultas".
 *
 * The followings are the available columns in table 'consultas':
 * @property integer $id
 * @property string $identificacion
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_creacion
 * @property string $fecha_anulacion
 * @property string $correo_electronico
 * @property string $direccion
 * @property string $telefono
 * @property string $documento_consentimiento
 */
class Consultas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consultas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identificacion, fecha_creacion', 'required'),
			array('identificacion, nombre, apellido, correo_electronico', 'length', 'max'=>50),
			array('direccion, documento_consentimiento', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>10),
			array('fecha_anulacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, identificacion, nombre, apellido, fecha_creacion, fecha_anulacion, correo_electronico, direccion, telefono, documento_consentimiento', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'identificacion' => 'Identificacion',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_anulacion' => 'Fecha Anulacion',
			'correo_electronico' => 'Correo Electronico',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'documento_consentimiento' => 'Documento Consentimiento',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('identificacion',$this->identificacion,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_anulacion',$this->fecha_anulacion,true);
		$criteria->compare('correo_electronico',$this->correo_electronico,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('documento_consentimiento',$this->documento_consentimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consultas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
