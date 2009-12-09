<?php /* Smarty version 2.6.6, created on 2009-04-06 13:12:43
         compiled from nav.tpl */ ?>
<ul id="nav">	<li class="cat"><a href="#">SERVICES</a></li>	<li><a href="index.php">HOME</a></li>	<li><a href="#">HUNTING</a>		<ul>			<li><a href="index.php?mode=pages&page=archery">ARCHERY ELK</a></li>			<li><a href="index.php?mode=pages&page=rifle">RIFLE ELK</a></li>			<li><a href="index.php?mode=pages&page=bear">SPRING BEAR</a></li>			<li><a href="index.php?mode=pages&page=special">SPECIAL PERMIT</a></li>			<li><a href="index.php?mode=pages&page=deer">DEER</a></li>			<li><a href="index.php?mode=pages&page=camp">HUNTING CAMP</a></li>		</ul>	</li>	<li><a href="index.php?mode=pages&page=fishing">FISHING</a></li>	<li><a href="index.php?mode=pages&page=packTrips">PACK TRIPS<br />&AMP; DAY RIDES</a></li>		<li class="cat"><a href="#">INFO</a></li>	<li><a href="index.php?mode=about">ABOUT US</a></li>	<li><a href="index.php?mode=contact">CONTACT</a></li>	<li><a href="index.php?mode=reserve">RESERVATIONS</a></li>	<li><a href="#">FAQ</a>		 <ul>			<?php unset($this->_sections['faqCatList']);
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
?>			<li><a href="index.php?mode=faq#<?php echo $this->_tpl_vars['faqCatLoop'][$this->_sections['faqCatList']['index']]['catName']; ?>
"><?php echo $this->_tpl_vars['faqCatLoop'][$this->_sections['faqCatList']['index']]['catTitle']; ?>
</a></li>			<?php endfor; endif; ?>		</ul>	</li>	<li class="cat"><a href="#">FEATURES</a></li>	<li><a href="index.php?mode=gallery&filter=<?php echo $this->_tpl_vars['page']; ?>
">TROPHY ROOM<br />&AMP; PHOTO GALLERY</a></li>	<li><a href="index.php?mode=testimonials">TESTIMONIALS</a></li>	<li><a href="index.php?mode=press">PRESS &amp; APPEARANCES</a></li>	<!--  <li><a href="index.php?mode=media">MULTI-MEDIA</a></li>	<li><a href="index.php?mode=downloads">DOWNLOADS</a></li>	<li><a href="index.php?mode=email">EMAIL<br />&AMP; NEWSLETTER</a></li>  -->		<li class="contact"><a href="#">(406) 782-9532</a>	<a href="mailTo:info@stocktonoutfitters.com" class="navEmail">info@stocktonoutfitters.com</a></li>	</ul>