<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор тарифов</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container py-5">

    <form id="fuelCalculatorForm" class="row align-items-start">
        <div class="col-xxl-6 col-xl-12">

            <div class="calculator-card">
                <h1 class="text-center mb-5">Калькулятор тарифов</h1>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="form-floating">
                            <select class="form-select" id="regionSelect" name="region"
                                    aria-label="Укажите регион передвижения">
                                <option value="1" selected>Ленинградская область</option>
                                <option value="2">Московская область</option>
                                <option value="3">Нижегородская область</option>
                            </select>
                            <label for="regionSelect">Укажите регион передвижения</label>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="pumpInput" name="pump_input"
                                   value="100 тонн" placeholder="Прокачка">
                            <label for="pumpInput">Прокачка</label>
                            <input type="range" class="form-range mt-3" min="1" max="1200" step="1" id="pumpRange"
                                   name="pump" value="100">
                        </div>
                        <div class="graduation">
                            <div>1 тонна</div>
                            <div>250 тонн</div>
                            <div>500+ тонн</div>
                        </div>
                    </div>

                    <div class="mt-7">
                        <div class="btn-group w-100 btn-group-type" role="group">
                            <input type="radio" class="btn-check" name="fuelType" id="fuelPetrol" value="petrol"
                                   data-name="Бензин"
                                   checked>
                            <label class="btn btn-outline-primary" for="fuelPetrol">Бензин</label>

                            <input type="radio" class="btn-check" name="fuelType" id="fuelGas" value="gas"
                                   data-name="Газ">
                            <label class="btn btn-outline-primary" for="fuelGas">Газ</label>

                            <input type="radio" class="btn-check" name="fuelType" id="fuelDiesel" value="diesel"
                                   data-name="ДТ">
                            <label class="btn btn-outline-primary" for="fuelDiesel">ДТ</label>
                        </div>
                    </div>

                    <div class="mb-5 mt-8">
                        <h5 class="mb-5">Укажите любимый бренд</h5>
                        <div class="text-center btn-group-brand">
                            <div class="brand-option gas-brand">
                                <input type="radio" class="btn-check" name="brand" id="brandShell" data-name="Shell"
                                       value="shell"
                                       checked>
                                <label class="btn btn-icon" for="brandShell">
                                <span class="icon" style="background: #FBCE07">
                                    <svg class="brand-icon"><use xlink:href="#shell-icon"></use></svg>
                                </span>
                                    <span class="option-title">Shell</span>
                                </label>
                            </div>
                            <div class="brand-option">
                                <input type="radio" class="btn-check" name="brand" id="brandGazprom" data-name="Газпром"
                                       value="gazprom">
                                <label class="btn btn-icon" for="brandGazprom">
                                <span class="icon">
                                    <svg class="brand-icon"><use xlink:href="#gazprom-icon"></use></svg>
                                </span>
                                    <span class="option-title">Газпром</span>
                                </label>
                            </div>
                            <div class="brand-option">
                                <input type="radio" class="btn-check" name="brand" id="brandRosneft"
                                       data-name="Роснефть"
                                       value="rosneft">
                                <label class="btn btn-icon" for="brandRosneft">
                                <span class="icon">
                                    <svg class="brand-icon"><use xlink:href="#rosneft-icon"></use></svg>
                                </span>
                                    <span class="option-title">Роснефть</span>
                                </label>
                            </div>
                            <div class="brand-option">
                                <input type="radio" class="btn-check" name="brand" id="brandTatneftDiesel"
                                       data-name="Татнефть"
                                       value="tatneft">
                                <label class="btn btn-icon" for="brandTatneftDiesel">
                                <span class="icon">
                                    <svg class="brand-icon"><use xlink:href="#tatneft-icon"></use></svg>
                                </span>
                                    <span class="option-title">Татнефть</span>
                                </label>
                            </div>
                            <div class="brand-option">
                                <input type="radio" class="btn-check" name="brand" id="brandLukoil" data-name="Лукойл"
                                       value="lukoil">
                                <label class="btn btn-icon" for="brandLukoil">
                                <span class="icon">
                                    <svg class="brand-icon"><use xlink:href="#lukoil-icon"></use></svg>
                                </span>
                                    <span class="option-title">Лукойл</span>
                                </label>
                            </div>
                            <div class="brand-option">
                                <input type="radio" class="btn-check" name="brand" id="brandBashneft"
                                       data-name="Башнефть"
                                       value="bashneft">
                                <label class="btn btn-icon" for="brandBashneft">
                                <span class="icon">
                                    <svg class="brand-icon"><use xlink:href="#bashneft-icon"></use></svg>
                                </span>
                                    <span class="option-title">Башнефть</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-5">Дополнительные услуги</h5>
                        <div class="text-center btn-group-services">
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service1" value="Штрафы">
                                <label class="btn btn-icon" for="service1">
                                <span class="icon" style="background: #C20049">
                                    <svg class="service-icon"><use xlink:href="#fines-icon"></use></svg>
                                </span>
                                    <span class="option-title">Штрафы</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service2" value="Парковки">
                                <label class="btn btn-icon" for="service2">
                                <span class="icon" style="background: #0079C2">
                                    <svg class="service-icon"><use xlink:href="#parking-icon"></use></svg>
                                </span>
                                    <span class="option-title">Парковки</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service3" value="ЭДО">
                                <label class="btn btn-icon" for="service3">
                                <span class="icon" style="background: #8ABBD9">
                                    <svg class="service-icon"><use xlink:href="#edo-icon"></use></svg>
                                </span>
                                    <span class="option-title">ЭДО</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service4" value="Мойки">
                                <label class="btn btn-icon" for="service4">
                                <span class="icon" style="background: #5FADE0">
                                    <svg class="service-icon"><use xlink:href="#washes-icon"></use></svg>
                                </span>
                                    <span class="option-title">Мойки</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service5" value="Отсрочка">
                                <label class="btn btn-icon" for="service5">
                                <span class="icon" style="background: #CBD98A">
                                    <svg class="service-icon"><use xlink:href="#postponement-icon"></use></svg>
                                </span>
                                    <span class="option-title">Отсрочка</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service6" value="Телематика">
                                <label class="btn btn-icon" for="service6">
                                <span class="icon" style="background: #8C8AD9">
                                    <svg class="service-icon"><use xlink:href="#telematics-icon"></use></svg>
                                </span>
                                    <span class="option-title">Телематика</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service7" value="PPRPAY">
                                <label class="btn btn-icon" for="service7">
                                <span class="icon" style="background: #007f77">
                                    <svg class="service-icon"><use xlink:href="#pprpay-icon"></use></svg>
                                </span>
                                    <span class="option-title">PPRPAY</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service8" value="СМС">
                                <label class="btn btn-icon" for="service8">
                                <span class="icon" style="background: #07DE44">
                                    <svg class="service-icon"><use xlink:href="#sms-icon"></use></svg>
                                </span>
                                    <span class="option-title">СМС</span>
                                </label>
                            </div>
                            <div class="service-option">
                                <input type="checkbox" class="btn-check service-check" name="services[]"
                                       id="service9" value="Страховка">
                                <label class="btn btn-icon" for="service9">
                                <span class="icon" style="background: #ffdd21">
                                    <svg class="service-icon"><use xlink:href="#insurance-icon"></use></svg>
                                </span>
                                    <span class="option-title">Страховка</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-text text-danger" id="servicesError" style="display: none;">Можно выбрать
                            не более 4 услуг
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-12">
            <div class="calculator-card-right rounded-3">
                <div class="p-2 p-sm-3 p-md-4 p-lg-5 p-xl-5 p-xxl-5 sec">
                    <div class="mb-4 text-center">
                        <div class="d-flex justify-content-center gap-3 align-items-center">
                            <h5 class="mb-0">Подходящий тариф</h5>
                            <div id="tariffInfo">
                        <span><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0L11.6329 6.56434H18.535L12.9511 10.6213L15.084 17.1857L9.5 13.1287L3.91604 17.1857L6.04892 10.6213L0.464963 6.56434H7.36712L9.5 0Z"
                                  fill="white"/>
                        </svg></span>
                                <span class="tariff-text">Избранный</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center card-wrapper">
                        <img src="assets/img/card.png" alt=""/>
                    </div>
                    <div class="on-map">
                      <span>
                          <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.5 0C4.70846 0 0 4.7126 0 10.5C0 16.2874 4.70846 21 10.5 21C16.2915 21 21 16.2874 21 10.5C21 4.7126 16.2915 0 10.5 0ZM10.5 18.9C5.87008 18.9 2.1 15.1299 2.1 10.5C2.1 5.87008 5.87008 2.1 10.5 2.1C15.1299 2.1 18.9 5.87008 18.9 10.5C18.9 15.1299 15.1299 18.9 10.5 18.9Z"
                                    fill="#636363"/>
                              <path d="M14.1006 6.3329L5.498 9.764C5.09702 9.92522 5.15076 10.5081 5.57241 10.5949L9.32182 11.3349C9.49544 11.3679 9.62773 11.5044 9.6608 11.678L10.4049 15.4026C10.4917 15.8284 11.0746 15.8821 11.2358 15.477L14.6669 6.89924C14.8116 6.54373 14.4561 6.18821 14.1006 6.3329Z"
                                    fill="#636363"/>
                          </svg>
                      </span>
                        <a href="#">Сеть АЗС на карте</a>
                    </div>
                </div>
                <div class="p-2 p-sm-3 p-md-4 p-lg-5 p-xl-5 p-xxl-5 sec">
                    <div class="text-center">
                        <h5 class="mb-4">Выберите промо-акцию:</h5>
                        <div class="text-center btn-group-promo">
                            <div class="promo-option">
                                <input type="radio" class="btn-check promo-check" name="promo"
                                       id="promo50" value="Экономии на штрафах">
                                <label class="btn btn-icon" for="promo50">
                                <span class="icon">
                                    50%
                                </span>
                                    <span class="option-title">Экономии <br>на штрафах</span>
                                </label>
                            </div>
                            <div class="promo-option">
                                <input type="radio" class="btn-check promo-check" name="promo"
                                       id="promo20" value="Возврат НДС">
                                <label class="btn btn-icon" for="promo20">
                                <span class="icon">
                                    20%
                                </span>
                                    <span class="option-title">Возврат <br>НДС</span>
                                </label>
                            </div>
                            <div class="promo-option">
                                <input type="radio" class="btn-check promo-check" name="promo"
                                       id="promo5" value="Скидка на мойку">
                                <label class="btn btn-icon" for="promo5">
                                <span class="icon">
                                    5%
                                </span>
                                    <span class="option-title">Скидка <br>на мойку</span>
                                </label>
                            </div>
                            <div class="promo-option">
                                <input type="radio" class="btn-check promo-check" name="promo"
                                       id="promo2" value="Скидка на топливо">
                                <label class="btn btn-icon" for="promo2">
                                <span class="icon">
                                    2%
                                </span>
                                    <span class="option-title">Скидка <br>на топливо</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 p-sm-3 p-md-4 p-lg-5 p-xl-5 p-xxl-5">
                    <div class="mb-4 result">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between gap-3 gap-sm-5">
                            <div class="result-title">Ваша <br/>экономия:</div>
                            <div class="result-numbers">
                                <div>
                                    <span class="result-label">экономия в год</span>
                                    <div class="result-text" id="yearlySave">0 ₽</div>
                                </div>
                                <div class="separator"></div>
                                <div>
                                    <span class="result-label">экономия в месяц</span>
                                    <div class="result-text" id="monthlySave">0 ₽</div>
                                </div>
                            </div>
                        </div>
                        <div data-bs-toggle="modal" data-bs-target="#orderModal"
                             class="btn btn-primary mt-5 mb-8 yellow-button" id="order">
                            <span>Заказать тариф</span>
                            <span>«<span class="tariff-text">Избранный</span>»</span>
                            <span><svg width="21" height="11" viewBox="0 0 21 11" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
<path d="M1 5.5H20H1ZM20 5.5L15.4583 1L20 5.5ZM20 5.5L15.4583 10L20 5.5Z" fill="black"/>
<path d="M20 5.5L15.4583 10M1 5.5H20H1ZM20 5.5L15.4583 1L20 5.5Z" stroke="black" stroke-width="1.5"
      stroke-linecap="round" stroke-linejoin="round"/>
</svg></span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-wrapper">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h5 class="modal-title">Заказать тариф <br/>«<span class="tariff-text">Избранный</span>»</h5>
                </div>
                <div class="modal-body">
                    <form id="orderForm">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="innInput" name="inn" maxlength="12"
                                   placeholder="Номер ИНН">
                            <div class="invalid-feedback" id="innError">ИНН должен содержать ровно 12 цифр</div>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="phoneInput" name="phone" maxlength="11"
                                   placeholder="Телефон для связи">
                            <div class="invalid-feedback" id="phoneError">Телефон должен содержать ровно 11 цифр</div>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="emailInput" name="email"
                                   placeholder="E-mail для связи">
                            <div class="invalid-feedback" id="emailError">Введите корректный email</div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agreementCheck" name="agreement"
                                   checked>
                            <label class="form-check-label" for="agreementCheck">Согласен с обработкой <a href="#">персональных
                                    данных</a></label>
                        </div>

                        <div id="formMessage" class="alert" style="display:none;"></div>

                        <button type="submit" class="btn yellow-button" id="submitBtn" disabled>
                            <span>Заказать тариф «<span class="tariff-text">Избранный</span>»</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
    <symbol id="shell-icon" viewBox="0 0 42 38">
        <path d="M0.437399 24.8982C0.0672922 23.2988 0 22.6459 0 20.9812C0 9.68708 9.28632 0.645264 20.8269 0.645264C32.4012 0.645264 41.6875 9.68708 41.6875 20.9812C41.6875 22.6459 41.6202 23.2988 41.2501 24.8982L34.8573 29.4354L33.8816 37.0084H23.2831L22.6102 37.498C22.1055 37.8571 21.4326 38.0203 20.8269 38.0203C20.1876 38.0203 19.6157 37.8244 18.9427 37.4001L18.3708 37.0084H7.77224L6.76286 29.4354L0.437399 24.8982ZM18.7745 33.483L19.683 34.1359C20.0194 34.397 20.5241 34.5929 20.8606 34.5929C21.197 34.5929 21.7017 34.397 22.0382 34.1359L22.9466 33.483H30.7189L31.5264 27.2484L37.7173 22.8744C37.9528 21.9604 38.0201 21.634 38.0201 20.7853C38.0201 19.7081 37.7173 18.3698 37.2799 17.4232L37.2462 17.3906L26.0421 28.3256L36.8088 15.4647C36.3714 13.6694 35.5303 12.2005 34.2181 11.0254L34.1508 10.9601L24.4607 27.2811L32.9732 9.45858L32.9395 9.3933C31.8292 7.92441 30.4161 6.94515 28.5655 6.3576L22.6438 26.5956L26.9169 5.50891C25.6383 4.79079 24.1242 4.43173 22.5429 4.43173C22.1055 4.43173 21.9709 4.43173 21.5671 4.49701L20.7596 26.4324L19.7503 4.52965C19.3129 4.49701 19.1783 4.49701 18.8418 4.46437C17.3614 4.46437 15.9819 4.82343 14.5688 5.57419L14.4678 5.60684L18.9764 26.6282L13.0883 6.3576C11.1705 6.9778 9.62278 8.05498 8.64704 9.42594L17.2604 27.1831L7.63766 10.7643C6.29182 11.8088 5.21514 13.5388 4.77774 15.3015L15.5781 28.3256L4.40764 17.3253L4.37399 17.3579C3.90295 18.3045 3.63378 19.5776 3.63378 20.818C3.63378 21.5361 3.73471 22.1889 3.90295 22.9397L10.1948 27.4116L10.9686 33.483H18.7745Z"
              fill="#DD1D21"/>
    </symbol>
    <symbol id="rosneft-icon" viewBox="0 0 30 43">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 12.5702H3.95627V25.1384L0.25 21.8678V12.5702Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.68359 8.43066H8.24265V29.2075L4.68359 25.7887V8.43066Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.96976 4.29053H12.6022V23.9754H8.96976V4.29053Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3261 0.149658H17.1038V19.9074H13.3261V0.149658Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6127 4.07007H21.2461V23.975H17.6127V4.07007Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.118 8.35388H25.6771V25.7164L22.118 29.2071V8.35388Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M26.3289 12.4972H29.9643V21.5787L26.3289 25.1388V12.4972Z"
              fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.96976 24.4141H12.6022V42.6411H8.96976V24.4141Z"
              fill="#FFDD21"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3261 20.4919H16.8842V42.6418H13.3261V20.4919Z"
              fill="#FFDD21"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6127 24.4836H21.2461V42.6413H17.6127V24.4836Z"
              fill="#FFDD21"/>
    </symbol>
    <symbol id="lukoil-icon" viewBox="0 0 36 33">
        <path d="M31.1404 0.523231C30.1846 0.523231 29.4607 1.16454 29.1001 1.93522L23.8631 10.6547C23.5 11.4611 23.2349 12.367 23.2349 12.9667C23.2349 13.5026 23.3076 13.9761 23.5018 14.4125L29.1668 28.0992H7.16825C6.37635 28.0992 5.7228 27.2948 5.7228 26.5522V2.97593C5.55635 -0.247143 0.975878 -0.245409 0.875 3.07719L0.975069 28.0992C0.975069 30.8196 3.05457 32.999 5.7228 32.999H35.7158L28.4052 14.0806C28.2034 13.3763 28.1135 12.7375 28.6053 11.8979L33.442 3.94351C33.5101 3.77763 33.6088 3.07627 33.6088 2.87467C33.513 1.43028 32.3938 0.459433 31.1404 0.523231ZM19.2655 0.534482C18.089 0.542456 16.9139 1.36439 16.9139 2.97593V19.8467C16.9139 22.2965 13.6561 22.0949 13.6561 19.8467V2.97593C13.6561 -0.247143 8.9417 -0.247144 8.9417 2.97593V19.9817C8.9417 23.8708 11.8132 26.4566 15.2405 26.4566C18.7612 26.4566 21.6227 23.8708 21.6227 19.9817V2.97593C21.6227 1.33249 20.442 0.526507 19.2655 0.534482Z"
              fill="#EE0E26"/>
    </symbol>
    <symbol id="tatneft-icon" viewBox="0 0 28 52">
        <path d="M22.079 11.2372C25.4185 19.5819 19.9735 24.9381 14.5497 30.3031C9.50185 35.7845 5.05545 41.4824 13.9985 51.7366C10.6578 43.393 16.1039 38.0357 21.5233 32.6762C26.5756 27.1827 31.022 21.4925 22.079 11.2372Z"
              fill="#E8112D"/>
        <path d="M14.1443 0.503332C17.4899 8.85106 12.0463 14.2038 6.61727 19.5654C1.56987 25.0511 -2.87603 30.7488 6.07158 41.0027C2.72822 32.6528 8.17401 27.3012 13.5975 21.9396C18.6482 16.4528 23.0897 10.7573 14.1443 0.503332"
              fill="#00AB69"/>
    </symbol>
    <symbol id="gazprom-icon" viewBox="0 0 32 53">
        <
        <path d="M29.5549 10.413C28.4436 5.53732 25.6488 1.56886 25.2638 0.927423C24.6525 1.83597 22.4155 5.33623 21.2757 9.21049C20.0306 13.5467 19.8435 17.3923 20.2667 21.1641C20.6868 24.9508 22.2868 28.8433 22.2868 28.8433C23.1367 30.8716 24.4113 33.0644 25.2415 34.1386C26.4622 32.56 29.269 27.8531 30.1498 21.7127C30.64 18.2849 30.6646 15.2887 29.5549 10.413ZM25.225 32.9163C24.6774 31.8871 23.8273 29.9333 23.7502 26.8924C23.7328 23.9707 24.9129 21.453 25.2575 20.9317C25.5634 21.4538 26.5747 23.6462 26.6922 26.6425C26.7709 29.5643 25.7931 31.8735 25.225 32.9163ZM29.2203 18.6856C29.1762 20.5489 28.9509 22.5162 28.6654 23.6935C28.7695 21.6663 28.5292 18.8189 28.0653 16.5824C27.6014 14.3608 26.2854 10.6327 25.2331 8.91716C24.2576 10.5557 23.0543 13.774 22.4228 16.5607C21.7883 19.3474 21.7663 22.7311 21.765 23.7447C21.5986 22.8949 21.1835 19.8386 21.3054 16.7829C21.4071 14.2639 22.0025 11.656 22.3285 10.4639C23.5716 6.48543 24.976 3.93815 25.2397 3.53599C25.5024 3.93878 27.2633 7.08614 28.1745 10.3815C29.0813 13.6769 29.2614 16.8373 29.2203 18.6856Z"
              fill="#0079C2"/>
        <path d="M27.1733 34.8777L18.7623 34.8675L18.7554 40.5247C18.7628 40.5247 18.7688 40.5099 18.7762 40.5099C20.7603 38.5226 23.9742 38.5265 25.9549 40.5186C27.9342 42.4958 27.9303 45.7179 25.9462 47.7052C25.9373 47.72 25.9284 47.72 25.9195 47.7348C25.9092 47.7348 25.8988 47.7496 25.8899 47.7645C23.9103 49.7221 21.3261 50.6989 18.7431 50.6958C16.1482 50.6926 13.5546 49.7095 11.5783 47.7174C8.0931 44.2238 7.68646 38.8037 10.3512 34.8573C10.7103 34.3232 11.1242 33.8188 11.5957 33.3443C13.5768 31.357 16.1729 30.3802 18.7677 30.3833L18.7842 16.7823C8.81361 16.7702 0.721574 24.8527 0.70946 34.8456C0.697346 44.8385 8.76974 52.9555 18.7403 52.9676C23.9389 52.9739 28.6247 50.7672 31.9229 47.2521L31.9379 34.8835L27.1733 34.8777Z"
              fill="#0079C2"/>
    </symbol>
    <symbol id="bashneft-icon" viewBox="0 0 163 160">
        <path d="M81.805 159.818C126.442 159.818 162.627 124.042 162.627 79.909C162.627 35.7765 126.442 0 81.805 0C37.1683 0 0.983032 35.7765 0.983032 79.909C0.983032 124.042 37.1683 159.818 81.805 159.818Z"
              fill="url(#paint0_linear_5496_555)"/>
        <path d="M37.5509 12.884C28.4649 18.849 20.6939 26.572 14.7069 35.585L83.6309 93.607V136.986L162.581 70.561C161.228 58.61 157.163 47.116 150.692 36.934L83.6309 92.237V50.685L37.5509 12.884Z"
              fill="url(#paint1_radial_5496_555)"/>
        <path d="M14.5359 35.615C5.69793 48.735 0.982934 64.146 0.981934 79.909C0.981934 124.041 37.1669 159.818 81.8039 159.818C126.441 159.818 162.627 124.041 162.626 79.909C162.627 76.804 162.444 73.702 162.079 70.618L83.1749 136.073L84.088 92.693L14.5359 35.615Z"
              fill="url(#paint2_radial_5496_555)"/>
        <defs>
            <linearGradient id="paint0_linear_5496_555" x1="109.202" y1="22.374" x2="85.0011" y2="82.1913"
                            gradientUnits="userSpaceOnUse">
                <stop stop-color="#DB2F7B"/>
                <stop offset="1" stop-color="#9B2978"/>
            </linearGradient>
            <radialGradient id="paint1_radial_5496_555" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
                            gradientTransform="translate(81.8049 82.192) rotate(-42.1001) scale(113.61 72.7639)">
                <stop stop-color="#FCFEFA"/>
                <stop offset="1" stop-color="#D6D7D6"/>
            </radialGradient>
            <radialGradient id="paint2_radial_5496_555" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
                            gradientTransform="translate(78.6089 94.521) rotate(-179.334) scale(78.5441 62.1013)">
                <stop stop-color="#7BB631"/>
                <stop offset="1" stop-color="#027E40"/>
            </radialGradient>
        </defs>
    </symbol>
    <symbol id="fines-icon" class="symbol-icon" viewBox="0 0 40 34">
        <path d="M19 13.7078H21C25.6944 13.7078 29.5 17.5133 29.5 22.2078V31.7078H10.5V22.2078L10.5107 21.7703C10.7384 17.2792 14.4523 13.7078 19 13.7078Z"
              fill="transparent" stroke="#fff" stroke-width="3"/>
        <path d="M2 7.86401L6 11.864" stroke="#fff" stroke-width="3"/>
        <path d="M38 7.86401L34 11.864" stroke="#fff" stroke-width="3"/>
        <path d="M20 0.207764V5.86462" stroke="#fff" stroke-width="3"/>
    </symbol>
    <symbol id="parking-icon" class="symbol-icon" viewBox="0 0 33 33" fill="transparent">
        <rect x="1.75" y="1.70776" width="29" height="29" rx="5.5" stroke="white" stroke-width="3"/>
        <line x1="12.5" y1="10.2078" x2="12.5" y2="24.2078" stroke="white" stroke-width="3"/>
        <rect x="12.5" y="11.7078" width="8" height="6" rx="1.5" stroke="white" stroke-width="3"/>
    </symbol>
    <symbol id="edo-icon" class="symbol-icon" viewBox="0 0 28 33" fill="transparent">
        <path d="M20.3457 1.70776L26 7.79663V30.7078H2V1.70776H20.3457Z" stroke="white" stroke-width="3"/>
        <line x1="21" y1="14.7078" x2="7" y2="14.7078" stroke="white" stroke-width="3"/>
        <line x1="21" y1="20.7078" x2="7" y2="20.7078" stroke="white" stroke-width="3"/>
    </symbol>
    <symbol id="washes-icon" class="symbol-icon" viewBox="0 0 28 35" fill="transparent">
        <path d="M26.5 20.012C26.5 14.7982 23.3455 10.2425 19.9443 6.87329C18.266 5.21071 16.5822 3.89187 15.3164 2.98853C14.7948 2.61628 14.3446 2.31875 14 2.09595C13.6554 2.31875 13.2052 2.61628 12.6836 2.98853C11.4178 3.89187 9.73402 5.21071 8.05566 6.87329C4.65446 10.2425 1.5 14.7982 1.5 20.012C1.50019 27.1215 7.12792 32.8274 14 32.8274C20.7648 32.8274 26.3239 27.2983 26.4961 20.344L26.5 20.012Z"
              stroke="white" stroke-width="3"/>
    </symbol>
    <symbol id="postponement-icon" class="symbol-icon" viewBox="0 0 30 31" fill="transparent">
        <circle cx="15" cy="15.2078" r="13.5" stroke="white" stroke-width="3"/>
        <line x1="23" y1="14.7078" x2="14" y2="14.7078" stroke="white" stroke-width="3"/>
        <line x1="15.5" y1="7.20776" x2="15.5" y2="16.2078" stroke="white" stroke-width="3"/>
    </symbol>
    <symbol id="telematics-icon" class="symbol-icon" viewBox="0 0 35 32" fill="transparent">
        <circle cx="26.2499" cy="8.20776" r="6.5" stroke="white" stroke-width="3"/>
        <path d="M31.5 12.2078L12.01 30.435" stroke="white" stroke-width="3"/>
        <line x1="25.9235" y1="1.64011" x2="0.445808" y2="9.57022" stroke="white" stroke-width="3"/>
        <path d="M20.9854 11.5151L8 18.7078" stroke="white" stroke-width="3"/>
    </symbol>
    <symbol id="pprpay-icon" class="symbol-icon" viewBox="0 0 33 25" fill="transparent">
        <line x1="1.5" y1="0.207764" x2="1.5" y2="24.2078" stroke="white" stroke-width="3"/>
        <line x1="25.5" y1="0.207764" x2="25.5" y2="24.2078" stroke="white" stroke-width="3"/>
        <line x1="31.5" y1="0.207764" x2="31.5" y2="24.2078" stroke="white" stroke-width="3"/>
        <line x1="7.5" y1="0.207764" x2="7.5" y2="19.2078" stroke="white" stroke-width="3"/>
        <line x1="19.5" y1="0.207764" x2="19.5" y2="19.2078" stroke="white" stroke-width="3"/>
        <line x1="13.5" y1="0.207764" x2="13.5" y2="19.2078" stroke="white" stroke-width="3"/>
    </symbol>
    <symbol id="sms-icon" class="symbol-icon" viewBox="0 0 33 37" fill="transparent">
        <path d="M30.75 1.70776V26.7078H19C18.702 26.7078 18.4121 26.797 18.166 26.9617L18.0625 27.0369L10.5 33.0867V28.2078C10.5 27.3793 9.82843 26.7078 9 26.7078H1.75V1.70776H30.75Z"
              stroke="white" stroke-width="3" stroke-linejoin="round"/>
    </symbol>
    <symbol id="insurance-icon" class="symbol-icon" viewBox="0 0 27 35" fill="transparent">
        <path d="M25.5 5.67554V17.1824C25.5 19.6988 24.8915 22.2133 23.7412 24.4207L23.5039 24.8572C22.2781 27.0287 20.5069 28.9165 18.4082 30.2751L17.9844 30.5398L17.9814 30.5408L13.5 33.2468L9.01855 30.5408L9.01562 30.5398L8.59082 30.2742C6.6272 29.0066 4.95886 27.3067 3.75293 25.3005L3.50098 24.866C2.19013 22.5074 1.50001 19.8611 1.5 17.1824V5.67554L13.5 1.58472L25.5 5.67554Z"
              stroke="white" stroke-width="3"/>
    </symbol>

</svg>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>