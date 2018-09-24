<script
	src="https://ok1static.oktacdn.com/assets/js/sdk/okta-signin-widget/2.6.0/js/okta-sign-in.min.js"
	type="text/javascript"></script>

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
		}
	});

	signIn.tokenManager.clear()

	home_url = '<?php echo home_url() ?>'

	window.location = home_url

</script>