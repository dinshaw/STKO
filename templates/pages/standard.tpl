<!-- <%$smarty.template%> -->

<%include file="header.tpl" title="Stockton Outfitters"%>



<div id="content">


<h1 class="top"><%$title%></h1>

<%if $imageLoop %>
<div id="topSlides">
<span id="thumbs">

<%section name=imageList loop=$imageLoop%>

<a href="index.php?mode=popup&id=<%$imageLoop[imageList].id%>" onClick="loadBig('userimages/pages/<%$page%>/<%$imageLoop[imageList].image%>');txtChg('caption','<%$imageLoop[imageList].caption%>');document.getElementById('currHref').setAttribute('href','index.php?mode=popup&id=<%$imageLoop[imageList].id%>', 0);document.getElementById('currHref').setAttribute('onClick','window.open(\'index.php?mode=popup&id=<%$imageLoop[imageList].id%>\',\'StocktonOutfitters\',\'height=<%math equation="x + 250" x=$imageLoop[imageList].h%>,width=<%if $imageLoop[imageList].w > 600%><%math equation="x + 50" x=$imageLoop[imageList].w%><%else%>600<%/if%>,scrollbars=yes,resizable=yes\');return false', 0);return false"><img src="userimages/pages/<%$page%>/<%$imageLoop[imageList].image%>" height="20"></a>
<%/section%>

</span>


<a href="index.php?mode=popup&id=<%$the_image_id%>" onClick="window.open('index.php?mode=popup&id=<%$the_image_id%>','StocktonOutfitters','width=<%if $the_image_w > 600%><%math equation="$the_image_w + 100"%><%else%>600<%/if%>,height=<%math equation="x + 250" x=$the_image_h%>,scrollbars=yes,resizable=yes'); return false;" id="currHref"><img id="currImage" name="the_image" src="userimages/pages/<%$page%>/<%$the_image%>" width="150"></a>
<span class="caption" id="caption"><%$caption%></span>
</div>
<%/if%>



<p class="teaser"><%$teaser|nl2br%></p>

<p class="lg"><%$body|nl2br%></p>


<%if $location %>
<h1 class="right">Trip Details &amp; Information</h1>

<table id="details">
	<tr>
		<td><span>Location:</span> <%$location%></td>
		<td><span>Season:</span> <%$seasonStart|date_format:"%B %e"%> - <%$seasonEnd|date_format:"%B %e"%></td>
	</tr>
	<tr>
		<td><span>Trip Duration:</span> <%$duration%> days</td>
		<td><span>Availability:</span> <%$availability%></td>
	</tr>
	<tr>
		<td><span>Departs from:</span> <%$departs%></td>
		<td><span>Camp:</span> <%$camp%></td>
	</tr>
	<tr>
		<td><span>Accommodations:</span> <%$accommodations%></td>
		<%if $species%>
		<td><span>Species:</span> <%$species%></td>
		<%/if%>
	</tr>
	<%if $peaksPasses%>
	<tr>
		<td colspan="2"><span>Peaks & Passes:</span></td>
	</tr>
	
	<tr>
		<td colspan="2"><p><%$peaksPasses%></p></td>
	</tr>
	<%/if%>
</table>

<%/if%>


<div class="lr"><a href="index.php?mode=reserve" class="white">MAKE YOUR RESERVATIONS NOW!</a><span><a href="index.php?mode=faq" class="white">FAQ FOR <%$title|upper%></a></span></div>

<%if $testimonialLoop %>
<h1>Client Testimonials</h1>
<%section name=testimonialList loop=$testimonialLoop%>
<h2 class="lr"><%$testimonialLoop[testimonialList].author%><span><%$testimonialLoop[testimonialList].trip%> - <%$testimonialLoop[testimonialList].date%></span></h2>
<p><%$testimonialLoop[testimonialList].body|nl2br%></p>
<%/section%>
<%/if%>

<%if $trLoop%>
<h1 class="right">Trophy Room</h1>

<div class="lr"><h3>Check out these pictures form our Trophy Room. Want to see more?</h3><span><a href="index.php?mode=gallery" class="white">CLICK HERE</a></span></div>

<%section name=trList loop=$trLoop%>
<div class="pic">
<span class="title"><%$trLoop[trList].title|truncate:15:"...":true%></span>
<a href="index.php?mode=popup&page=<%$trLoop[trList].page%>&id=<%$trLoop[trList].id%>" onClick="window.open('index.php?mode=popup&page=<%$trLoop[trList].page%>&id=<%$trLoop[trList].id%>','Hunting&nbsp;Trophys&nbsp;&nbsp;Stocktion&nbsp;Outfitters','width=<%if $trLoop[trList].w > 600%><%math equation="x + 50" x=$trLoop[trList].w%><%else%>600<%/if%>,height=<%math equation="x + 250" x=$trLoop[trList].h%>,scrollbars=yes,resizable=yes');return false;"><img src="userimages/pages/TR/<%$trLoop[trList].image%>" width="150"></a>
</div>
<%/section%>
<%/if%>
<%include file="footer.tpl"%>