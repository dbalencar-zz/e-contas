<?php
/* @var $this LicitacaoController */
/* @var $model Licitacao */

$this->breadcrumbs=array(
	'Licitações',
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Gerar REM', 'url'=>'#', 'linkOptions'=>array('onclick'=>'alert($.fn.yiiGridView.getSelection("licitacao-grid"));')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#licitacao-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar</h1>

<p>
Você pode opcionalmente usar um operador de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no início de cada um de seus valores para especificar como a comparação deve ser feita.
</p>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'licitacao-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nu_ProcessoLicitatorio',
		'nu_DiarioOficial',
		'de_ObjetoLicitacao',
		'dt_PublicacaoEdital',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
