grecaptcha.ready(function () {
	grecaptcha.execute('your_key', {
			action: 'action_name'
		})
		.then(function (token) {
			// Verify the token on the server.
		});
});