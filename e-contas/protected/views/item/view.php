<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Licitação '.$model->licitacao->nu_ProcessoLicitatorio=>array('/licitacao/view','id'=>$model->licitacao_id),
	'Itens'=>array('admin','licitacao'=>$model->licitacao_id),
	$model->nu_SequencialItem,
);

$this->menu=array(
	array('label'=>'Cotações', 'url'=>array('/cotacao/admin','item'=>$model->id)),
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Deseja realmente excluir este item?')),
	array('label'=>'Gerar REM', 'url'=>array('geraREM', 'id'=>$model->id)),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'de_ItemLicitacao',
		'qt_ItemLicitado',
		'dt_HomologacaoItem',
		'dt_PublicacaoHomologacao',
		'cd_ItemLote',
	),
)); ?>
