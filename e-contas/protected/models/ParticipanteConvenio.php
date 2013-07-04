<?php

/**
 * This is the model class for table "participante_convenio".
 *
 * The followings are the available columns in table 'participante_convenio':
 * @property string $id
 * @property integer $cd_CicParticipante
 * @property integer $tp_PessoaParticipante
 * @property string $nm_Participante
 * @property double $vl_Participacao
 * @property double $vl_PercentualParticipacao
 * @property string $nu_CertidaoCASAN
 * @property string $dt_CertidaoCASAN
 * @property string $dt_ValidadeCertidaoCASAN
 * @property string $nu_CertidaoCELESC
 * @property string $dt_CertidaoCELESC
 * @property string $dt_ValidadeCertidaoCELESC
 * @property string $nu_CertidaoIPESC
 * @property string $dt_CertidaoIPESC
 * @property string $dt_ValidadeCertidaoIPESC
 * @property string $nu_CertidaoFazendaMunicipal
 * @property string $dt_CertidaoFazendaMunicipal
 * @property string $dt_ValidadeFazendaMunicipal
 * @property string $nu_CertidaoFazendaFederal
 * @property string $dt_CertidaoFazendaFederal
 * @property string $dt_ValidadeFazendaFederal
 * @property string $nu_CertidaoOutras
 * @property string $dt_CertidaoOutras
 * @property string $dt_ValidadeCertidaoOutras
 */
class ParticipanteConvenio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ParticipanteConvenio the static model class
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
		return 'participante_convenio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_CicParticipante, tp_PessoaParticipante, nm_Participante, vl_Participacao, vl_PercentualParticipacao, nu_CertidaoCASAN, dt_CertidaoCASAN, dt_ValidadeCertidaoCASAN, nu_CertidaoCELESC, dt_CertidaoCELESC, dt_ValidadeCertidaoCELESC, nu_CertidaoIPESC, dt_CertidaoIPESC, dt_ValidadeCertidaoIPESC, nu_CertidaoFazendaMunicipal, dt_CertidaoFazendaMunicipal, dt_ValidadeFazendaMunicipal, nu_CertidaoFazendaFederal, dt_CertidaoFazendaFederal, dt_ValidadeFazendaFederal, nu_CertidaoOutras, dt_CertidaoOutras, dt_ValidadeCertidaoOutras', 'required'),
			array('cd_CicParticipante, tp_PessoaParticipante', 'numerical', 'integerOnly'=>true),
			array('dt_CertidaoCASAN, dt_ValidadeCertidaoCASAN, dt_CertidaoCELESC, dt_ValidadeCertidaoCELESC, dt_CertidaoIPESC, dt_ValidadeCertidaoIPESC, dt_CertidaoFazendaMunicipal, dt_ValidadeFazendaMunicipal, dt_CertidaoFazendaFederal, dt_ValidadeFazendaFederal, dt_CertidaoOutras, dt_ValidadeCertidaoOutras', 'date', 'format'=>'dd/MM/yyyy'),
			array('vl_Participacao, vl_PercentualParticipacao', 'numerical', 'numberPattern'=>'/([0-9][0-9]*?)(\.[0-9]{2})/', 'message'=>'{attribute} deve ter duas casas decimais, separadas por um ponto.'),
			array('nm_Participante', 'length', 'max'=>50),
			array('nu_CertidaoCASAN, nu_CertidaoCELESC, nu_CertidaoIPESC, nu_CertidaoFazendaMunicipal, nu_CertidaoFazendaFederal, nu_CertidaoOutras', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cd_CicParticipante, tp_PessoaParticipante, nm_Participante, vl_Participacao, vl_PercentualParticipacao, nu_CertidaoCASAN, dt_CertidaoCASAN, dt_ValidadeCertidaoCASAN, nu_CertidaoCELESC, dt_CertidaoCELESC, dt_ValidadeCertidaoCELESC, nu_CertidaoIPESC, dt_CertidaoIPESC, dt_ValidadeCertidaoIPESC, nu_CertidaoFazendaMunicipal, dt_CertidaoFazendaMunicipal, dt_ValidadeFazendaMunicipal, nu_CertidaoFazendaFederal, dt_CertidaoFazendaFederal, dt_ValidadeFazendaFederal, nu_CertidaoOutras, dt_CertidaoOutras, dt_ValidadeCertidaoOutras', 'safe', 'on'=>'search'),
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
			'convenio'=>array(self::BELONGS_TO,'Convenio','convenio_id'),
			'pessoa'=>array(self::BELONGS_TO,'TipoPessoa','cd_PessoaParticipante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cd_CicParticipante' => 'CPF/CNPJ',
			'tp_PessoaParticipante' => 'Tipo Pessoa',
			'nm_Participante' => 'Nome',
			'vl_Participacao' => 'Valor de Participação',
			'vl_PercentualParticipacao' => 'Percentual de Participação',
			'nu_CertidaoCASAN' => 'Certidão CASAN',
			'dt_CertidaoCASAN' => 'Data CASAN',
			'dt_ValidadeCertidaoCASAN' => 'Validade CASAN',
			'nu_CertidaoCELESC' => 'Certidão CELESC',
			'dt_CertidaoCELESC' => 'Data CELESC',
			'dt_ValidadeCertidaoCELESC' => 'Validade CELESC',
			'nu_CertidaoIPESC' => 'Certidão IPESC',
			'dt_CertidaoIPESC' => 'Data IPESC',
			'dt_ValidadeCertidaoIPESC' => 'Validade IPESC',
			'nu_CertidaoFazendaMunicipal' => 'Certidão da Fazenda Municipal',
			'dt_CertidaoFazendaMunicipal' => 'Data Fazenda Municipal',
			'dt_ValidadeFazendaMunicipal' => 'Validade Fazenda Municipal',
			'nu_CertidaoFazendaFederal' => 'Certidão da Fazenda Federal',
			'dt_CertidaoFazendaFederal' => 'Data Fazenda Federal',
			'dt_ValidadeFazendaFederal' => 'Validade Fazenda Federal',
			'nu_CertidaoOutras' => 'Outra Certidão',
			'dt_CertidaoOutras' => 'Data Outra Certidão',
			'dt_ValidadeCertidaoOutras' => 'Validade Outra Certidão',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($convenio)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('convenio_id', $convenio->id);
		$criteria->compare('cd_CicParticipante',$this->cd_CicParticipante);
		$criteria->compare('tp_PessoaParticipante',$this->tp_PessoaParticipante);
		$criteria->compare('nm_Participante',$this->nm_Participante,true);
		$criteria->compare('vl_Participacao',$this->vl_Participacao);
		$criteria->compare('vl_PercentualParticipacao',$this->vl_PercentualParticipacao);
		$criteria->compare('nu_CertidaoCASAN',$this->nu_CertidaoCASAN,true);
		$criteria->compare('dt_CertidaoCASAN',$this->dt_CertidaoCASAN,true);
		$criteria->compare('dt_ValidadeCertidaoCASAN',$this->dt_ValidadeCertidaoCASAN,true);
		$criteria->compare('nu_CertidaoCELESC',$this->nu_CertidaoCELESC,true);
		$criteria->compare('dt_CertidaoCELESC',$this->dt_CertidaoCELESC,true);
		$criteria->compare('dt_ValidadeCertidaoCELESC',$this->dt_ValidadeCertidaoCELESC,true);
		$criteria->compare('nu_CertidaoIPESC',$this->nu_CertidaoIPESC,true);
		$criteria->compare('dt_CertidaoIPESC',$this->dt_CertidaoIPESC,true);
		$criteria->compare('dt_ValidadeCertidaoIPESC',$this->dt_ValidadeCertidaoIPESC,true);
		$criteria->compare('nu_CertidaoFazendaMunicipal',$this->nu_CertidaoFazendaMunicipal,true);
		$criteria->compare('dt_CertidaoFazendaMunicipal',$this->dt_CertidaoFazendaMunicipal,true);
		$criteria->compare('dt_ValidadeFazendaMunicipal',$this->dt_ValidadeFazendaMunicipal,true);
		$criteria->compare('nu_CertidaoFazendaFederal',$this->nu_CertidaoFazendaFederal,true);
		$criteria->compare('dt_CertidaoFazendaFederal',$this->dt_CertidaoFazendaFederal,true);
		$criteria->compare('dt_ValidadeFazendaFederal',$this->dt_ValidadeFazendaFederal,true);
		$criteria->compare('nu_CertidaoOutras',$this->nu_CertidaoOutras,true);
		$criteria->compare('dt_CertidaoOutras',$this->dt_CertidaoOutras,true);
		$criteria->compare('dt_ValidadeCertidaoOutras',$this->dt_ValidadeCertidaoOutras,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function formataREM()
	{	
		$formatado=str_pad($this->cd_CicParticipante, 14, '0', STR_PAD_LEFT);
		$formatado.=$this->tp_PessoaParticipante;
		$formatado.=str_pad($this->nm_Participante, 50, chr(32), STR_PAD_RIGHT);
		$formatado.=str_pad($this->formataValor($this->vl_Participacao), 16, '0', STR_PAD_LEFT);
		$formatado.=str_pad($this->vl_PercentualParticipacao, 7, '0', STR_PAD_LEFT);
		$formatado.=str_pad($this->nu_CertidaoCASAN, 16, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_CertidaoCASAN);
		$formatado.=$this->formataData($this->dt_ValidadeCertidaoCASAN);
		$formatado.=str_pad($this->nu_CertidaoCELESC, 16, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_CertidaoCELESC);
		$formatado.=$this->formataData($this->dt_ValidadeCertidaoCELESC);
		$formatado.=str_pad($this->nu_CertidaoIPESC, 16, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_CertidaoIPESC);
		$formatado.=$this->formataData($this->dt_ValidadeCertidaoIPESC);
		$formatado.=str_pad($this->nu_CertidaoFazendaMunicipal, 16, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_CertidaoFazendaMunicipal);
		$formatado.=$this->formataData($this->dt_ValidadeFazendaMunicipal);
		$formatado.=str_pad($this->nu_CertidaoFazendaFederal, 16, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_CertidaoFazendaFederal);
		$formatado.=$this->formataData($this->dt_ValidadeFazendaFederal);
		$formatado.=str_pad($this->nu_CertidaoOutras, 16, '0', STR_PAD_LEFT);
		$formatado.=$this->formataData($this->dt_CertidaoOutras);
		$formatado.=$this->formataData($this->dt_ValidadeCertidaoOutras);
		$formatado.=str_pad($this->convenio->nu_Convenio, 16, chr(32), STR_PAD_RIGHT);
		$formatado.=chr(13).chr(10);
	
		return $formatado;
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