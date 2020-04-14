<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymaster</title>

    <link rel="icon" href="https://paymaster.ru/Content/img/favico.ico" type="image/x-icon">
    <link href="https://paymaster.ru/content/css/styles.css?v=VmUO_daHKnGgzkzMjLGD1daBjTxvqoLa0MOXtIKpk2I1" rel="stylesheet">

</head>

<body>
    <div class="pp-viewport">
        <div class="pp-header pp-clearfix">
            <a class="pp-logo"></a>
        </div>
	
		<div class="pp-message pp-error">
			<h3>Ошибка при выполнении платежа: <?=$_REQUEST['error_mess'];?></h3>    
		</div>

		<div class="pp-buttons pp-clearfix" id="buttonsBar" style="display: block;">
			<a class="button primary-btn right-aligned" type="button" id="returnToMerchant" href="javascript:returnToSite();">
				Вернуться в магазин
			</a>
			<script>
				function returnToSite() {
				  top.location.href = "https://fourwars.ru/";
				}
			</script>
		</div>

        <div class="pp-footer">
            <div>
                <div class="pp-copyrights">
                    ©&nbsp;2010–2019&nbsp;PayMaster
                </div>
			</div>
            <div>
                <ul class="pp-langs">
                    <li>
                        <a>
                            <img src="https://paymaster.ru/Content/images/lang-ru.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>