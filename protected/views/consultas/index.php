<?php
/* @var $this ConsultasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Consultas',
);

?>

<h1>CONSULTAS</h1>
<div class="wide form">
<?php 

	$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); 
?>
<?php $this->endWidget(); ?>
</div>
<?php 
Yii::app()->getClientScript()->registerScript(
"activador_script",
"
	$(document).on('click','[rel=link_activador]',function(e) {
	   	e.preventDefault();
	   	var a = $(this).find('a');
		$.ajax({ url: a.attr('href'), type: 'post', 
			success: function(newlabel){
			a.html(newlabel);
		}, error: function(e){ alert('error:'+e.responseText); }});
	 });

",CClientScript::POS_HEAD);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'consultas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectableRows'=>2,
	'columns'=>array(
		//'id',
		'identificacion',
		'nombre',
		'apellido',
		'fecha_creacion',
		'fecha_anulacion',
		'correo_electronico',
		array(
			'class'=>'CLinkColumn',
			'header'=>'Consentimiento',
			'label'=>'Ver Archivo',
			'htmlOptions'=>array('rel'=>'link_activador'),
		),
		/*'direccion',
		'telefono',
		'documento_consentimiento',
		*/
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
</div>
