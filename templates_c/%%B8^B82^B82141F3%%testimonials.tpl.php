<?php /* Smarty version 2.6.6, created on 2009-04-06 14:01:19
         compiled from pages/testimonials.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'pages/testimonials.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'pages/testimonials.tpl'; ?>
 -->
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
$this->_smarty_include(array('smarty_include_tpl_file' => "nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
$this->_sections['testimonialList']['name'] = 'testimonialList';
$this->_sections['testimonialList']['loop'] = is_array($_loop=$this->_tpl_vars['testimonialLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['testimonialList']['show'] = true;
$this->_sections['testimonialList']['max'] = $this->_sections['testimonialList']['loop'];
$this->_sections['testimonialList']['step'] = 1;
$this->_sections['testimonialList']['start'] = $this->_sections['testimonialList']['step'] > 0 ? 0 : $this->_sections['testimonialList']['loop']-1;
if ($this->_sections['testimonialList']['show']) {
    $this->_sections['testimonialList']['total'] = $this->_sections['testimonialList']['loop'];
    if ($this->_sections['testimonialList']['total'] == 0)
        $this->_sections['testimonialList']['show'] = false;
} else
    $this->_sections['testimonialList']['total'] = 0;
if ($this->_sections['testimonialList']['show']):

            for ($this->_sections['testimonialList']['index'] = $this->_sections['testimonialList']['start'], $this->_sections['testimonialList']['iteration'] = 1;
                 $this->_sections['testimonialList']['iteration'] <= $this->_sections['testimonialList']['total'];
                 $this->_sections['testimonialList']['index'] += $this->_sections['testimonialList']['step'], $this->_sections['testimonialList']['iteration']++):
$this->_sections['testimonialList']['rownum'] = $this->_sections['testimonialList']['iteration'];
$this->_sections['testimonialList']['index_prev'] = $this->_sections['testimonialList']['index'] - $this->_sections['testimonialList']['step'];
$this->_sections['testimonialList']['index_next'] = $this->_sections['testimonialList']['index'] + $this->_sections['testimonialList']['step'];
$this->_sections['testimonialList']['first']      = ($this->_sections['testimonialList']['iteration'] == 1);
$this->_sections['testimonialList']['last']       = ($this->_sections['testimonialList']['iteration'] == $this->_sections['testimonialList']['total']);
?>
</h1>
<span><?php echo $this->_tpl_vars['testimonialLoop'][$this->_sections['testimonialList']['index']]['trip']; ?>
 - <?php echo $this->_tpl_vars['testimonialLoop'][$this->_sections['testimonialList']['index']]['date']; ?>
</span></h2>
</p>
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>