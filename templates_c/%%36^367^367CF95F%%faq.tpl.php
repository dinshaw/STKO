<?php /* Smarty version 2.6.6, created on 2009-04-06 13:54:59
         compiled from pages/faq.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'pages/faq.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'pages/faq.tpl'; ?>
 --><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div id="content"><h1 class="top">F.A.Q.</h1><?php unset($this->_sections['faqList']);
$this->_sections['faqList']['name'] = 'faqList';
$this->_sections['faqList']['loop'] = is_array($_loop=$this->_tpl_vars['faqLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['faqList']['show'] = true;
$this->_sections['faqList']['max'] = $this->_sections['faqList']['loop'];
$this->_sections['faqList']['step'] = 1;
$this->_sections['faqList']['start'] = $this->_sections['faqList']['step'] > 0 ? 0 : $this->_sections['faqList']['loop']-1;
if ($this->_sections['faqList']['show']) {
    $this->_sections['faqList']['total'] = $this->_sections['faqList']['loop'];
    if ($this->_sections['faqList']['total'] == 0)
        $this->_sections['faqList']['show'] = false;
} else
    $this->_sections['faqList']['total'] = 0;
if ($this->_sections['faqList']['show']):

            for ($this->_sections['faqList']['index'] = $this->_sections['faqList']['start'], $this->_sections['faqList']['iteration'] = 1;
                 $this->_sections['faqList']['iteration'] <= $this->_sections['faqList']['total'];
                 $this->_sections['faqList']['index'] += $this->_sections['faqList']['step'], $this->_sections['faqList']['iteration']++):
$this->_sections['faqList']['rownum'] = $this->_sections['faqList']['iteration'];
$this->_sections['faqList']['index_prev'] = $this->_sections['faqList']['index'] - $this->_sections['faqList']['step'];
$this->_sections['faqList']['index_next'] = $this->_sections['faqList']['index'] + $this->_sections['faqList']['step'];
$this->_sections['faqList']['first']      = ($this->_sections['faqList']['iteration'] == 1);
$this->_sections['faqList']['last']       = ($this->_sections['faqList']['iteration'] == $this->_sections['faqList']['total']);
?><?php if ($this->_tpl_vars['faqLoop'][$this->_sections['faqList']['index']]['newCat']): ?><a name="<?php echo $this->_tpl_vars['faqLoop'][$this->_sections['faqList']['index']]['cat']; ?>
"></a><h2><?php echo $this->_tpl_vars['faqLoop'][$this->_sections['faqList']['index']]['newCat']; ?>
</h2><?php endif; ?><p class="teaser"><?php echo ((is_array($_tmp=$this->_tpl_vars['faqLoop'][$this->_sections['faqList']['index']]['q'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p><p><?php echo ((is_array($_tmp=$this->_tpl_vars['faqLoop'][$this->_sections['faqList']['index']]['a'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p><?php endfor; endif; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>