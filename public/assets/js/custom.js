(function ($) {
    "use strict";
	document.getElementById('appointmentForm').addEventListener('submit', async function (e) {
		e.preventDefault();

		const formData = new FormData(this);

		const data = {
			name: formData.get('name'),
			email: formData.get('email'),
			phone: formData.get('phone'),
			interest: formData.get('interest'),
			briefly: formData.get('briefly')
		};

		try {
			const response = await fetch('/api/contacts', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json'
				},
				body: JSON.stringify(data)
			});

			const result = await response.json();

			if (response.ok) {
				alert(result.message);
				this.reset();
			} else {
				alert(result.message || 'Submit failed');
				console.log(result);
			}
		} catch (error) {
			console.error(error);
			alert('Server error');
		}
	});
})(jQuery);