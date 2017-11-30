<?php
namespace sunnnnn\select; 

use yii\helpers\Html; 
use yii\helpers\Json; 
use yii\widgets\InputWidget; 

/**
 * https://select2.org
 * 
 * 
 * <?= $form->field($model, 'level')->widget(Select::className(), [
 *      '_items' => ['aaa', 'bbb', 'ccc'],
 *      '_placeholder' => '请选择',
 *      '_multiple' => true,
 *  ]); ?>
 *  
 *  
 *  
 *  <?= Select::widget([
 *      'name' => 'select',
 *      '_items' => ['aaa', 'bbb', 'ccc'],
 *      '_placeholder' => '请选择',
 *  ]); ?>
 * 
* @use: 
* @date: 2017年11月30日 下午3:12:40
* @author: sunnnnn [www.sunnnnn.com] [mrsunnnnn@qq.com]
 */
class Select extends InputWidget{
    
    public $_class = 'form-control';
    public $_items = [];           //选项数据
    public $_selection = null;     //默认选中
    public $_language  = 'zh-CN';  //语言
    public $_multiple  = false;    //是否多选
    public $_placeholder = null;   //占位符
    public $_options   = [];       //原生配置项
    
    public function run(){
        parent::run();
        $this->renderWidget();
    }
    
    public function renderWidget(){
        if(!empty($this->_class)){
            $this->options['class'] = empty($this->options['class']) ? $this->_class : $this->_class.' '.$this->options['class'];
        }
        
        if($this->_multiple === true){
            $this->options['multiple'] = 'multiple';
        }
        
        if($this->hasModel()){
            $input = Html::activeDropDownList($this->model, $this->attribute, $this->_items, $this->options);
        }else{
            $input = Html::dropDownList($this->name, $this->_selection, $this->_items, $this->options);
        }
        
        $this->renderAsset();
        echo $input;
    }
    
    public function renderAsset(){
        $view = $this->getView();
        
        SelectAsset::register($view);
        
        $min = $max = '';
        if(!empty($this->_options)){
            $options = $this->getJsonOptions($this->_options);
            $js =   "$(function(){ 
                $('#{$this->options['id']}').select2({$options}); 
            })";
        }else{
            $js =   "$(function(){
                $('#{$this->options['id']}').select2({
                    language:'{$this->_language}',
                    placeholder:'{$this->_placeholder}',
                    allowClear:true,
                });
            })";
        }
        
        $view->registerJs($js, $view::POS_END);
    }
    
    private function getJsonOptions($array){
        return Json::encode($array);
    }
    
}
