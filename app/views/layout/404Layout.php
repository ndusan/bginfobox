<!-- This is a content that will be included on page inside of this layout -->
<? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
    include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>