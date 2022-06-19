$(document).ready(function() {
				$('#paymentsform').bootstrapValidator({
					fields: {
						payment_amount: {
							validators: {
								notEmpty: {
									message: 'The amount is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[0-9\.]+$/,
									message: 'The input is not a valid amount'
								}
							}
						},
						invoice_id: {
							  validators: {
								  notEmpty: {
									message: 'The invoice number is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[0-9\.]+$/,
									message: 'The input is not a valid number'
								}
							}
						},
						date: {
							  validators: {
								  notEmpty: {
									message: 'The cheque date is required and can\'t be empty'
								}
							}
						},
						number: {
							  validators: {
								  notEmpty: {
									message: 'The cheque number is required and can\'t be empty'
								}
							}
						},
					}
				});
			});