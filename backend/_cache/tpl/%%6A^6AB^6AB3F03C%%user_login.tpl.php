<?php /* Smarty version 2.6.13, created on 2018-02-23 08:45:34
         compiled from user_login.tpl */ ?>
<div class="wrapper-login">
	<div style="margin-top: 70px">
		<h2 style="text-align: center; color: #a02f24"><b>Hệ thống quản trị website</b></h2>
	</div>
	<form method="POST" action="?mod=user&act=login">
		<table width="50%" border="0" cellspacing="0" cellpadding="0" style="border:#B2BBD8 1px solid;margin:60px auto; background:#F9FAFE">
			<tr>
				<td height="50" align="center" valign="bottom" style="padding-bottom:10px"><b style="font-size:18px">Đăng nhập hệ thống </b></td>
			</tr>
			<tr>
				<td align="center">
					<table width="80%" border="0" cellspacing="0" cellpadding="5" style="border-top:1px solid #DEE3F1">
						<tr>
							<td width="40%" height="50" align="right" valign="bottom"><span style="line-height: 28px;">Tên đăng nhập&nbsp;</span></td>
							<td align="left" valign="bottom"><input type="text" name="username" class="form-control" style="width:200px; height: 28px;" value="<?php echo $_POST['username']; ?>
"/></td>
						</tr>

						<tr>
							<td height="50" align="right"><span style="line-height: 28px;">Mật khẩu&nbsp;</span></td>
							<td align="left"><input type="password" name="password" class="form-control" style="width:200px; height: 28px;" value="<?php echo $_POST['password']; ?>
"/></td>
						</tr>
                        <?php if ($this->_tpl_vars['error']): ?>
							<tr>
								<td height="30" align="right"></td>
								<td align="left"><font color="Red"><?php echo $this->_tpl_vars['error']; ?>
</font></td>
							</tr>
                        <?php endif; ?>
						<tr>
							<td height="30" align="right"></td>
							<td align="left"><input name="btnLogin" type="submit" class="btn btn-default" style="padding: 3px 5px 3px 5px;" value="Đăng nhập"/></td>
						</tr>
						<tr>
							<td height="40" align="right">&nbsp;</td>
							<td align="left"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>