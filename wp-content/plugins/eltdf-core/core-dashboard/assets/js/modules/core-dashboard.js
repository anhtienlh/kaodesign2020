(function ($) {
	'use strict';

	var dashboard = {};

	dashboard.eltdfOnDocumentReady = eltdfOnDocumentReady;

	$(document).ready(eltdfOnDocumentReady);

	/**
	 *  All functions to be called on $(document).ready() should be in eltdfImport function
	 **/
	function eltdfOnDocumentReady() {
		eltdfThemeRegistration.init();
		eltdfImport.init();
		eltdfThemeSelectDemo();
		eltdfInitSwitch();
	}

	var eltdfImport = {
		importDemo: '',
		importImages: 0,
		counterStep: 0,
		contentCounter: 0,
		totalPercent: 0,
		contentFlag: false,
		allFlag: false,
		contentFinished: false,
		allFinished: false,
		repeatFiles: [],

		init: function () {
			eltdfImport.holder = $('.eltdf-cd-import-form');

			if (eltdfImport.holder.length) {
				eltdfImport.holder.each(function () {
					var eltdfImportBtn = $('#eltdf-import-demo-data'),
						importAction = $('.eltdf-cd-import-option'),
						importDemoElement = $('.eltdf-import-demo'),
						confirmMessage = eltdfImport.holder.data('confirm-message');

					importAction.on('change', function (e) {
						eltdfImport.populateSinglePage(importAction.val(), $('.eltdf-import-demo').val(), false);
					});
					importDemoElement.on('change', function (e) {
						eltdfImport.populateSinglePage(importAction.val(), $('.eltdf-import-demo').val(), true);
					});
					eltdfImportBtn.on('click', function (e) {
						e.preventDefault();
						eltdfImport.reset();
						eltdfImport.importImages = $('.eltdf-cd-import-attachments').is(':checked') ? 1 : 0;
						eltdfImport.importDemo = importDemoElement.val();

						if (confirm(confirmMessage)) {
							$('.eltdf-cd-box-form-section-progress').show();
							$(this).addClass('eltdf-import-demo-data-disabled');
							$(this).attr("disabled", true);
							eltdfImport.initImportType(importAction.val());
						}
					});
				});
			}
		},

		initImportType: function (action) {
			switch (action) {
				case 'widgets':
					eltdfImport.importWidgets();
					break;
				case 'options':
					eltdfImport.importOptions();
					break;
				case 'content':
					eltdfImport.contentFlag = true;
					eltdfImport.importContent();
					break;
				case 'complete':
					eltdfImport.allFlag = true;
					eltdfImport.importAll();
					break;
				case 'single-page':
					eltdfImport.importSinglePage();
					break;
			}
		},

		importWidgets: function () {
			var data = {
				action: 'widgets',
				demo: eltdfImport.importDemo
			};
			eltdfImport.importAjax(data);
		},

		importOptions: function () {
			var data = {
				action: 'options',
				demo: eltdfImport.importDemo
			};
			eltdfImport.importAjax(data);
		},

		importSettingsPages: function () {
			var data = {
				action: 'settings-page',
				demo: eltdfImport.importDemo
			};
			eltdfImport.importAjax(data);
		},

		importMenuSettings: function () {
			var data = {
				action: 'menu-settings',
				demo: eltdfImport.importDemo
			};
			eltdfImport.importAjax(data);
		},

		importRevSlider: function () {
			var data = {
				action: 'rev-slider',
				demo: eltdfImport.importDemo
			};
			eltdfImport.importAjax(data);
		},

		importContent: function () {
			if (eltdfImport.contentCounter == 0) {
				eltdfImport.importTerms();
			}
			if (eltdfImport.contentCounter == 1) {
				eltdfImport.importAttachments();
			}
			if ((eltdfImport.contentCounter > 1 && eltdfImport.contentCounter < 20) && eltdfImport.repeatFiles.length) {
				eltdfImport.importAttachments(true);
			}
			if (eltdfImport.contentCounter == 20) {
				eltdfImport.importPosts();
			}
		},

		importAll: function () {

			if (eltdfImport.contentCounter < 21) {
				eltdfImport.importContent();
			} else {
				eltdfImport.contentFinished = true;
			}

			if (eltdfImport.contentFinished && !eltdfImport.allFinished) {
				eltdfImport.importWidgets();
				eltdfImport.importOptions();
				eltdfImport.importSettingsPages();
				eltdfImport.importMenuSettings();
				eltdfImport.importRevSlider();
				eltdfImport.allFinished = true;
			}

		},
		importTerms: function () {
			var data = {
				action: 'content',
				xml: 'ambient_content_0.xml',
				contentStart: true
			};
			eltdfImport.importAjax(data);
		},
		importPosts: function () {
			var data = {
				action: 'content',
				xml: 'ambient_content_20.xml',
				updateURL: true
			};
			eltdfImport.importAjax(data);
		},

		importSinglePage: function () {
			var postId = $('#import_single_page').val();
			var data = {
				action: 'content',
				xml: 'ambient_content_20.xml',
				post_id: postId
			};
			eltdfImport.importAjax(data);
		},

		importAttachments: function (repeat) {
			if (eltdfImport.repeatFiles.length && repeat) {
				eltdfImport.repeatFiles.forEach(function (index) {
					var data = {
						action: 'content',
						xml: index,
						images: eltdfImport.importImages
					};
					eltdfImport.importAjax(data);
				});
				eltdfImport.repeatFiles = [];

			}

			if (!repeat) {
				for (var i = 1; i < 20; i++) {
					var xml = i < 20 ? 'ambient_content_' + i + '.xml' : 'ambient_content_' + i + '.xml';
					var data = {
						action: 'content',
						xml: xml,
						images: eltdfImport.importImages
					};
					eltdfImport.importAjax(data);
				}
			}
		},

		importAjax: function (options) {
			var defaults = {
				demo: eltdfImport.importDemo,
				nonce: $('#eltdf_cd_import_nonce').val()
			};
			$.extend(defaults, options);
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'import_action',
					options: defaults
				},
				success: function (data) {
					var response = JSON.parse(data);
					eltdfImport.ajaxSuccess(response);
				},
				error: function (data) {
					var response = JSON.parse(data);
					eltdfImport.ajaxError(response, options);
				}
			});
		},

		importProgress: function () {
			if (!eltdfImport.contentFlag && !eltdfImport.allFlag) {
				eltdfImport.totalPercent = 100;
			} else if (eltdfImport.contentFlag) {
				if (eltdfImport.contentCounter < 21) {
					eltdfImport.totalPercent += 4.5;
				} else if (eltdfImport.contentCounter == 21) {
					eltdfImport.totalPercent += 10;
				}
			} else if (eltdfImport.allFlag) {
				if (eltdfImport.contentCounter < 21) {
					eltdfImport.totalPercent += 4;
				} else if (eltdfImport.contentCounter == 21) {
					eltdfImport.totalPercent += 10;
				} else {
					eltdfImport.totalPercent += 2;
				}
			}

			$('#eltdf-progress-bar').val(eltdfImport.totalPercent);
			$('.eltdf-cd-progress-percent').html(Math.round(eltdfImport.totalPercent) + '%');

			if (eltdfImport.totalPercent == 100) {
				$('#eltdf-import-demo-data').remove('.eltdf-import-demo-data-disabled');
				$('.eltdf-cd-import-is-completed').show();

			}
		},

		ajaxSuccess: function (response) {
			if (typeof response.status !== 'undefined' && response.status == 'success') {
				if (eltdfImport.contentFlag) {
					eltdfImport.contentCounter++;
					eltdfImport.importContent();
				}
				if (eltdfImport.allFlag) {
					eltdfImport.contentCounter++;
					eltdfImport.importAll();
				}
				eltdfImport.importProgress();
			} else {
				if (typeof response.data.type !== 'undefined' && response.data.type == 'content') {
					eltdfImport.repeatFiles.push(response.data['xml'])
				} else if (typeof response.data.type !== 'undefined' && response.data.type == 'options') {
					$('#eltdf-import-demo-data').remove('.eltdf-import-demo-data-disabled');
					$('.eltdf-cd-import-went-wrong').show();

				}
			}
		},

		ajaxError: function (response, options) {
			if ("xml" in options) {
				if (eltdfImport.contentFlag) {
					eltdfImport.importContent();
				}
				if (eltdfImport.allFlag) {
					eltdfImport.importAll();
				}
				eltdfImport.repeatFiles.push(options.xml);

			}
		},

		reset: function () {
			eltdfImport.totalPercent = 0;
			$('#eltdf-progress-bar').val(0);
		},

		populateSinglePage: function (value, demo, demoChange) {
			var holder = $('.eltdf-cd-box-form-section-dependency'),
				options = {
					demo: demo,
					nonce: $('#eltdf_cd_import_nonce').val()
				};

			if (value == 'single-page') {
				if (holder.children().length == 0 || demoChange) {

					$.ajax({
						type: 'POST',
						url: ajaxurl,
						data: {
							action: 'populate_single_pages',
							options: options
						},
						success: function (data) {
							var response = $.parseJSON(data);
							if (response.status == 'success') {
								$('.eltdf-cd-box-form-section-dependency').html(response.data);
								var singlePageList = $('select.eltdf-cd-import-single-page');
								holder.show();
								singlePageList.select2({
									dropdownCssClass: "eltdf-cd-single-page-selection"
								});
							} else {
								holder.html(response.message);
								holder.show();
							}
						}
					});
				} else {
					holder.show();
				}

			} else {
				holder.hide();
			}
		},
	};

	var eltdfThemeRegistration = {
		init: function () {
			eltdfThemeRegistration.holder = $('#eltdf-register-purchase-form');

			if (eltdfThemeRegistration.holder.length) {
				eltdfThemeRegistration.holder.each(function () {

					var form = $(this);

					var eltdfRegistrationBtn = $(this).find('#eltdf-register-purchase-key'),
						eltdfdeRegistrationBtn = $(this).find('#eltdf-deregister-purchase-key');

					eltdfRegistrationBtn.on('click', function (e) {
						e.preventDefault();
						$(this).addClass('eltdf-cd-button-disabled');
						$(this).attr("disabled", true);
						$(this).siblings('.eltdf-cd-button-wait').show();
						if (eltdfThemeRegistration.validateFields(form)) {
							var post = form.serialize();
							eltdfThemeRegistration.registration(post);
						} else {
							$(this).removeClass('eltdf-cd-button-disabled');
							$(this).attr("disabled", false);
							$(this).siblings('.eltdf-cd-button-wait').hide();
						}

					});

					eltdfdeRegistrationBtn.on('click', function (e) {
						$(this).addClass('eltdf-cd-button-disabled');
						$(this).attr("disabled", true);
						$(this).siblings('.eltdf-cd-button-wait').show();
						e.preventDefault();
						eltdfThemeRegistration.deregistration();
					});
				});
			}
		},

		registration: function (post) {
			var data = {
				action: 'register',
				post: post
			};
			eltdfThemeRegistration.registrationAjax(data);
		},

		deregistration: function () {
			var data = {
				action: 'deregister',
			};
			eltdfThemeRegistration.registrationAjax(data);
		},

		validateFields: function (form) {
			if (eltdfThemeRegistration.validatePurchaseCode(form) && eltdfThemeRegistration.validateEmail(form)) {
				return true
			}
		},

		validateEmail: function (form) {
			var email = form.find("[name='email']");
			var emailVal = email.val();
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (emailVal !== '' && regex.test(emailVal)) {
				email.removeClass('eltdf-cd-error-field');
				email.parent().find('.eltdf-cd-error-message').remove();
				return true
			} else if (emailVal == '') {
				email.addClass('eltdf-cd-error-field');
				eltdfThemeRegistration.errorMessage(email.parent().data("empty-field"), email.parent());
			} else if (!regex.test(emailVal)) {
				email.addClass('eltdf-cd-error-field');
				eltdfThemeRegistration.errorMessage(email.parent().data("invalid-field"), email.parent());
			}
		},

		validatePurchaseCode: function (form) {
			var purchaseCode = form.find("[name='purchase_code']");
			var purchaseCodeVal = purchaseCode.val();

			if (purchaseCodeVal !== '') {
				purchaseCode.removeClass('eltdf-cd-error-field');
				purchaseCode.parent().find('.eltdf-cd-error-message').remove();
				return true
			} else {
				eltdfThemeRegistration.errorMessage(purchaseCode.parent().data("empty-field"), purchaseCode.parent());
				purchaseCode.addClass('eltdf-cd-error-field');
			}
		},

		errorMessage: function (message, target) {
			target.find('.eltdf-cd-error-message').remove();
			$('<span class="eltdf-cd-error-message"></span>').text(message).appendTo(target);
		},

		registrationAjax: function (options) {
			$.ajax({
				type: 'POST',
				url: eltdfCoreDashboardGlobalVars.vars.restUrl + eltdfCoreDashboardGlobalVars.vars.registrationThemeRoute,
				data: {
					options: options
				},
				success: function (response) {
					if (response.status == 'success') {
						location.reload();
					} else if (response.status == 'error' && ((typeof response.data['purchase_code'] !== 'undefined' && response.data['purchase_code'] === false) || (typeof response.data['already_used'] !== 'undefined' && response.data['already_used'] === true))) {
						eltdfThemeRegistration.errorMessage(response.message, $("[name='purchase_code']").parent());
						$('#eltdf-register-purchase-key').removeClass('eltdf-cd-button-disabled');
						$('#eltdf-register-purchase-key').attr("disabled", false);
						$('#eltdf-register-purchase-key').siblings('.eltdf-cd-button-wait').hide();
					} else if (response.status == 'error') {
						alert(response.message);
					}

				},
				error: function (response) {
					console.log(response);
				}
			});
		}
	};


	function eltdfThemeSelectStyles(selection) {
		if (!selection.id) {
			return selection.text;
		}

		var thumb = $(selection.element).data('thumb');
		if (!thumb) {
			return selection.text;
		} else {
			var $selection = $(
				'<img src="' + thumb + '" alt="Demo Thumbnail"><span class="img-changer-text">' + $(selection.element).text() + '</span>'
			);
			return $selection;
		}
	}

	function eltdfThemeSelectDemo() {
		var themeList = $('select.eltdf-import-demo');

		if(themeList.length) {
            themeList.select2({
                templateResult: eltdfThemeSelectStyles,
                minimumResultsForSearch: -1,
                dropdownCssClass: "eltdf-cd-selection"
            });
        }

		var optionList = $('select.eltdf-cd-import-option');

		if(optionList.length) {
            optionList.select2({
                minimumResultsForSearch: -1,
                dropdownCssClass: "eltdf-cd-action-selection"
            });
        }
	}

	function eltdfInitSwitch() {
		$(".eltdf-cd-cb-enable").on('click', function () {
			var parent = $(this).parents('.eltdf-cd-switch');
			$('.eltdf-cd-cb-disable', parent).removeClass('selected');
			$(this).addClass('selected');
			$('.eltdf-cd-import-attachments', parent).attr('checked', true);
		});

		$(".eltdf-cd-cb-disable").on('click', function () {
			var parent = $(this).parents('.eltdf-cd-switch');
			$('.eltdf-cd-cb-enable', parent).removeClass('selected');
			$(this).addClass('selected');
			$('.eltdf-cd-import-attachments', parent).attr('checked', false);
		});
	}

})(jQuery);