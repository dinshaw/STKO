<!-- <%$smarty.template%> --><%include file="header.tpl" title="Stockton Outfitters"%><div id="content"><%if $imageLoop %><div id="topSlides"><span id="thumbs"><%section name=imageList loop=$imageLoop%><a href="#" onClick="loadBig('userimages/pages/<%$page%>/<%$imageLoop[imageList].image%>');txtChg('caption','<%$imageLoop[imageList].caption%>')""><img src="userimages/pages/<%$page%>/<%$imageLoop[imageList].image%>"></a><%/section%></span><img id="currImage" name="the_image" src="userimages/pages/<%$page%>/<%$the_image%>" width="150"><span class="caption" id="caption"><%$caption%></span></div><%/if%><h1 class="top">Press & Appearances</h1><IFRAME id="movie" width=300px height=250px SCROLLING=NO frameborder=0 marginwidth="-10" marginheight="-10" src="http://cms.mediamarshal.com/minitv/slminitv.aspx?userid=1104&amp;channel=StocktonOutfitter"  style="padding: 0; margin: 0; "></IFRAME><br><a href=http://www.outdoorchanneloutfitters.tv/><imgheight='78' width='98'align='absmiddle'src='http://cms.mediamarshal.com/mediamarshalfiles/Logo/1104CP.gif'/> </a><%section name=pressList loop=$pressLoop%><div class="team"><h2 class="lr"><%$pressLoop[pressList].title%></h2><%if $pressLoop[pressList].image %><img src="userimages/press/<%$pressLoop[pressList].image%>" width="150"><%/if%><span><%$pressLoop[pressList].body|nl2br%></span></div><hr><%/section%> </div><%include file="footer.tpl"%>