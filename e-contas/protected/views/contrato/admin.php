<?php
/* @var $this ContratoController */
/* @var $model Contrato */

$this->breadcrumbs=array(
	'Contratos',
);

$this->menu=array(
	array('label'=>'Adicionar', 'url'=>array('create')),
	array('label'=>'Gerar REM', 'url'=>'#', 'linkOptions'=>array('onclick'=>'alert($.fn.yiiGridView.getSelection("contrato-grid"));')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contrato-grid').yiiGridView('update', {
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
	'id'=>'contrato-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>'2',
	'columns'=>array(
		'nu_Contrato',
		'nu_DiarioOficial',
		'de_ObjetivoContrato',
		'vl_Contrato',
		'dt_Publicacao',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
