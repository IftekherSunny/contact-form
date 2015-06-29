
	new Vue({
		el: "#app",

		data: {
			message: {
				email: '',
				name: '',
				body: ''
			},

			errors: '',

			success: '',

			waiting: false
		},

		methods: {
			onFormSubmit: function (e) {
				e.preventDefault();
				var self = this;
				this.waiting = true;

				Vue.http.post('/contact-form/api/email.php', this.message).success(function (response) {
					self.errors = '';
					self.success = response;
					self.waiting = false;
					self.message = {
						email: '',
						name: '',
						body: ''
					}
				}).error(function (response) {
					self.success = '';
					self.errors = response;
					self.waiting = false;
				})
			}
		}

	}); 