<!-- <%$smarty.template%> --><%include file="admin/admin_header.tpl" title="DINSHAW - Original Blues-Rock band in New York City"%><div id="content"><h1>Configuration Parameters</h1><table class="form">	<tr>		<th>Last modified</th>		<th>Modified by</th>		<th>Name</th>		<th>Value</th>		<th>Description</th>		<th>ID#</th>		<th>Action</th>		<th>Submit</th>	</tr><%section name=configList loop=$configLoop%><form action="admin.php" method="post"><input type="hidden" name="mode" value="config"><input type="hidden" name="id" value="<%$configLoop[configList].id%>">			<tr>		<td class="small"><%$configLoop[configList].lastChange|date_format:"%D %l:%M %p"%></td>		<td><%$configLoop[configList].changeBy%></td>		<td><%$configLoop[configList].name%></td>		<td><%$configLoop[configList].value%></td>		<td class="ctr"><%$configLoop[configList].description%></td>		<td><%$configLoop[configList].id%></td>		<td><select name="action">			<option value="edit">Edit</option>			<option value="delete">Delete</option>			</select></td>		<td><input type="submit" name="submit" value="Do it"></td>	</tr></form><%/section%>	<tr>		<th colspan="8">Add / Edit<%if $msg%><p class="error"><%$msg|nl2br%></p><%/if%></th>	</tr>	<tr>	<form action="admin.php" method="post">	<input type="hidden" name="mode" value="config">	<input type="hidden" name="adminID" value="<%$adminID%>">	<input type="hidden" name="id" value="<%$id%>">			<td class="small"><%$smarty.now|date_format:"%D %l:%M %p"%></td>		<td><%$adminName|capitalize:true%></td>		<td><input type="text" name="name" value="<%$name%>"></td>		<td><input type="text" name="value" value="<%$value%>"></td>		<td><input type="text" name="description" value="<%$description%>"></td>		<td colspan="3"><input type="submit" name="add_edit" value="Add / Save"></td>	</form>	</tr></table></div><%include file="admin/admin_footer.tpl"%>