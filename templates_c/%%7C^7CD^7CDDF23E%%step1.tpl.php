<?php /* Smarty version 2.6.6, created on 2009-04-06 13:50:09
         compiled from reserve/step1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'reserve/step1.tpl', 1, false),array('modifier', 'money_format', 'reserve/step1.tpl', 1, false),array('modifier', 'cat', 'reserve/step1.tpl', 1, false),array('modifier', 'date_format', 'reserve/step1.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'reserve/step1.tpl'; ?>
 -->
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/admin_header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>
</h1>
</p><?php endif; ?>
">
">
</h2>
$this->_sections['tripList']['name'] = 'tripList';
$this->_sections['tripList']['loop'] = is_array($_loop=$this->_tpl_vars['tripLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tripList']['show'] = true;
$this->_sections['tripList']['max'] = $this->_sections['tripList']['loop'];
$this->_sections['tripList']['step'] = 1;
$this->_sections['tripList']['start'] = $this->_sections['tripList']['step'] > 0 ? 0 : $this->_sections['tripList']['loop']-1;
if ($this->_sections['tripList']['show']) {
    $this->_sections['tripList']['total'] = $this->_sections['tripList']['loop'];
    if ($this->_sections['tripList']['total'] == 0)
        $this->_sections['tripList']['show'] = false;
} else
    $this->_sections['tripList']['total'] = 0;
if ($this->_sections['tripList']['show']):

            for ($this->_sections['tripList']['index'] = $this->_sections['tripList']['start'], $this->_sections['tripList']['iteration'] = 1;
                 $this->_sections['tripList']['iteration'] <= $this->_sections['tripList']['total'];
                 $this->_sections['tripList']['index'] += $this->_sections['tripList']['step'], $this->_sections['tripList']['iteration']++):
$this->_sections['tripList']['rownum'] = $this->_sections['tripList']['iteration'];
$this->_sections['tripList']['index_prev'] = $this->_sections['tripList']['index'] - $this->_sections['tripList']['step'];
$this->_sections['tripList']['index_next'] = $this->_sections['tripList']['index'] + $this->_sections['tripList']['step'];
$this->_sections['tripList']['first']      = ($this->_sections['tripList']['iteration'] == 1);
$this->_sections['tripList']['last']       = ($this->_sections['tripList']['iteration'] == $this->_sections['tripList']['total']);
?>
</h1>
</p>
_price1" <?php if ($this->_tpl_vars['price'] == ((is_array($_tmp=$this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['typeID'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_price1') : smarty_modifier_cat($_tmp, '_price1'))): ?>checked<?php endif; ?>></td>
</td>
 per client</th>
_price2" <?php if ($this->_tpl_vars['price'] == ((is_array($_tmp=$this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['typeID'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_price2') : smarty_modifier_cat($_tmp, '_price2'))): ?>checked<?php endif; ?>></td>
</td>
 per client</th>
" <?php if ($this->_tpl_vars['trip'] == ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['typeID'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_') : smarty_modifier_cat($_tmp, '_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['tripID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['tripID']))): ?>checked<?php endif; ?>><?php endif; ?></td>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %e") : smarty_modifier_date_format($_tmp, "%B %e")); ?>
 &bull; <em><?php echo $this->_tpl_vars['tripLoop'][$this->_sections['tripList']['index']]['spots']; ?>
</em></td>
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>