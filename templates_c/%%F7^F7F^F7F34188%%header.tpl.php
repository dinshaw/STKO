<?php /* Smarty version 2.6.6, created on 2009-04-06 13:12:43
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'header.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'header.tpl'; ?>
 -->
</title>
" />
$this->_smarty_include(array('smarty_include_tpl_file' => "nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h2>
$this->_sections['sidebarList']['name'] = 'sidebarList';
$this->_sections['sidebarList']['loop'] = is_array($_loop=$this->_tpl_vars['sidebarLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sidebarList']['show'] = true;
$this->_sections['sidebarList']['max'] = $this->_sections['sidebarList']['loop'];
$this->_sections['sidebarList']['step'] = 1;
$this->_sections['sidebarList']['start'] = $this->_sections['sidebarList']['step'] > 0 ? 0 : $this->_sections['sidebarList']['loop']-1;
if ($this->_sections['sidebarList']['show']) {
    $this->_sections['sidebarList']['total'] = $this->_sections['sidebarList']['loop'];
    if ($this->_sections['sidebarList']['total'] == 0)
        $this->_sections['sidebarList']['show'] = false;
} else
    $this->_sections['sidebarList']['total'] = 0;
if ($this->_sections['sidebarList']['show']):

            for ($this->_sections['sidebarList']['index'] = $this->_sections['sidebarList']['start'], $this->_sections['sidebarList']['iteration'] = 1;
                 $this->_sections['sidebarList']['iteration'] <= $this->_sections['sidebarList']['total'];
                 $this->_sections['sidebarList']['index'] += $this->_sections['sidebarList']['step'], $this->_sections['sidebarList']['iteration']++):
$this->_sections['sidebarList']['rownum'] = $this->_sections['sidebarList']['iteration'];
$this->_sections['sidebarList']['index_prev'] = $this->_sections['sidebarList']['index'] - $this->_sections['sidebarList']['step'];
$this->_sections['sidebarList']['index_next'] = $this->_sections['sidebarList']['index'] + $this->_sections['sidebarList']['step'];
$this->_sections['sidebarList']['first']      = ($this->_sections['sidebarList']['iteration'] == 1);
$this->_sections['sidebarList']['last']       = ($this->_sections['sidebarList']['iteration'] == $this->_sections['sidebarList']['total']);
?>
</strong><br /><?php endif;  echo $this->_tpl_vars['sidebarLoop'][$this->_sections['sidebarList']['index']]['body']; ?>
</p>
$this->_sections['sideBarList']['name'] = 'sideBarList';
$this->_sections['sideBarList']['loop'] = is_array($_loop=$this->_tpl_vars['sideBarLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sideBarList']['show'] = true;
$this->_sections['sideBarList']['max'] = $this->_sections['sideBarList']['loop'];
$this->_sections['sideBarList']['step'] = 1;
$this->_sections['sideBarList']['start'] = $this->_sections['sideBarList']['step'] > 0 ? 0 : $this->_sections['sideBarList']['loop']-1;
if ($this->_sections['sideBarList']['show']) {
    $this->_sections['sideBarList']['total'] = $this->_sections['sideBarList']['loop'];
    if ($this->_sections['sideBarList']['total'] == 0)
        $this->_sections['sideBarList']['show'] = false;
} else
    $this->_sections['sideBarList']['total'] = 0;
if ($this->_sections['sideBarList']['show']):

            for ($this->_sections['sideBarList']['index'] = $this->_sections['sideBarList']['start'], $this->_sections['sideBarList']['iteration'] = 1;
                 $this->_sections['sideBarList']['iteration'] <= $this->_sections['sideBarList']['total'];
                 $this->_sections['sideBarList']['index'] += $this->_sections['sideBarList']['step'], $this->_sections['sideBarList']['iteration']++):
$this->_sections['sideBarList']['rownum'] = $this->_sections['sideBarList']['iteration'];
$this->_sections['sideBarList']['index_prev'] = $this->_sections['sideBarList']['index'] - $this->_sections['sideBarList']['step'];
$this->_sections['sideBarList']['index_next'] = $this->_sections['sideBarList']['index'] + $this->_sections['sideBarList']['step'];
$this->_sections['sideBarList']['first']      = ($this->_sections['sideBarList']['iteration'] == 1);
$this->_sections['sideBarList']['last']       = ($this->_sections['sideBarList']['iteration'] == $this->_sections['sideBarList']['total']);
?>
</p>