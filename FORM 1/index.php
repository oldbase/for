<?

$amount = $_GET["amount"];
$description = $_GET["description"];

?>

<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:700,400,300,100">
		<link rel="icon" type="image/png" href="https://i.imgur.com/sVH0g0G.png">

		<style type="text/css">
			*{box-sizing:border-box}body,html{height:100%;}body{margin:0;background-color:#e7e7e7;font-family:'Roboto',sans-serif}.credit-card{width:360px;height:390px;margin:0 auto 0;border:1px solid #ddd;border-radius:6px;background-color:#fff;box-shadow:1px 2px 3px 0 rgba(0,0,0,0.10)}.form-header{height:60px;text-align:center;padding:20px 30px 0;border-bottom:1px solid #E1E8EE}.form-body{height:340px;padding:30px 30px 20px}.title{margin:0;color:#5e6977;font-size:18px}.card-number,.cvv-input input,.month select,.paypal-btn,.proceed-btn,.year select{height:42px}.card-number,.month select,.year select{font-size:14px;font-weight:100;line-height:14px}.card-number,.cvv-details,.cvv-input input,.month select,.year select{color:#111;opacity:.7;transition:.25s}.card-number:focus,.cvv-details:focus,.cvv-input input:focus,.month select:focus,.year select:focus{outline:none;border-color:#859eb3}.card-number{width:100%;margin-bottom:20px;padding-left:20px;border:2px solid #e1e8ee;border-radius:6px}.month select,.year select{width:145px;margin-bottom:20px;padding-left:20px;border:2px solid #e1e8ee;border-radius:6px;background-position:85% 50%}.month select{float:left}.year select{float:right}.cvv-input input{width:145px;float:left;padding-left:20px;border:2px solid #e1e8ee;border-radius:6px;background:#fff}.cvv-details{float:right;margin-bottom:20px;font-size:12px;font-weight:300;line-height:16px}.cvv-details p{margin-top:6px}.proceed-btn{cursor:pointer;width:100%;border-color:transparent;border-radius:6px;font-size:16px}.proceed-btn{margin-bottom:10px;background:#7dc855;transition:.25s}.proceed-btn:hover{background-color:#68a746}.paypal-btn a,.proceed-btn a{text-decoration:none;cursor:pointer}.proceed-btn a{color:#fff}
		</style>

		<title>PayMaster</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>

	<body>
		<div style="width: 100%; text-align: center; margin-top: 50px; margin-bottom: 25px;">
			<img src="https://i.imgur.com/ENfAQio.png" style="margin: 0 auto;">
		</div>

		<div style="width: 360px; margin: 0 auto; padding: 15px; margin-bottom: 15px; background-color: #fff; border: 1px solid #ddd; border-radius: 6px; box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10); color: #5e6977;">
			<p style="margin: 0; padding: 0; font-weight: 700; font-size: 16px; margin-bottom: 10px;">Описание платежа: </p>

			<p style="margin: 0; padding: 0; font-size: 14px;">
				<?php echo $description; ?>
			</p>
		</div>

		<form class="credit-card" method="post" action="pay.php">
			<div class="form-header">
				<h4 class="title">Оплата через банковскую карту</h4>
				
			</div>

			<div class="form-body">
				<input type="text" class="card-number" placeholder="Номер карты(вводить без пробелов)" name="cardFrom" required oninput="this.value = this.value.replace(/\D/g, "")" maxlength="24">

				<div class="date-field">
					<div class="month">
						<select name="cardFromMonth" required>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>

					<div class="year">
						<select name="cardFromYear" required>
							<option value="19">2019</option>
							<option value="20">2020</option>
							<option value="21">2021</option>
							<option value="22">2022</option>
							<option value="23">2023</option>
							<option value="24">2024</option>
							<option value="25">2025</option>
						</select>
					</div>
				</div>

				<div class="card-verification">
					<div class="cvv-input">
						<input type="password" placeholder="CVV" name="cardFromCVC" maxlength="3" required oninput="this.value = this.value.replace(/\D/g, "")">
					</div>

					<div class="cvv-details">
						<p>цифры на<br>задней стороне</p>
					</div>
				</div>

				<h4 style="display: inline-block; margin-top: 20px; font-weight: 400; color: #5e6977;">Итого к оплате: 
					<b><?php echo $amount; ?> руб.</b>
				</h4>

				<input type="hidden" name="amount" value="<?php echo $amount; ?>">
				<input type="hidden" name="description" value="<?php echo $description; ?>">

				<button type="submit" class="proceed-btn" style="color: #fff;">Оплатить</button>
			</div>
		</form>

		<p style="display: block; text-align: center; font-size: 13px; margin-top: 25px; opacity: .75; line-height: 20px;">Все платежи надежно защищены системой 3-D Secure.<br>Служба поддержки: тут должен указываться мыло в формате support@ </p>
	</body>
</html>