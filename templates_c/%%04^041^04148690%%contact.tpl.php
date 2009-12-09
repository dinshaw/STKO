<?php /* Smarty version 2.6.6, created on 2009-04-06 13:50:07
         compiled from pages/contact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'mailto', 'pages/contact.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'pages/contact.tpl'; ?>
 --><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div id="content"><h1 class="top">Contact</h1><p class="teaser">Mailing Address:</p><p class="lg">1941 Harrison Ave., Suite C</p><p class="lg">Butte, MT 59701</p><p class="teaser">Phone:</p><p class="lg">(406) 782-9532</p><p class="teaser">FAX:</p><p class="lg">(406) 723-0151</p><p class="teaser">Email:</p><p class="lg"><?php echo smarty_function_mailto(array('address' => "info@stocktonoutfitters.com",'encode' => 'javascript','subject' => 'Contact Form'), $this);?>
</p></div><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>