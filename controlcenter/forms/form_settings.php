<form action="settings.php?mode=submit" method="post" name="form_settings" id="form_settings" enctype="multipart/form-data"  >
  <table width="100%"  border="0" cellspacing="3" cellpadding="0" bgcolor="#FFCC00">
    <tr>
      <td width="25%"><font size="5">नँया पासवर्ड</font></td>
      <td><input name="password" type="password" id="password" size="30" ></td>
    </tr>    
    <tr>
      <td><font size="5">पक्का गर्नुहोस्</font></td>
      <td><input name="password1" type="password" id="password1" size="30" onFocus="if(form_settings.password.value==''){ alert('पहिला पासवर्ड दिनुहोस्; Write password ');}">
       </td>
    </tr>
      <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="change (फेर्नुहोस्)">
      </td>
     <!--<td><input type="reset" name="Reset" value="Cancel (रद्द गर्नुहोस्)">
      </td>-->
</tr>
  </table>
</form>
