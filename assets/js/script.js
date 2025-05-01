$(document).ready(function() {
    const regionLimits = { 1: 1200, 2: 800, 3: 500 };
    const brandTypes = {
        'rosneft': ['petrol'],
        'tatneft': ['petrol', 'diesel'],
        'lukoil': ['petrol', 'diesel'],
        'shell': ['gas'],
        'gazprom': ['gas'],
        'bashneft': ['gas']
    };
    const MAX_SERVICES = 4;

    const state = {
        region: 1,
        pump: 100,
        fuelType: 'petrol',
        isInitialLoad: true
    };

    const $elements = {
        pumpInput: $('#pumpInput'),
        pumpRange: $('#pumpRange'),
        pumpValue: $('#pumpValue'),
        maxPump: $('#maxPump'),
        tariffInfo: $('.tariff-text'),
        tariffDiscount: $('#tariffDiscount'),
        serviceChecks: $('.service-check'),
        serviceOptions: $('.brand-option, .service-option'),
        servicesError: $('#servicesError'),
        monthlySave: $('#monthlySave'),
        yearlySave: $('#yearlySave')
    };
    let monthlyCost = 0;
    let totalDiscount = 0;

    function init() {
        setupEventHandlers();
        updateRegionInfo();
        updateBrands();
        updatePumpDisplay(state.pump);
        calculate();
    }

    function setupEventHandlers() {
        $('#regionSelect').change(function() {
            state.region = parseInt($(this).val());
            updateRegionInfo();
            calculate();
        });

        $elements.pumpRange.on('input', function() {
            state.pump = parseInt($(this).val());
            updatePumpDisplay(state.pump);
            calculate();
        });

        $elements.pumpInput.on('input', function() {
            const numericValue = parseInt($(this).val().replace(/\D/g, '')) || 0;
            const max = regionLimits[state.region];
            const value = Math.min(Math.max(1, numericValue), max);

            state.pump = value;
            $elements.pumpRange.val(value);
            updatePumpDisplay(value);
            calculate();
        });

        $elements.pumpInput.on('focus', function() {
            $(this).val(state.pump);
        }).on('blur', function() {
            updatePumpDisplay(state.pump);
        });

        $('input[name="fuelType"]').change(function() {
            state.fuelType = $(this).val();
            updateBrands();
            calculate();
        });

        $elements.serviceChecks.change(function() {
            const $checked = $elements.serviceChecks.filter(':checked');

            if ($checked.length > MAX_SERVICES) {
                $(this).prop('checked', false);
                $elements.servicesError.show().delay(3000).fadeOut();
                return;
            }

            if ($checked.length === MAX_SERVICES) {
                $elements.serviceChecks.not(':checked')
                    .prop('disabled', true)
                    .closest('.brand-option, .service-option')
                    .addClass('disabled-option');
            } else {
                $elements.serviceChecks.prop('disabled', false)
                    .closest('.brand-option, .service-option')
                    .removeClass('disabled-option');
            }

            $elements.serviceOptions.removeClass('selected-service');
            $checked.closest('.brand-option, .service-option')
                .addClass('selected-service');

            calculate();
        });

        $('body').on('change', 'input[name="promo"]', function() {
            $('input[name="promo"]').not(this).prop('checked', false);
            calculate();
        });
    }

    function getTonWordForm(num) {
        num = Math.abs(num) % 100;
        const num1 = num % 10;
        if (num > 10 && num < 20) return 'тонн';
        if (num1 > 1 && num1 < 5) return 'тонны';
        if (num1 === 1) return 'тонна';
        return 'тонн';
    }

    function formatCurrency(amount) {
        return amount.toLocaleString('ru-RU') + ' ₽';
    }

    function updateRegionInfo() {
        const maxPump = regionLimits[state.region];
        let graduationElement = $('.graduation div');
        graduationElement.eq(1).text(maxPump / 2 +' тонн');
        graduationElement.eq(2).text(maxPump+'+ тонн');

        $elements.pumpRange.attr('max', maxPump);
        $elements.maxPump.text(maxPump);

        if (state.pump > maxPump) {
            state.pump = maxPump;
            $elements.pumpRange.val(maxPump);
        }

        updatePumpDisplay(state.pump);
    }

    function updatePumpDisplay(value) {
        const tonWord = getTonWordForm(value);
        $elements.pumpInput.val(`${value} ${tonWord}`);
        $elements.pumpValue.text(`${value} ${tonWord}`);
    }

    function updateBrands() {
        $('.brand-option').each(function() {
            const brandValue = $(this).find('input').val();
            const isSupported = brandTypes[brandValue]?.includes(state.fuelType);

            $(this).toggleClass('disabled-option', !isSupported)
                .find('input').prop('disabled', !isSupported);
        });

        $('.brand-option:not(.disabled-option)').first()
            .find('input').prop('checked', true);
    }

    function calculate() {
        const formData = {
            region: state.region,
            pump: state.pump,
            fuelType: state.fuelType,
            brand: $('input[name="brand"]:checked').val(),
            services: $('input[name="services[]"]:checked').map(function() {
                return $(this).val();
            }).get(),
            promo: $('input[name="promo"]:checked').val() || 0
        };

        $.ajax({
            url: 'includes/calculate.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    updateUI(response);
                    monthlyCost = formatCurrency(response.monthlyCost);
                    totalDiscount = response.totalDiscount + '%';
                } else {
                    console.error('Ошибка сервера:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    function updateUI(data) {
        $elements.tariffInfo.text(data.tariff.name);
        $elements.tariffDiscount.text(data.tariff.discount);

        $elements.monthlySave.text(formatCurrency(data.monthlySave));
        $elements.yearlySave.text(formatCurrency(data.yearlySave));

        updatePromos(data.availablePromos, data.defaultPromo);
    }

    function updatePromos(availablePromos, defaultPromo) {
        const allPromos = ['50', '20', '5', '2'];

        allPromos.forEach(promo => {
            const $promoInput = $(`#promo${promo}`);
            const $promoOption = $promoInput.closest('.promo-option');

            if (availablePromos.includes(promo)) {
                $promoInput.prop('disabled', false);
                $promoOption.removeClass('disabled-option');
            } else {
                $promoInput.prop('disabled', true);
                $promoOption.addClass('disabled-option');
                $promoInput.prop('checked', false);
            }
        });

        if (!$('input[name="promo"]:checked').length && defaultPromo) {
            $(`#promo${defaultPromo}`).prop('checked', true);
        }
    }

    init();

    const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));

    $('#phoneInput').on('input', function() {
        $(this).val($(this).val().replace(/\D/g, ''));
        validateForm();
    });

    $('#innInput').on('input', function() {
        $(this).val($(this).val().replace(/\D/g, ''));
        validateForm();
    });

    $('#agreementCheck').change(function() {
        validateForm();
    });

    function validateForm() {
        const inn = $('#innInput').val().trim();
        const phone = $('#phoneInput').val().trim();
        const isAgreed = $('#agreementCheck').is(':checked');

        const isInnValid = inn.length === 12;
        const isPhoneValid = phone.length === 11;

        if (isInnValid && isPhoneValid && isAgreed) {
            $('#submitBtn').prop('disabled', false);
        } else {
            $('#submitBtn').prop('disabled', true);
        }
    }

    $('#orderForm').submit(function(e) {
        e.preventDefault();

        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').hide();
        $('#formMessage').hide().removeClass('alert-success alert-danger');

        let isValid = true;
        const inn = $('#innInput').val().trim();
        const phone = $('#phoneInput').val().trim();
        const email = $('#emailInput').val().trim();
        const isAgreed = $('#agreementCheck').is(':checked');

        if (!/^\d{12}$/.test(inn)) {
            $('#innInput').addClass('is-invalid');
            $('#innError').show();
            isValid = false;
        }

        if (!/^\d{11}$/.test(phone)) {
            $('#phoneInput').addClass('is-invalid');
            $('#phoneError').show();
            isValid = false;
        }

        if (!isAgreed) {
            $('#agreementCheck').addClass('is-invalid');
            $('#agreementError').show();
            isValid = false;
        }

        if (isValid) {
            submitOrderForm(inn,phone,email);
        }
    });

    function submitOrderForm(inn,phone,email) {
        const orderData = {
            formData: {
                inn: inn,
                phone: phone,
                email: email
            },
            calculatorData: {
                region: $('#regionSelect option:selected').text(),
                pump: state.pump,
                fuelType: $('input[name="fuelType"]:checked').data('name'),
                brand: $('input[name="brand"]:checked').data('name'),
                services: $('input[name="services[]"]:checked').map(function() {
                    return $(this).val();
                }).get(),
                tariff: $('.modal-title .tariff-text').text(),
                promo: $('input[name="promo"]:checked').data('name') || 'Не выбрано',
                monthlyCost: monthlyCost,
                totalDiscount: totalDiscount,
                monthlySave: $('#monthlySave').text(),
                yearlySave: $('#yearlySave').text(),
                timestamp: new Date().toISOString()
            }
        };
        $.ajax({
            url: 'includes/submit_order.php',
            type: 'POST',
            data: orderData,
            dataType: 'json',
            success: function(response) {
                const messageEl = $('#formMessage');

                if (response.success) {
                    $('#orderForm')[0].reset();
                    $('#submitBtn').prop('disabled', true);
                    messageEl.text('Спасибо! Успешно отправлено.')
                        .addClass('alert-success')
                        .show();

                    setTimeout(() => {
                        orderModal.hide();
                        messageEl.hide().removeClass('alert-success');
                    }, 7000);
                } else {
                    messageEl.text('Ошибка: ' + response.message)
                        .addClass('alert-danger')
                        .show();

                    if (response.errors) {
                        Object.keys(response.errors).forEach(field => {
                            $(`#${field}Input`).addClass('is-invalid');
                            $(`#${field}Error`).text(response.errors[field]).show();
                        });
                    }
                }
            },
            error: function(xhr) {
                $('#formMessage').text('Ошибка соединения с сервером')
                    .addClass('alert-danger')
                    .show();
            }
        });
    }
});