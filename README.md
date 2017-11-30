```
//引用文件
use sunnnnn\select\Select;

//在ActiveForm中
<?= $form->field($model, 'select')->widget(Select::classname(), [
	'_items' => ['aaa', 'bbb', 'ccc'],
	'_placeholder' => '请选择',
	'_multiple' => true,
]); ?>

//不使用ActiveForm
<?= Select::widget([
	'name' => 'select',
	'_items' => ['aaa', 'bbb', 'ccc'],
	'_placeholder' => '请选择',
]); ?>
