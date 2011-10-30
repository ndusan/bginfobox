<?php
/**
 * Template
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Template
{

        protected $variables = array();
        protected $_css = array();
        protected $_js = array();
        protected $_controller;
        protected $_action;
        protected $_layout;

        /**
         * Constructor
         * @param String $controller
         * @param String $action
         * @param String $layout
         * @return void
         */
        public function __construct($controller, $action, $layout)
        {
                $this->_controller = $controller;
                $this->_action = $action;
                $this->_layout = $layout;
        }

        /**
         * Set variable
         * @param $name
         * @param $value
         * @return void
         */
        function set($name,$value)
        {
                $this->variables[$name] = $value;
        }
        
        /**
         * Default array of css files
         * @param $array
         * @return void
         */
        function defaultCss($array)
        {
                for($i=0; $i<count($array); $i++)
                        $this->_css[$i] = $array[$i];
        }
        
        /**
         * Default array of js files
         * @param $array
         * @return void
         */
        function defaultJs($array)
        {
                for($i=0; $i<count($array); $i++)
                        $this->_js[$i] = $array[$i];
        }

        /**
         * Render 
         * @param $doNotRenderHeader
         * @return void
         */
        function render($renderHTML = 0) 
        {

            if(is_file('lib'.DS.'Html.php')){
                require_once 'lib'.DS.'Html.php';
                $html = new HTML;
            }
            extract($this->variables);
            
            if(is_file(LAYOUT_PATH.$this->_layout.'Layout.php') && $renderHTML){
                @include (LAYOUT_PATH.$this->_layout.'Layout.php');
            }else{
                @include (LAYOUT_PATH.'emptyLayout.php');
            }
        }
        
        
        function setView($view)
        {
            
            $this->_action = $view;
        }
    
}