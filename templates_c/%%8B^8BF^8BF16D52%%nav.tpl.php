<?php /* Smarty version 2.6.6, created on 2009-04-06 13:12:43
         compiled from nav.tpl */ ?>

$this->_sections['faqCatList']['name'] = 'faqCatList';
$this->_sections['faqCatList']['loop'] = is_array($_loop=$this->_tpl_vars['faqCatLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['faqCatList']['show'] = true;
$this->_sections['faqCatList']['max'] = $this->_sections['faqCatList']['loop'];
$this->_sections['faqCatList']['step'] = 1;
$this->_sections['faqCatList']['start'] = $this->_sections['faqCatList']['step'] > 0 ? 0 : $this->_sections['faqCatList']['loop']-1;
if ($this->_sections['faqCatList']['show']) {
    $this->_sections['faqCatList']['total'] = $this->_sections['faqCatList']['loop'];
    if ($this->_sections['faqCatList']['total'] == 0)
        $this->_sections['faqCatList']['show'] = false;
} else
    $this->_sections['faqCatList']['total'] = 0;
if ($this->_sections['faqCatList']['show']):

            for ($this->_sections['faqCatList']['index'] = $this->_sections['faqCatList']['start'], $this->_sections['faqCatList']['iteration'] = 1;
                 $this->_sections['faqCatList']['iteration'] <= $this->_sections['faqCatList']['total'];
                 $this->_sections['faqCatList']['index'] += $this->_sections['faqCatList']['step'], $this->_sections['faqCatList']['iteration']++):
$this->_sections['faqCatList']['rownum'] = $this->_sections['faqCatList']['iteration'];
$this->_sections['faqCatList']['index_prev'] = $this->_sections['faqCatList']['index'] - $this->_sections['faqCatList']['step'];
$this->_sections['faqCatList']['index_next'] = $this->_sections['faqCatList']['index'] + $this->_sections['faqCatList']['step'];
$this->_sections['faqCatList']['first']      = ($this->_sections['faqCatList']['iteration'] == 1);
$this->_sections['faqCatList']['last']       = ($this->_sections['faqCatList']['iteration'] == $this->_sections['faqCatList']['total']);
?>
"><?php echo $this->_tpl_vars['faqCatLoop'][$this->_sections['faqCatList']['index']]['catTitle']; ?>
</a></li>
">TROPHY ROOM<br />&AMP; PHOTO GALLERY</a></li>