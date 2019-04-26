<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Heart of Oak Mail Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body bgcolor="#fffae8" style="margin: 0; padding: 0;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#fffae8">
			<tr>
				<td>
					<table bgcolor="#fffae8" align="center" border="0" cellpadding="0" cellspacing="0" width="500px" style="border-collapse: collapse;" bgcolor="#ffffff">
						<tr id="header" bgcolor="#fffae8" align="center">
							<td style="padding-top: 50px; padding-bottom: 10px;">
								<img src="cid:hootlogo" alt= "Heart Of Oak Tattoo Logo" style="display:block">
							</td>
						</tr>
						<tr>
							<td style="padding-left: 15px; padding-right: 15px;" align="center">
								<table>
									<tr>
										<td align="center">
											<h2 style="margin-bottom: 10px;margin-top: 10px;padding: 0px; font-size:24px;"><?= $title ?></h2>
										</td>
									</tr>
									<tr>
										<td style="font-size:large;">
											<img src="cid:hootbirthday" alt= "Heart Of Oak Tattoo Logo" style="display:block;margin-bottom:20px;">
											<p><?= $this->fetch('content') ?></p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr id="connect">
							<td align="center" style="padding-bottom: 15px">
								<table width="500px" border="1" cellpadding="0" cellspacing="0" bordercolor="#fffae8" style="margin-top:60px">
									<tr>
										<td class="spacer"></td>
										<td align="center" width="150px" style="font-weight:bold; font-size:24px;"><b>Follow us :</b></td>
										<td align="center" width="60px">
											<a href="https://www.facebook.com/Heart-of-Oak-Tattoo-196657961129505/">
												<img src="cid:fblogo" alt= "Facebook Logo"  width="48px" height="48px" style="width:48px;height:48px;" border="0">
											</a>
										</td>

										<td align="center" width="60px">
											<a href="https://www.instagram.com/heartofoaktattoo/">
												<img src="cid:instalogo" alt= "Instagram Logo" width="48px" height="48px" style="width:48px;height:48px;" border="0">
											</a>
										</td>
										<td class="spacer"></td>
									</tr>
									<tr>
										<td colspan="5" align="center" style="padding-top:30px">
											Heart Of Oak Tattoo - <a href="tel:0032470836663">+32 (0) 470 83 66 63</a> - Aalmoezenierstraat 4, 2000 Antwerpen
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr id="footer">
							<td align="center">
								<hr>
								<table width="500px" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" style="padding-bottom: 10px; padding-left: 10px; padding-right: 10px; font-size: 10px; color:#999999">You received this email because you gave us your email address personally. We saved it in our client database with your authorization. We are not using any automated subscription method. If you want to be removed from our database, please respond to this email and explain it to us. We personally read all of your emails with care.</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>		
	</body>
</html>