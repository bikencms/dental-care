(function ($) {
    "use strict";

    document.getElementById('appointmentForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const submitBtn = document.getElementById('submitBtn');
        const loading = document.getElementById('formLoading');
        const btnText = submitBtn.querySelector('.btn-text');

        // Loading ON
        submitBtn.disabled = true;
        loading.classList.remove('d-none');
        btnText.textContent = 'Submitting...';

        const formData = new FormData(this);

        const data = {
            status: formData.get('status'),
            language: formData.get('language'),
            fullname: formData.get('name'),
            email: formData.get('email'),
            phone: formData.get('phone'),
            interest: formData.getAll('interest[]'),
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
        } finally {
            // Loading OFF
            submitBtn.disabled = false;
            loading.classList.add('d-none');
            btnText.textContent = 'Submit';
        }
    });

})(jQuery);