<?php /* Smarty version 2.6.6, created on 2009-04-06 13:47:50
         compiled from pages/about.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'pages/about.tpl', 1, false),array('modifier', 'upper', 'pages/about.tpl', 1, false),)), $this); ?>
<!-- <?php echo 'pages/about.tpl'; ?>
 --><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div id="content"><?php if ($this->_tpl_vars['imageLoop']): ?><div id="topSlides"><span id="thumbs"><?php unset($this->_sections['imageList']);
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
?><a href="#" onClick="loadBig('userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
');txtChg('caption','<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['caption']; ?>
')""><img src="userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
"></a><?php endfor; endif; ?></span><img id="currImage" name="the_image" src="userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['the_image']; ?>
" width="150"><span class="caption" id="caption"><?php echo $this->_tpl_vars['caption']; ?>
</span></div><?php endif; ?><h1 class="top"><?php echo $this->_tpl_vars['title']; ?>
</h1><p class="teaser"><?php echo ((is_array($_tmp=$this->_tpl_vars['teaser'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p><p class="lg"><?php echo ((is_array($_tmp=$this->_tpl_vars['body'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p><h1 class="right">Meet The Team</h1><?php unset($this->_sections['teamList']);
$this->_sections['teamList']['name'] = 'teamList';
$this->_sections['teamList']['loop'] = is_array($_loop=$this->_tpl_vars['teamLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['teamList']['show'] = true;
$this->_sections['teamList']['max'] = $this->_sections['teamList']['loop'];
$this->_sections['teamList']['step'] = 1;
$this->_sections['teamList']['start'] = $this->_sections['teamList']['step'] > 0 ? 0 : $this->_sections['teamList']['loop']-1;
if ($this->_sections['teamList']['show']) {
    $this->_sections['teamList']['total'] = $this->_sections['teamList']['loop'];
    if ($this->_sections['teamList']['total'] == 0)
        $this->_sections['teamList']['show'] = false;
} else
    $this->_sections['teamList']['total'] = 0;
if ($this->_sections['teamList']['show']):

            for ($this->_sections['teamList']['index'] = $this->_sections['teamList']['start'], $this->_sections['teamList']['iteration'] = 1;
                 $this->_sections['teamList']['iteration'] <= $this->_sections['teamList']['total'];
                 $this->_sections['teamList']['index'] += $this->_sections['teamList']['step'], $this->_sections['teamList']['iteration']++):
$this->_sections['teamList']['rownum'] = $this->_sections['teamList']['iteration'];
$this->_sections['teamList']['index_prev'] = $this->_sections['teamList']['index'] - $this->_sections['teamList']['step'];
$this->_sections['teamList']['index_next'] = $this->_sections['teamList']['index'] + $this->_sections['teamList']['step'];
$this->_sections['teamList']['first']      = ($this->_sections['teamList']['iteration'] == 1);
$this->_sections['teamList']['last']       = ($this->_sections['teamList']['iteration'] == $this->_sections['teamList']['total']);
?><div class="team"><h2><?php echo $this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['name']; ?>
</h2><a href="#"onClick="window.open('index.php?mode=imgPopup&page=team&image=<?php echo $this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['image']; ?>
','Hunting&nbsp;Trophys&nbsp;-&nbsp;Stocktion&nbsp;Outfitters','width=<?php if ($this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['w'] > 600):  echo $this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['w'];  else: ?>600<?php endif; ?>,height=<?php echo $this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['poph']; ?>
,scrollbars=yes,resizable=yes');return false;"><img src="userimages/team/<?php echo $this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['image']; ?>
" width="200"></a><span><?php echo $this->_tpl_vars['teamLoop'][$this->_sections['teamList']['index']]['text']; ?>
</span></div><?php endfor; endif; ?> <div class="lr"><a href="index.php?mode=reserve" class="white">MAKE YOUR RESERVATIONS NOW!</a><span><a href="index.php?mode=faq" class="white">FAQ FOR <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></span></div><?php if ($this->_tpl_vars['trLoop']): ?><h1 class="right">Trophy Room</h1><div class="lr"><h3>Check out these pictures form our Trophy Room. Want to see more?</h3><span><a href="index.php#tr?mode=gallery" class="white">CLICK HERE</a></span></div><?php unset($this->_sections['trList']);
$this->_sections['trList']['name'] = 'trList';
$this->_sections['trList']['loop'] = is_array($_loop=$this->_tpl_vars['trLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['trList']['show'] = true;
$this->_sections['trList']['max'] = $this->_sections['trList']['loop'];
$this->_sections['trList']['step'] = 1;
$this->_sections['trList']['start'] = $this->_sections['trList']['step'] > 0 ? 0 : $this->_sections['trList']['loop']-1;
if ($this->_sections['trList']['show']) {
    $this->_sections['trList']['total'] = $this->_sections['trList']['loop'];
    if ($this->_sections['trList']['total'] == 0)
        $this->_sections['trList']['show'] = false;
} else
    $this->_sections['trList']['total'] = 0;
if ($this->_sections['trList']['show']):

            for ($this->_sections['trList']['index'] = $this->_sections['trList']['start'], $this->_sections['trList']['iteration'] = 1;
                 $this->_sections['trList']['iteration'] <= $this->_sections['trList']['total'];
                 $this->_sections['trList']['index'] += $this->_sections['trList']['step'], $this->_sections['trList']['iteration']++):
$this->_sections['trList']['rownum'] = $this->_sections['trList']['iteration'];
$this->_sections['trList']['index_prev'] = $this->_sections['trList']['index'] - $this->_sections['trList']['step'];
$this->_sections['trList']['index_next'] = $this->_sections['trList']['index'] + $this->_sections['trList']['step'];
$this->_sections['trList']['first']      = ($this->_sections['trList']['iteration'] == 1);
$this->_sections['trList']['last']       = ($this->_sections['trList']['iteration'] == $this->_sections['trList']['total']);
?><div class="pic"><span class="title"><?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['title']; ?>
</span><a href="#" onClick="window.open('index.php?mode=imgPopup&page=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['page']; ?>
&title=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['title']; ?>
&image=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['image']; ?>
','Hunting&nbsp;Trophys&nbsp;-&nbsp;Stocktion&nbsp;Outfitters','width=<?php if ($this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['w'] > 600):  echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['w'];  else: ?>600<?php endif; ?>,height=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['poph']; ?>
,scrollbars=yes,resizable=yes');return false;"><img src="userimages/pages/TR/<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['image']; ?>
" width="150"></a><span class="caption"><?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['caption']; ?>
</span></div><?php endfor; endif; ?><?php endif; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>