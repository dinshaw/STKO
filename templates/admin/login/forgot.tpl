<!-- <%$smarty.template%> --><%include file='admin/admin_header.tpl' title='Admin Page'%><div id="content"><h4>Enter your email address here and we will send you your username and a new password.<span class="error">*</span></h4><h5><span class="error">*</span>Your password has been encrypted in our database so we cannot read it back to you.  You may change your password after your first login.</h5><hr><p class='error'><%$errors%></p><form action="admin.php" method="post" name="adminLogin"><input type="hidden" name="mode" value="forgot"><input type="hidden" name="action" value="forgot"><p>Email address: <input name="email" type="text" value="<%$email%>" size="30"></p><p><input name="submit" type="submit" value="Get new password."></p></form><hr></div><%include file='admin/admin_footer.tpl'%>