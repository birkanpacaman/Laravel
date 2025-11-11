(function() {
	document.addEventListener('DOMContentLoaded', function() {
		var submit_text = 'GET FREE CONSULTATION';
		var load_text = 'LOADING..';

		document.querySelector('form#demo-form2').addEventListener('submit', function(event) {
			var form = this;

			var submit = document.getElementById('submit');
			submit.innerText = load_text;
			submit.disabled = true;

			const hasErrorBorderEl = document.querySelectorAll(".has-error-border");
			[].forEach.call(hasErrorBorderEl, function(el) {
				el.classList.remove("has-error-border");
			});
			const hasErrorEl = document.querySelectorAll(".form-element.has-error");
			[].forEach.call(hasErrorEl, function(el) {
				el.classList.remove("has-error");
			});
			const helpBlockEl = document.querySelectorAll(".help-block");
			[].forEach.call(helpBlockEl, function(el) {
				el.remove();
			});

			var _token = form.querySelector('input[name="_token"]').value;

			fetch(form.getAttribute('action'), {
				method: form.getAttribute('method'),
				body: new FormData(form),
				headers: { 'X-CSRF-TOKEN': _token }
			}).then(res => res.text()).then(function(form) {
				var data = JSON.parse(form);
				console.log(data);

				submit.innerText = submit_text;
				submit.disabled = false;

				document.getElementById('alert_warning')?.remove();

				const alertEl = document.getElementById('alert');

				if (data.success == 9) {
					const terms = document.getElementById('terms');
					if (!terms.checked) {
						submit.innerText = submit_text;
						submit.disabled = false;

						const group_terms = terms.closest('.form-check');
						group_terms.classList.add('has-error');
						group_terms.insertAdjacentHTML('beforeend',
							'<div class="help-block text-danger small mt-1">You must agree to the Terms & Conditions.</div>'
						);
						return;
					}

					if (data.errors.name) {
						const name = document.querySelector('input[name="name"]');
						name.classList.add('has-error-border');

						const group_name = document.getElementById('group_name');
						group_name.classList.add('has-error');
						group_name.innerHTML += '<div class="help-block">' + data.errors.name + '</div>';
					}
					if (data.errors.email) {
						const email = document.querySelector('input[name="email"]');
						email.classList.add('has-error-border');

						const group_email = document.getElementById('group_email');
						group_email.classList.add('has-error');
						group_email.innerHTML += '<div class="help-block">' + data.errors.email + '</div>';
					}
					if (data.errors.phone) {
						const phone = document.querySelector('input[name="phone"]');
						phone.classList.add('has-error-border');

						const group_phone = document.getElementById('group_phone');
						group_phone.classList.add('has-error');
						group_phone.innerHTML += '<div class="help-block">' + data.errors.phone + '</div>';
					}

					alertEl.innerHTML += data.message;

				} else if (data.success == 1) {
					// console.log(json_data.success);
					alertEl.innerHTML += data.message;
					document.querySelector('input[name="name"]').value = '';
					document.querySelector('input[name="email"]').value = '';
					document.querySelector('input[name="phone"]').value = '';
				}
			}).catch(
				error => { console.log(error); }
			);
			event.preventDefault();
		});
	});
})(); 