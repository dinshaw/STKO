<?php /* Smarty version 2.6.6, created on 2009-04-07 15:54:50
         compiled from pages/press.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'pages/press.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'pages/press.tpl'; ?>
 -->
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
$this->_sections['imageList']['name'] = 'imageList';
$this->_sections['imageList']['loop'] = is_array($_loop=$this->_tpl_vars['imageLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['imageList']['show'] = true;
$this->_sections['imageList']['max'] = $this->_sections['imageList']['loop'];
$this->_sections['imageList']['step'] = 1;
$this->_sections['imageList']['start'] = $this->_sections['imageList']['step'] > 0 ? 0 : $this->_sections['imageList']['loop']-1;
if ($this->_sections['imageList']['show']) {
    $this->_sections['imageList']['total'] = $this->_sections['imageList']['loop'];
    if ($this->_sections['imageList']['total'] == 0)
        $this->_sections['imageList']['show'] = false;
} else
    $this->_sections['imageList']['total'] = 0;
if ($this->_sections['imageList']['show']):

            for ($this->_sections['imageList']['index'] = $this->_sections['imageList']['start'], $this->_sections['imageList']['iteration'] = 1;
                 $this->_sections['imageList']['iteration'] <= $this->_sections['imageList']['total'];
                 $this->_sections['imageList']['index'] += $this->_sections['imageList']['step'], $this->_sections['imageList']['iteration']++):
$this->_sections['imageList']['rownum'] = $this->_sections['imageList']['iteration'];
$this->_sections['imageList']['index_prev'] = $this->_sections['imageList']['index'] - $this->_sections['imageList']['step'];
$this->_sections['imageList']['index_next'] = $this->_sections['imageList']['index'] + $this->_sections['imageList']['step'];
$this->_sections['imageList']['first']      = ($this->_sections['imageList']['iteration'] == 1);
$this->_sections['imageList']['last']       = ($this->_sections['imageList']['iteration'] == $this->_sections['imageList']['total']);
?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
');txtChg('caption','<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['caption']; ?>
')""><img src="userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
"></a>
/<?php echo $this->_tpl_vars['the_image']; ?>
" width="150">
</span>
$this->_sections['pressList']['name'] = 'pressList';
$this->_sections['pressList']['loop'] = is_array($_loop=$this->_tpl_vars['pressLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pressList']['show'] = true;
$this->_sections['pressList']['max'] = $this->_sections['pressList']['loop'];
$this->_sections['pressList']['step'] = 1;
$this->_sections['pressList']['start'] = $this->_sections['pressList']['step'] > 0 ? 0 : $this->_sections['pressList']['loop']-1;
if ($this->_sections['pressList']['show']) {
    $this->_sections['pressList']['total'] = $this->_sections['pressList']['loop'];
    if ($this->_sections['pressList']['total'] == 0)
        $this->_sections['pressList']['show'] = false;
} else
    $this->_sections['pressList']['total'] = 0;
if ($this->_sections['pressList']['show']):

            for ($this->_sections['pressList']['index'] = $this->_sections['pressList']['start'], $this->_sections['pressList']['iteration'] = 1;
                 $this->_sections['pressList']['iteration'] <= $this->_sections['pressList']['total'];
                 $this->_sections['pressList']['index'] += $this->_sections['pressList']['step'], $this->_sections['pressList']['iteration']++):
$this->_sections['pressList']['rownum'] = $this->_sections['pressList']['iteration'];
$this->_sections['pressList']['index_prev'] = $this->_sections['pressList']['index'] - $this->_sections['pressList']['step'];
$this->_sections['pressList']['index_next'] = $this->_sections['pressList']['index'] + $this->_sections['pressList']['step'];
$this->_sections['pressList']['first']      = ($this->_sections['pressList']['iteration'] == 1);
$this->_sections['pressList']['last']       = ($this->_sections['pressList']['iteration'] == $this->_sections['pressList']['total']);
?>
</h2>
" width="150">
</span>
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>