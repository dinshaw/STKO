<!-- <%$smarty.template%> --><%include file="admin/admin_header.tpl" title="Stockton Outfitters Admin Area"%><div id="content"><h1 class="top">Review Bookings & Reservations</h1><table align="center" id="res">	<tr>		<th>Name</th>		<th>Trip Type</th>		<th>Reservation date/time</th>		<th>Start Date</th>		<th>Hunters</th>		<th>Observers</th>		<th>Total Guests</th>		<th>Total Price</th>		<th>Amount Paid</th>		<th>Amount Due</th>		<th>Payment method</th>		<th>Status</th>		<th>Action</th>	</tr><%section name=resList loop=$resLoop%><form action="admin.php" method="post"><input type="hidden" name="mode" value="bookings"><input type="hidden" name="resID" value="<%$resLoop[resList].resID%>">	<tr>		<td><a href="mailTo:<%$resLoop[resList].email%>?subject=Stockton Outfitters Reservations"><%$resLoop[resList].name%></a></td>		<td><%$resLoop[resList].type%></td>		<td><%$resLoop[resList].date_time|date_format%></td>		<td><%$resLoop[resList].start_date%></td>		<td><%$resLoop[resList].hunters%></td>		<td><%$resLoop[resList].observers%></td>		<td><%$resLoop[resList].totalGuests%></td>		<td>$<%$resLoop[resList].total_price|money_format:2:".":","%></td>		<td>$<%$resLoop[resList].amount_paid|money_format:2:".":","%></td>		<td>$<%$resLoop[resList].amount_due|money_format:2:".":","%></td>		<td><%$resLoop[resList].paymentType%></td>		<td><%$resLoop[resList].status%></td>		<td><select name="status">		<option value="">Choose one...</option>		<option value="0">INCOMPLETE</option>		<option value="1">DEPOSIT PENDING</option>		<option value="2">RESERVED</option>		<option value="3">PAID</option>		<option value="4">FULFILLED</option>		<option></option>		<option></option>		<option value="delete">DELETE</option>		</select></td>		<td><input type="submit" name="submit" value="do it"></td>		<td><input type="submit" name="view" value="View"></td>	</tr></form><%/section%></table></div><%include file="admin/admin_footer.tpl"%>