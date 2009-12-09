<?php /* Smarty version 2.6.6, created on 2009-04-06 13:55:34
         compiled from pages/gallery.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'pages/gallery.tpl', 1, false),array('function', 'math', 'pages/gallery.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'pages/gallery.tpl'; ?>
 --><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Tropy&nbsp;Room&nbsp;-&nbsp;Stockton&nbsp;Outfitters")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div id="content"><h1 class="top">Trophy Romm &amp; Photo Gallery</h1><form method="post" action="index.php" name="img_cats"><input type="hidden" name="mode" value="gallery"><table>	<tr>		<td><select name="filter"  onChange="this.form.submit()">		<option value="">All</option>		 <?php unset($this->_sections['pageList']);
$this->_sections['pageList']['name'] = 'pageList';
$this->_sections['pageList']['loop'] = is_array($_loop=$this->_tpl_vars['pageLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pageList']['show'] = true;
$this->_sections['pageList']['max'] = $this->_sections['pageList']['loop'];
$this->_sections['pageList']['step'] = 1;
$this->_sections['pageList']['start'] = $this->_sections['pageList']['step'] > 0 ? 0 : $this->_sections['pageList']['loop']-1;
if ($this->_sections['pageList']['show']) {
    $this->_sections['pageList']['total'] = $this->_sections['pageList']['loop'];
    if ($this->_sections['pageList']['total'] == 0)
        $this->_sections['pageList']['show'] = false;
} else
    $this->_sections['pageList']['total'] = 0;
if ($this->_sections['pageList']['show']):

            for ($this->_sections['pageList']['index'] = $this->_sections['pageList']['start'], $this->_sections['pageList']['iteration'] = 1;
                 $this->_sections['pageList']['iteration'] <= $this->_sections['pageList']['total'];
                 $this->_sections['pageList']['index'] += $this->_sections['pageList']['step'], $this->_sections['pageList']['iteration']++):
$this->_sections['pageList']['rownum'] = $this->_sections['pageList']['iteration'];
$this->_sections['pageList']['index_prev'] = $this->_sections['pageList']['index'] - $this->_sections['pageList']['step'];
$this->_sections['pageList']['index_next'] = $this->_sections['pageList']['index'] + $this->_sections['pageList']['step'];
$this->_sections['pageList']['first']      = ($this->_sections['pageList']['iteration'] == 1);
$this->_sections['pageList']['last']       = ($this->_sections['pageList']['iteration'] == $this->_sections['pageList']['total']);
?> 		<option value="<?php echo $this->_tpl_vars['pageLoop'][$this->_sections['pageList']['index']]['page']; ?>
" <?php if ($this->_tpl_vars['filter'] == $this->_tpl_vars['pageLoop'][$this->_sections['pageList']['index']]['page']): ?>selected<?php endif; ?> > <?php echo $this->_tpl_vars['pageLoop'][$this->_sections['pageList']['index']]['title']; ?>
</option>		<?php endfor; endif; ?>		<option value="M"  <?php if ($this->_tpl_vars['filter'] == 'M'): ?>selected<?php endif; ?>>Misc</option>		</select></td>	</tr></table></form> <?php unset($this->_sections['imageList']);
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
?><?php if ($this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['newPage'] && $this->_sections['imageList']['index'] != '0'):  endif; ?><?php if ($this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['newPage']): ?><h1 class="pic"><?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['newPage']; ?>
</h1><div><?php endif; ?><?php if ($this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['newSubPage']): ?><h2 class="pic"><?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['newSubPage']; ?>
</h2><?php endif; ?><div class="pic"><span class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...", true) : smarty_modifier_truncate($_tmp, 15, "...", true)); ?>
</span><a href="index.php?mode=popup&page=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['page']; ?>
&id=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['id']; ?>
" onClick="window.open('index.php?mode=popup&page=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['page']; ?>
&id=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['id']; ?>
','Hunting&nbsp;Trophys&nbsp;-&nbsp;Stocktion&nbsp;Outfitters','width=<?php if ($this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['w'] >= 600):  echo smarty_function_math(array('equation' => "x + 50",'x' => $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['w']), $this); else: ?>600<?php endif; ?>,height=<?php echo smarty_function_math(array('equation' => "x + 250",'x' => $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['h']), $this);?>
,scrollbars=yes,resizable=yes'); return false;"><img src="userimages/pages/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['page']; ?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
" width="150"></a></div><?php endfor; endif; ?> </div><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>