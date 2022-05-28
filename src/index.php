<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>他人のツイートをプロフィールに固定できるツール - pin.rin.pink</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>
							<h1>pin.rin.pink</h1>
							<p>他人のツイートをプロフィールに固定できるツール</p>
						</header>
						<hr />
						<p>固定したいツイートのURLを入力してください。<br>実行をタップするとTwitter認証後<br>固定ツイート処理を行います。<br>ご利用の際は、自己責任でお願い致します。</p>

						<form method="post" action="execute.php">
							<div class="field">
								<input type="text" name="url" id="url" placeholder="https://twitter.com/i/status/000000" />
							</div>
							<ul class="actions" type="submit">
								<input type="submit" value="実行">
							</ul>
						</form>
						<hr />
						<p>処理後、連携アプリから rin.pink を<br>必ず切断してください。</p>
						<a href="https://twitter.com/settings/connected_apps" class="button">連携アプリ設定</a>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; rin.pink</li>
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>