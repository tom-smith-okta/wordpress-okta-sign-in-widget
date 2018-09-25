
<script
	src="https://ok1static.oktacdn.com/assets/js/sdk/okta-signin-widget/2.6.0/js/okta-sign-in.min.js"
	type="text/javascript"></script>

<link
	href="https://ok1static.oktacdn.com/assets/js/sdk/okta-signin-widget/2.6.0/css/okta-sign-in.min.css"
	type="text/css"
	rel="stylesheet"/>

<link
	href="https://ok1static.oktacdn.com/assets/js/sdk/okta-signin-widget/2.6.0/css/okta-theme.css"
	type="text/css"
	rel="stylesheet"/>

<div id="widget-container"></div>

<script>
	var signIn = new OktaSignIn({
		baseUrl: '<?php echo OKTA_BASE_URL ?>',
		clientId: '<?php echo OKTA_CLIENT_ID ?>',
		redirectUri: '<?php echo wp_login_url() ?>',
		authParams: {
			issuer: 'default',
			responseType: 'code',
			display: 'page',
			scopes: ['openid', 'email']
			// state: TODO
		}
	});

	<?php
		$redirect_uri = "";
		if (isset($_GET["redirect_to"])) { $redirect_uri = $_GET["redirect_to"]; }
	?>

	var origin_uri = '<?php echo $redirect_uri ?>'

	// alert("the redirect_uri is: " + origin_uri)

	var token_obj = signIn.tokenManager.get('id_token');

	if (token_obj) {
		console.log("we found a token!!")

		console.log("Welcome, " + token_obj.claims.given_name)

		console.log("the id token is: " + token_obj.idToken)

		redirectUri = '<?php echo wp_login_url() ?>' + '?id_token=' + token_obj.idToken

		redirectUri = redirectUri + '&redirect_uri=' + origin_uri

		console.log("the redirect url is: " + redirectUri)

		// alert ("the redirect url is: " + redirectUri)

		window.location = redirectUri
	}

	signIn.renderEl({
			el: '#widget-container'
		},
		function success(res) {}
	);
</script>