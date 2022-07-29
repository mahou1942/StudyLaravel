<form id="update" name="update" method="post" action="{{ action('PostController@create') }}">

    <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
        @csrf
        
        <tr>
            <div class="content">
                <td colspan="2" align="center" bgcolor="#CCCCCC">會員資料</td>
        </tr>
        <tr>
            <td width="80" align="center" valign="baseline">帳號</td>
            <td valign="baseline">
                <input type="text" name="username" id="username" value=""></td>
        </tr>
        <tr>
            <td width="80" align="center" valign="baseline">密碼</td>
            <td valign="baseline">
                <input type="text" name="password" id="password" value=""></td>
        </tr>
        <tr>
            <td width="80" align="center" valign="baseline">名字</td>
            <td valign="baseline">
                <input type="name" name="name" id="name" value=""></td>
        </tr>
        <tr>
            <td width="80" align="center" valign="baseline">電話</td>
            <td valign="baseline">
                <input type="phone" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC">
                <input type="hidden" name="action" value="store">
                <input type="submit" name="button" id="button" value="註冊">
                <input type="reset" name="button2" id="button2" value="重設" ></td>
        </tr>
    </table>
</form>
