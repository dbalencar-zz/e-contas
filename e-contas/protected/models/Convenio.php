<?php

/**
 * This is the model class for table "convenio".
 *
 * The followings are the available columns in table 'convenio':
 * @property string $id
 * @property string $tp_EsferaConvenio
 * @property string $st_RecebeValor
 * @property string $nu_Convenio
 * @property integer $vl_Convenio
 * @property integer $cd_MoedaConvenio
 * @property integer $dt_AssinaturaConvenio
 * @property string $de_ObjetivoConvenio
 * @property integer $dt_VencimentoConvenio
 * @property integer $nu_LeiAutorizativa
 * @property integer $dt_LeiAutorizativa
 * @property integer $nu_DiarioOficial
 * @property integer $dt_PublicacaoConvenio
 * @property integer $tp_Convenio
 */
class Convenio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Convenio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tp_EsferaConvenio, st_RecebeValor, nu_Convenio, cd_MoedaConvenio, dt_AssinaturaConvenio, de_ObjetivoConvenio, dt_VencimentoConvenio, nu_LeiAutorizativa, dt_LeiAutorizativa, nu_DiarioOficial, dt_PublicacaoConvenio, tp_Convenio', 'required'),
			array('cd_MoedaConvenio, nu_LeiAutorizativa, nu_DiarioOficial, tp_Convenio', 'numerical', 'integerOnly'=>true),
			array('dt_AssinaturaConvenio, dt_VencimentoConvenio, dt_LeiAutorizativa, dt_PublicacaoConvenio', 'date', 'format'=>'dd/MM/yyyy'),
			array('vl_Convenio', 'numerical', 'numberPattern'=>'/([0-9][0-9]*?)(\.[0-9]{2})/', 'message'=>'{attribute} deve ter duas casas decimais, separadas por um ponto.'),
			array('tp_EsferaConvenio, st_RecebeValor', 'length', 'max'=>1),
			array('nu_Convenio', 'length', 'max'=>16),
			array('de_ObjetivoConvenio', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tp_EsferaConvenio, st_RecebeValor, nu_Convenio, vl_Convenio, cd_MoedaConvenio, dt_AssinaturaConvenio, de_ObjetivoConvenio, dt_VencimentoConvenio, nu_LeiAutorizativa, dt_LeiAutorizativa, nu_DiarioOficial, dt_PublicacaoConvenio, tp_Convenio', 'safe', 'on'=>'search'),
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
			'moeda'=>array(self::BELONGS_TO,'TipoMoeda','cd_MoedaConvenio'),
			'tipo'=>array(self::BELONGS_TO,'TipoConvenio','tp_Convenio'),
			'esfera'=>array(self::BELONGS_TO,'EsferaConveniado','tp_EsferaConvenio'),
			'participantes'=>array(self::HAS_MANY,'ParticipanteConvenio','convenio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tp_EsferaConvenio' => 'Esfera',
			'esfera.descricao' => 'Esfera',
			'st_RecebeValor' => 'Recebe Valor',
			'recebeValorText' => 'Recebe Valor',
			'nu_Convenio' => 'Número',
			'vl_Convenio' => 'Valor',
			'cd_MoedaConvenio' => 'Moeda',
			'moeda.descricao' => 'Moeda',
			'dt_AssinaturaConvenio' => 'Dt. Assinatura',
			'de_ObjetivoConvenio' => 'Objeto',
			'dt_VencimentoConvenio' => 'Dt. Vencimento',
			'nu_LeiAutorizativa' => 'Lei Autorizativa',
			'dt_LeiAutorizativa' => 'Dt. Lei Autorizativa',
			'nu_DiarioOficial' => 'DOE',
			'dt_PublicacaoConvenio' => 'Dt. Publicação',
			'tp_Convenio' => 'Tipo',
			'tipo.descricao' => 'Tipo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tp_EsferaConvenio',$this->tp_EsferaConvenio,true);
		$criteria->compare('st_RecebeValor',$this->st_RecebeValor,true);
		$criteria->compare('nu_Convenio',$this->nu_Convenio,true);
		$criteria->compare('vl_Convenio',$this->vl_Convenio);
		$criteria->compare('cd_MoedaConvenio',$this->cd_MoedaConvenio);
		$criteria->compare('dt_AssinaturaConvenio',$this->dt_AssinaturaConvenio);
		$criteria->compare('de_ObjetivoConvenio',$this->de_ObjetivoConvenio,true);
		$criteria->compare('dt_VencimentoConvenio',$this->dt_VencimentoConvenio);
		$criteria->compare('nu_LeiAutorizativa',$this->nu_LeiAutorizativa);
		$criteria->compare('dt_LeiAutorizativa',$this->dt_LeiAutorizativa);
		$criteria->compare('nu_DiarioOficial',$this->nu_DiarioOficial);
		$criteria->compare('dt_PublicacaoConvenio',$this->dt_PublicacaoConvenio);
		$criteria->compare('tp_Convenio',$this->tp_Convenio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function formataREM()
	{
		$formatado=$this->tp_EsferaConvenio;
		$formatado.=$this->st_RecebeValor;
		$formatado.=str_pad($this->nu_Convenio, 16, chr(32), STR_PAD_RIGHT);
		$formatado.=str_pad($this->formataValor($this->vl_Convenio), 16, '0', STR_PAD_LEFT);
		$formatado.=str_pad($this->cd_MoedaConvenio, 3, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_AssinaturaConvenio);
		$formatado.=str_pad($this->de_ObjetivoConvenio, 50, chr(32), STR_PAD_RIGHT);
		$formatado.=$this->formataData($this->dt_VencimentoConvenio);
		$formatado.=str_pad($this->nu_LeiAutorizativa, 6, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_LeiAutorizativa);
		$formatado.=str_pad($this->nu_DiarioOficial, 6, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_PublicacaoConvenio);
		$formatado.=str_pad($this->tp_Convenio, 2, '0', STR_PAD_LEFT);
		$formatado.=chr(13).chr(10);
		
		return $formatado;
	}
	
	public function getSimNaoOptions()
	{
		return array(
			'S'=>'Sim',
			'N'=>'Não',
		);
	}
	
	public function getRecebeValorText()
	{
		$options=$this->simNaoOptions;
		return $options[$this->st_RecebeValor];
	}
	
	private function formataValor($valor)
	{
		return str_replace('.', ',', $valor);
	}
	
	private function formataData($data)
	{
		return date('Ymd', CDateTimeParser::parse($data, Yii::app()->locale->dateFormat));
	}
	
	protected function beforeSave()
	{
		foreach($this->metadata->tableSchema->columns as $columnName => $column)
		{
			if ($column->dbType == 'date')
			{
				$this->$columnName = date('Y-m-d', CDateTimeParser::parse($this->$columnName, Yii::app()->locale->dateFormat));
			}
			elseif ($column->dbType == 'datetime')
			{
				$this->$columnName = date('Y-m-d H:i:s', CDateTimeParser::parse($this->$columnName, Yii::app()->locale->dateFormat));
			}
		}
	
		return parent::beforeSave();
	}
	
	protected function afterFind()
	{
		foreach($this->metadata->tableSchema->columns as $columnName => $column)
		{
			if (!strlen($this->$columnName)) continue;
	
			if ($column->dbType == 'date')
			{
				$this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd'),'medium',null);
			}
			elseif ($column->dbType == 'datetime')
			{
				$this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd hh:mm:ss'));
			}
		}
	
		return parent::afterFind();
	}
}