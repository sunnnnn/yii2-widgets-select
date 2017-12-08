# yii2-widgets-select


## 安装

    composer require sunnnnn/yii2-widgets-select

## 使用 ##

 - 在ActiveForm中

```php
<?= $form->field($model, 'select')->widget(\sunnnnn\select\Select::className(), [
    '_items' => ['aaa', 'bbb', 'ccc'],
]); ?>
```

 - 不使用ActiveForm
 
```php
\sunnnnn\select\Select::widget([
    'name' => 'select',
    '_items' => ['aaa', 'bbb', 'ccc'],
]);
```

 - 相关参数
 
```php
<?= $form->field($model, 'select')->widget(\sunnnnn\select\Select::className(), [
    '_items' => ['aaa', 'bbb', 'ccc'],   //选项
    '_placeholder' => '占位符',
    '_multiple' => true,  //是否多选
    '_clear' => true, //是否允许清除当前选中项 ，默认false
    '_options' => [],  //原生配置
]); ?>
```
