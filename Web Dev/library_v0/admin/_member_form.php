 
      <form name="frmAdd" action="admin_update_member_action.php" id="frmAdd" method="post" enctype="multipart/form-data">
<table width="50%" border="0" align="center" cellpadding="3" cellspacing="3">

  <tr>
    <th align="right" valign="top">เลขประจำตัวประชาชน :</th>
    <td>
	<input name="user_id" id="user_id" type="hidden" id="user_id"  />
	<input name="identification" type="text" id="identification" size="13" lengthmax="13" autocomplete="off" class="span4" placeholder="รหัสประจำตัว"/></td>
  </tr>
  <tr>
    <th align="right" valign="top">ชื่อ :</th>
    <td><input name="firstn" type="text" class="span4" id="firstn" placeholder="ชื่อ" size="40"/></td>
  </tr>
  <tr>
    <th align="right" valign="top">นามสกุล :</th>
    <td><input name="lastn" type="text" class="span4" id="lastn" placeholder="นามสกุล" size="40"/></td>
  </tr>
  <tr>
    <th align="right" valign="top">โทรศัพท์ :</th>
    <td><input name="teln" type="text" class="span4" id="teln" placeholder="โทรศัพท์" size="40"/></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center">
        <input type="submit" name="save" id="save" value="ปรับปรุง" class="btn btn-success span2">
      &nbsp; <input type="button" name="cancel" id="cancel" value="ยกเลิก" class="btn span2"></td>
  </tr>
</table>
<input name="h_val_id" type="hidden" id="h_val_id" value="">
</form>
 