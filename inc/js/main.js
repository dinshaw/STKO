// JavaScript Document//small slide show no top of page//pic to change must be name="the_image"function loadBig(photo,href) {document.images.the_image.src=photo;theURL=href;}//set the captionfunction txtChg(element,newText){document.getElementById(element).innerHTML=newText}startList = function() {if (document.all&&document.getElementById) {navRoot = document.getElementById("nav");for (i=0; i<navRoot.childNodes.length; i++) {node = navRoot.childNodes[i];if (node.nodeName=="LI") {node.onmouseover=function() {this.className+=" over";  }  node.onmouseout=function() {  this.className=this.className.replace	(" over", "");    }   }  } }}window.onload=startList;//enable form elemen on selectfunction enableDisable(element,formName){txt=document.forms[formName].page.options[document.forms[formName].page.selectedIndex].value	if(txt == "TR" || txt == "M"){		var x=document.getElementById(element)		x.disabled=false	}else{		var x=document.getElementById(element)		x.disabled=true	}}function trSelectCheck(){	if(document.forms["add_image"]){		if(document.forms["add_image"].page.options[document.forms["add_image"].page.selectedIndex].value == "TR"){			var x=document.getElementById("sub_page")			x.disabled=false		}	}}//add markup to textareasfunction addLink(Fo,Fi){	var text = window.document.forms[Fo].elements[Fi].value;var textLink = window.document.forms[Fo].text.value;var linkDest = window.document.forms[Fo].link.value;var fullLink = "<a href='" + linkDest + "' target='_blank'>" + textLink + "</a>";window.document.forms[Fo].elements[Fi].value = text + fullLink;}function addEmailLink(Fo,Fi){	var text = window.document.forms[Fo].elements[Fi].value;var textLink = window.document.forms[Fo].emailText.value;var linkDest = window.document.forms[Fo].emailLink.value;var fullLink = "<a href='mailTo:" + linkDest + "'>" + textLink + "</a>";window.document.forms[Fo].elements[Fi].value = text + fullLink;}function addBold(Fo,Fi){text = window.document.forms[Fo].elements[Fi].value;boldText = window.document.forms[Fo].bold.value;window.document.forms[Fo].elements[Fi].value = text + "<strong>" + boldText + "</strong>";}function addItalic(Fo,Fi){text = window.document.forms[Fo].elements[Fi].value;italicText = window.document.forms[Fo].italic.value;window.document.forms[Fo].elements[Fi].value = text + "<em>" + italicText + "</em>";}function addBoldItalic(Fo,Fi){text = window.document.forms[Fo].elements[Fi].value;boldItalicText = window.document.forms[Fo].boldItalic.value;window.document.forms[Fo].elements[Fi].value = text + "<strong><em>" + boldItalicText + "</em></strong>";}