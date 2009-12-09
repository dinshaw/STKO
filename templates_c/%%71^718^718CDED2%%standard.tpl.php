<?php /* Smarty version 2.6.6, created on 2009-04-06 13:12:43
         compiled from pages/standard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'pages/standard.tpl', 18, false),array('modifier', 'nl2br', 'pages/standard.tpl', 31, false),array('modifier', 'date_format', 'pages/standard.tpl', 42, false),array('modifier', 'upper', 'pages/standard.tpl', 72, false),array('modifier', 'truncate', 'pages/standard.tpl', 89, false),)), $this); ?>
<!-- <?php echo 'pages/standard.tpl'; ?>
 -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Stockton Outfitters')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div id="content">


<h1 class="top"><?php echo $this->_tpl_vars['title']; ?>
</h1>

<?php if ($this->_tpl_vars['imageLoop']): ?>
<div id="topSlides">
<span id="thumbs">

<?php unset($this->_sections['imageList']);
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

<a href="index.php?mode=popup&id=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['id']; ?>
" onClick="loadBig('userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
');txtChg('caption','<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['caption']; ?>
');document.getElementById('currHref').setAttribute('href','index.php?mode=popup&id=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['id']; ?>
', 0);document.getElementById('currHref').setAttribute('onClick','window.open(\'index.php?mode=popup&id=<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['id']; ?>
\',\'StocktonOutfitters\',\'height=<?php echo smarty_function_math(array('equation' => "x + 250",'x' => $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['h']), $this);?>
,width=<?php if ($this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['w'] > 600):  echo smarty_function_math(array('equation' => "x + 50",'x' => $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['w']), $this); else: ?>600<?php endif; ?>,scrollbars=yes,resizable=yes\');return false', 0);return false"><img src="userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['imageLoop'][$this->_sections['imageList']['index']]['image']; ?>
" height="20"></a>
<?php endfor; endif; ?>

</span>


<a href="index.php?mode=popup&id=<?php echo $this->_tpl_vars['the_image_id']; ?>
" onClick="window.open('index.php?mode=popup&id=<?php echo $this->_tpl_vars['the_image_id']; ?>
','StocktonOutfitters','width=<?php if ($this->_tpl_vars['the_image_w'] > 600):  echo smarty_function_math(array('equation' => ($this->_tpl_vars['the_image_w'])." + 100"), $this); else: ?>600<?php endif; ?>,height=<?php echo smarty_function_math(array('equation' => "x + 250",'x' => $this->_tpl_vars['the_image_h']), $this);?>
,scrollbars=yes,resizable=yes'); return false;" id="currHref"><img id="currImage" name="the_image" src="userimages/pages/<?php echo $this->_tpl_vars['page']; ?>
/<?php echo $this->_tpl_vars['the_image']; ?>
" width="150"></a>
<span class="caption" id="caption"><?php echo $this->_tpl_vars['caption']; ?>
</span>
</div>
<?php endif; ?>



<p class="teaser"><?php echo ((is_array($_tmp=$this->_tpl_vars['teaser'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>

<p class="lg"><?php echo ((is_array($_tmp=$this->_tpl_vars['body'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>


<?php if ($this->_tpl_vars['location']): ?>
<h1 class="right">Trip Details &amp; Information</h1>

<table id="details">
	<tr>
		<td><span>Location:</span> <?php echo $this->_tpl_vars['location']; ?>
</td>
		<td><span>Season:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['seasonStart'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %e") : smarty_modifier_date_format($_tmp, "%B %e")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['seasonEnd'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %e") : smarty_modifier_date_format($_tmp, "%B %e")); ?>
</td>
	</tr>
	<tr>
		<td><span>Trip Duration:</span> <?php echo $this->_tpl_vars['duration']; ?>
 days</td>
		<td><span>Availability:</span> <?php echo $this->_tpl_vars['availability']; ?>
</td>
	</tr>
	<tr>
		<td><span>Departs from:</span> <?php echo $this->_tpl_vars['departs']; ?>
</td>
		<td><span>Camp:</span> <?php echo $this->_tpl_vars['camp']; ?>
</td>
	</tr>
	<tr>
		<td><span>Accommodations:</span> <?php echo $this->_tpl_vars['accommodations']; ?>
</td>
		<?php if ($this->_tpl_vars['species']): ?>
		<td><span>Species:</span> <?php echo $this->_tpl_vars['species']; ?>
</td>
		<?php endif; ?>
	</tr>
	<?php if ($this->_tpl_vars['peaksPasses']): ?>
	<tr>
		<td colspan="2"><span>Peaks & Passes:</span></td>
	</tr>
	
	<tr>
		<td colspan="2"><p><?php echo $this->_tpl_vars['peaksPasses']; ?>
</p></td>
	</tr>
	<?php endif; ?>
</table>

<?php endif; ?>


<div class="lr"><a href="index.php?mode=reserve" class="white">MAKE YOUR RESERVATIONS NOW!</a><span><a href="index.php?mode=faq" class="white">FAQ FOR <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></span></div>

<?php if ($this->_tpl_vars['testimonialLoop']): ?>
<h1>Client Testimonials</h1>
<?php unset($this->_sections['testimonialList']);
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
<h2 class="lr"><?php echo $this->_tpl_vars['testimonialLoop'][$this->_sections['testimonialList']['index']]['author']; ?>
<span><?php echo $this->_tpl_vars['testimonialLoop'][$this->_sections['testimonialList']['index']]['trip']; ?>
 - <?php echo $this->_tpl_vars['testimonialLoop'][$this->_sections['testimonialList']['index']]['date']; ?>
</span></h2>
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['testimonialLoop'][$this->_sections['testimonialList']['index']]['body'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
<?php endfor; endif;  endif; ?>

<?php if ($this->_tpl_vars['trLoop']): ?>
<h1 class="right">Trophy Room</h1>

<div class="lr"><h3>Check out these pictures form our Trophy Room. Want to see more?</h3><span><a href="index.php?mode=gallery" class="white">CLICK HERE</a></span></div>

<?php unset($this->_sections['trList']);
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
?>
<div class="pic">
<span class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...", true) : smarty_modifier_truncate($_tmp, 15, "...", true)); ?>
</span>
<a href="index.php?mode=popup&page=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['page']; ?>
&id=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['id']; ?>
" onClick="window.open('index.php?mode=popup&page=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['page']; ?>
&id=<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['id']; ?>
','Hunting&nbsp;Trophys&nbsp;&nbsp;Stocktion&nbsp;Outfitters','width=<?php if ($this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['w'] > 600):  echo smarty_function_math(array('equation' => "x + 50",'x' => $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['w']), $this); else: ?>600<?php endif; ?>,height=<?php echo smarty_function_math(array('equation' => "x + 250",'x' => $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['h']), $this);?>
,scrollbars=yes,resizable=yes');return false;"><img src="userimages/pages/TR/<?php echo $this->_tpl_vars['trLoop'][$this->_sections['trList']['index']]['image']; ?>
" width="150"></a>
</div>
<?php endfor; endif;  endif;  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>