<?php /* Smarty version 2.6.6, created on 2009-04-06 14:00:23
         compiled from pages/popup.tpl */ ?>
<!-- <?php echo 'pages/popup.tpl'; ?>
 --><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "popup_header.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div id="popup_content"><span class="title"><?php echo $this->_tpl_vars['title']; ?>
</span><span class="popupImg"><img src="userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['image']; ?>
" width="<?php echo $this->_tpl_vars['w']; ?>
"></span><span class="caption"><?php echo $this->_tpl_vars['caption']; ?>
</span></div><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "popup_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>