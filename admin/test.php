<form id="inputForm">
    <table cellspacing="0" cellpadding="0" width="700" border="0">
        <tbody>
            <tr>
                <td  align="right">รหัสผ่าน :</td>
                <td ><input id="password1" type="password" maxlength="30"
                                               size="30" name="txtPassword1" /></td></tr>
            <tr>
                <td align="right">ยืนยันรหัสผ่าน :</td>
                <td ><input id="password2" type="password" maxlength="30"
                                               size="30" name="txtPassword2" /></td></tr>
        </tbody></table>
    <input onclick="checkEmail()" type="button" value="Submit" name="buttonSubmit" /> <input name="resetForm" type="reset" value="Clear Data" />
</form>
<script>
    function checkEmail() {
        if (document.forms[0].password1.value != document.forms[0].password2.value)
        {
            alert ("\nPassword did not match: Please try again...")
            return false;
        }
        return true;
    }
</script> 