{{ header }}
<div class="productpage">
	<div id="product-product" class="container">
		<ul class="breadcrumb">
			{% for breadcrumb in breadcrumbs %}
				<li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>
			{% endfor %}
		</ul>
		<div class="row">{{ column_left }}
			{% if column_left and column_right %}
				{% set class = 'col-sm-6 productpage' %}
				{% elseif column_left or column_right %}
					{% set class = 'col-sm-9 productpage' %}
					{% else %}
						{% set class = 'col-sm-12 productpage' %}
						{% endif %}
						<div id="content" class="{{ class }} content">{{ content_top }}
							<div class="row"> {% if column_left or column_right %}
								{% set class = 'col-sm-6 product-left' %}
								{% else %}
									{% set class = 'col-sm-8 product-left' %}
									{% endif %}
									<div class="{{ class }}">
										<div class="product-info">
											{% if thumb or images %}
												<div class="left product-image thumbnails">
													<div class="thumb-carousel">
														{% if sticker %}
															<div class="sticker_prod" style=""><img src="{{ sticker }}" alt="st"> </div>
														{% endif %}
														{% if sticker1 %}
															<div class="sticker_prod1" style=""><img src="{{ sticker1 }}" alt="st"> </div>
														{% endif %}
														{% if sticker2 %}
															<div class="sticker_prod2" style=""><img src="{{ sticker2 }}" alt="st"> </div>
														{% endif %}
														<div id="thumb-carousel" class="swiper-container" style="opacity: 1;">
															<div class="swiper-wrapper">
																{% if thumb %}
																	<div class="swiper-slide">
																		<a href="{{ popup }}" title="{{ heading_title }}">
																			<img src="{{ thumb }}" title="{{ heading_title }}" alt="{{ heading_title }}" class="swiper-lazy" />
																			<div class="swiper-lazy-preloader"></div>
																		</a>
																	</div>
																{% endif %}
																{% for  image in images %}
																	<div class="swiper-slide">
																		<a href="{{ image.popup }}" title="{{ heading_title }}">
																			<img src="{{ image.thumb }}" title="{{ heading_title }}" alt="{{ heading_title }}" class="swiper-lazy" />
																			<div class="swiper-lazy-preloader"></div>
																		</a>
																	</div>
																{% endfor %}
															</div>
														</div>
													</div>
													<div class="additional-carousel">
														<div id="additional-carousel" class="swiper-container" style="opacity: 1;">
															<div class="swiper-button-prev swiper-button-white"></div>
															<div class="swiper-wrapper">
																{% if thumb %}
																	<div class="swiper-slide">
																		<div class="additional-carousel-item">
																			<img src="{{ thumb }}" title="{{ heading_title }}" alt="{{ heading_title }}" class="swiper-lazy" />
																			<div class="swiper-lazy-preloader"></div>
																		</div>
																	</div>
																{% endif %}
																{% for  image in images %}
																	<div class="swiper-slide">
																		<div class="additional-carousel-item">
																			<img src="{{ image.thumb }}" title="{{ heading_title }}" alt="{{ heading_title }}" class="swiper-lazy" />
																			<div class="swiper-lazy-preloader"></div>
																		</div>
																	</div>
																{% endfor %}
															</div>
															<div class="swiper-button-next swiper-button-white"></div>
														</div>
													</div>
												</div>
											{% endif %}
										</div>
									</div>
									{% if column_left or column_right %}
										{% set class = 'col-sm-6 product-right' %}
										{% else %}
											{% set class = 'col-sm-4 product-right' %}
											{% endif %}
											<div class="{{ class }} product-info">

												<input name="product_id" value="{{ product_id }}" style="display: none;" type="hidden">

												<h1 class="product-title">{{ heading_title }}</h1>
												{% if review_status %}
													<div class="rating-wrapper">
														{% for i in 1..5 %}
															{% if rating < i %}
																<span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
															{% else %}
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
															{% endif %}
														{% endfor %}<a href="" class="review-count" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ reviews }}</a>  <a href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;" class="write-review"><i class="fa fa-pencil"></i>{{ text_write }}</a>


													</div>
												{% endif %}
												<ul class="list-unstyled">

													{% if sku %}
														<li><span class="desc"><strong>Артикул:</strong></span> <span class="desc" style="color:#ff0000"><strong>{{ sku }}</strong></span></li>
													{% endif %}

													{% if manufacturer %}
														<li><span class="desc">{{ text_manufacturer }}</span><a href="{{ manufacturers }}">{{ manufacturer }}</a></li>
													{% endif %}
													<li><span class="desc">{{ text_model }}</span> {{ model }}</li>
													{% if reward %}
														<li><span class="desc">{{ text_reward }}</span> {{ reward }}</li>
													{% endif %}
													<li><span class="desc">{{ text_stock }}</span> {{ stock_status }}</li>
												</ul>



												{% if calc_price %}
													<!-- товар под заказ -->
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calcModal">
														Заказать просчет
													</button>

													<!-- Modal -->
													<div class="modal fade" id="calcModal" tabindex="-1" role="dialog" aria-labelledby="calcModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Заказать просчет</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">

																	<div class="form-group">
																		<label class="control-label" for="input-name">Имя</label>
																		<input type="text" name="name" value="" placeholder="Имя" id="input-name" class="form-control">
																	</div>

																	<div class="form-group">
																		<label class="control-label" for="input-telephone">Телефон</label>
																		<input type="text" name="telephone" value="" placeholder="Телефон" id="input-telephone" class="form-control">
																	</div>

																	<div class="form-group">
																		<label class="control-label" for="input-email">E-Mail</label>
																		<input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
																	</div>

																	<div class="form-group">
																		<label class="control-label" for="input-comment">Комментарий</label>
																		<textarea type="text" name="comment" value="Комментарий" id="input-comment" class="form-control"></textarea>
																	</div>

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
																	<button type="button" id="button-calc" class="btn btn-primary">Отправить</button>
																</div>
															</div>
														</div>
													</div>

													<script>
													$(document).delegate('#button-calc', 'click', function() {
														console.log('1111');
														$.ajax({
															url: 'index.php?route=extension/callback/save&product_id={{ product_id }}',
															type: 'post',
															data: $('#calcModal :input'),
															dataType: 'json',
															beforeSend: function() {
																$('#calcModal #button-callback').button('loading');
															},
															complete: function() {
																$('#calcModal #button-callback').button('reset');
															},
															success: function(json) {
																$('.form-group').removeClass('has-error');

																if (json['success']) {
																	$('.modal-body .form-group').css('display', 'none');
																	$('.modal-body ').append('<span class="callback_success">' + json['success'] + '</span>');

																	setTimeout(function(){
																		$(".callback_success").css('display', 'none');
																		$('#calcModal').modal('hide');

																		setTimeout(function(){
																			$(".callback_success").css('display', 'none');
																			$('.modal-body .form-group').css('display', 'block');
																		}, 3000);

																	}, 6000);

																} else if (json['name']) {
												// Highlight any found errors
												$('input[name=\'name\']').parent().addClass('has-error');
											} else if (json['telephone']) {
												$('input[name=\'telephone\']').parent().addClass('has-error');
											}
										},
										error: function(xhr, ajaxOptions, thrownError) {
											alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
										}
									});
													});
													</script>
													<!-- товар под заказ -->
												{% else %}
													<!-- товар с возможностью купить -->
													{% if price %}
														<ul class="list-unstyled price">
															{% if not special %}
																<li>
																	<h2>Цена: <span id="update_price">{{ price }}</span></h2>
																</li>
															{% else %}
																<li><span class="price-old" style="text-decoration: line-through;" id="update_price">{{ price }}</span></li>
																<br>
																<li><h2 class="special-price" id="update_special">{{ special }}</h2></li>
															{% endif %}
															{% if tax %}
																<li class="price-tax">{{ text_tax }} {{ tax }}</li>
															{% endif %}
															{% if points %}
																<li class="points">{{ text_points }} {{ points }}</li>
															{% endif %}
															{% if discounts %}

																{% for discount in discounts %}
																	<li class="discount">{{ discount.quantity }}{{ text_discount }}{{ discount.price }}</li>
																{% endfor %}
															{% endif %}
														</ul>
													{% endif %}

													<div id="product">
														{% if options %}
															<h3 class="product-option">{{ text_option }}</h3>
															{% for option in options %}
																{% if option.type == 'select' %}
																	<div class="form-group{% if option.required %} required{% endif %}">
																		<label class="control-label" for="input-option{{ option.product_option_id }}">{{ option.name }}</label>
																		<select onchange="update_prices_opt();" name="option[{{ option.product_option_id }}]" id="input-option{{ option.product_option_id }}" class="form-control">
																			<option value="">{{ text_select }}</option>
																			{% for option_value in option.product_option_value %}
																				<option value="{{ option_value.product_option_value_id }}">{{ option_value.name }}
																					{% if option_value.price %}
																						({{ option_value.price_prefix }}{{ option_value.price }})
																					{% endif %} </option>
																				{% endfor %}
																			</select>
																		</div>
																	{% endif %}
																	{% if option.type == 'radio' %}
																		{% if option.option_id in color_options %}
																			<div class="color-option form-group{% if option.required %} required{% endif %}">
																				<label class="control-label">{{ option.name }}: <span class="color-option-label" id="option-{{ option.product_option_id }}-label">{{ text_none }}</span></label>
																				<div id="input-option{{ option.product_option_id }}" class="color-option-list"> 
																					{% for option_value in option.product_option_value|slice(0, 5) %}
																						<div class="color-option-item" data-toggle="modal" data-target="#option-{{ option.product_option_id }}-modal">
																							<div class="color-option-img">
																								<img  class="img-thumbnail" src="{{ option_value.image }}" alt="{{ option_value.name }}" />
																							</div>
																						</div>
																					{% endfor %} 
																					{% if option.product_option_value|length > 5 %}
																						<button type="button" class="color-option-more" data-toggle="modal" data-target="#option-{{ option.product_option_id }}-modal">Больше...</button>
																					{% endif %}
																				</div>
																			</div>
																			<div id="option-{{ option.product_option_id }}-modal" class="modal fade" role="dialog">
																				<div class="modal-dialog modal-lg">
																					<div class="modal-content">
																						<div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal">&times;</button>
																							<h4 class="modal-title">{{ option.name }}</h4>
																						</div>
																						<div class="modal-body">
																							<div class="color-option-list color-option-list--modal"> 
																								{% for option_value in option.product_option_value %}
																									<div class="color-option-item">
																										<input onchange="update_prices_opt(); $('#option-{{ option.product_option_id }}-label').text('{{ option_value.name }}{% if option_value.price %} ({{ option_value.price_prefix }}{{ option_value.price }}){% endif %}'); $('#option-{{ option.product_option_id }}-modal').modal('hide');" type="radio" name="option[{{ option.product_option_id }}]" value="{{ option_value.product_option_value_id }}" id="option-{{ option.product_option_id }}-value-{{ option_value.product_option_value_id }}" />
																										<label for="option-{{ option.product_option_id }}-value-{{ option_value.product_option_value_id }}" class="color-option-img">
																											<img  class="img-thumbnail" src="{{ option_value.image }}" alt="{{ option_value.name }}" />
																										</label>
																										<div class="color-option-name">{{ option_value.name }}</div>
																										{% if option_value.price %}
																											<div class="color-option-price">{{ option_value.price_prefix }}{{ option_value.price }}</div>
																										{% endif %}
																									</div>
																								{% endfor %} 
																							</div>
																						</div>
																					</div>

																				</div>
																			</div>
																		{% elseif option.option_id in grid_options %}
																			<div class="form-group{% if option.required %} required{% endif %} grid-option">
																				<label class="control-label">{{ option.name }}</label>
																				<div id="input-option{{ option.product_option_id }}" class="grid-option-list"> 
																					{% for option_value in option.product_option_value %}
																						<div class="grid-option-item">
																							<input onchange="update_prices_opt();" type="radio" name="option[{{ option.product_option_id }}][]" value="{{ option_value.product_option_value_id }}" id="option-{{ option.product_option_id }}-value-{{ option_value.product_option_value_id }}" />
																							<label for="option-{{ option.product_option_id }}-value-{{ option_value.product_option_value_id }}" class="grid-option-label">
																								{{ option_value.name }}
																								{% if option_value.price %}
																									({{ option_value.price_prefix }}{{ option_value.price }})
																								{% endif %} 
																							</label>
																						</div>
																					{% endfor %} 
																				</div>
																			</div>
																		{% else %}
																			<div class="form-group{% if option.required %} required{% endif %}">
																				<label class="control-label">{{ option.name }}</label>
																				<div id="input-option{{ option.product_option_id }}"> 
																					{% for option_value in option.product_option_value %}
																						<div class="radio">
																							<label>
																								<input onchange="update_prices_opt();" type="radio" name="option[{{ option.product_option_id }}]" value="{{ option_value.product_option_value_id }}" />
																								{% if option_value.image %} <img  class="img-thumbnail" src="{{ option_value.image }}"
																									alt="{{ option_value.name }}{% if option_value.price %} {{ option_value.price_prefix }}{{ option_value.price }}{% endif %}" />{% endif %}
																									{{ option_value.name }}
																									{% if option_value.price %}
																										({{ option_value.price_prefix }}{{ option_value.price }})
																									{% endif %} </label>
																								</div>
																							{% endfor %} 
																						</div>
																					</div>
																				{% endif %}
																			{% endif %}
																			{% if option.type == 'checkbox' %}
																				{% if option.option_id in grid_options %}
																					<div class="form-group{% if option.required %} required{% endif %} grid-option">
																						<label class="control-label">{{ option.name }}</label>
																						<div id="input-option{{ option.product_option_id }}" class="grid-option-list"> 
																							{% for option_value in option.product_option_value %}
																								<div class="grid-option-item">
																									<input onchange="update_prices_opt();" type="checkbox" name="option[{{ option.product_option_id }}][]" value="{{ option_value.product_option_value_id }}" id="option-{{ option.product_option_id }}-value-{{ option_value.product_option_value_id }}" />
																									<label for="option-{{ option.product_option_id }}-value-{{ option_value.product_option_value_id }}" class="grid-option-label">
																										{{ option_value.name }}
																										{% if option_value.price %}
																											({{ option_value.price_prefix }}{{ option_value.price }})
																										{% endif %} 
																									</label>
																								</div>
																							{% endfor %} </div>
																						</div>
																					{% else %}
																						<div class="form-group{% if option.required %} required{% endif %}">
																							<label class="control-label">{{ option.name }}</label>
																							<div id="input-option{{ option.product_option_id }}"> {% for option_value in option.product_option_value %}
																								<div class="checkbox">
																									<label>
																										<input onchange="update_prices_opt();" type="checkbox" name="option[{{ option.product_option_id }}]" value="{{ option_value.product_option_value_id }}" />
																										{% if option_value.image %} <img  class="img-thumbnail" src="{{ option_value.image }}"
																											alt="{{ option_value.name }}  {% if option_value.price %} {{ option_value.price_prefix }} {{ option_value.price }} {% endif %}" /> {% endif %}
																											{{ option_value.name }}
																											{% if option_value.price %}
																												({{ option_value.price_prefix }}{{ option_value.price }})
																											{% endif %} </label>
																										</div>
																									{% endfor %} </div>
																								</div>
																							{% endif %}
																						{% endif %}
																						{% if option.type == 'text' %}
																							<div class="form-group{% if option.required %} required{% endif %}">
																								<label class="control-label" for="input-option{{ option.product_option_id }}">{{ option.name }}</label>
																								<input type="text" name="option[{{ option.product_option_id }}]" value="{{ option.value }}" placeholder="{{ option.name }}" id="input-option{{ option.product_option_id }}" class="form-control" />
																							</div>
																						{% endif %}
																						{% if option.type == 'textarea' %}
																							<div class="form-group{% if option.required %} required{% endif %}">
																								<label class="control-label" for="input-option{{ option.product_option_id }}">{{ option.name }}</label>
																								<textarea name="option[{{ option.product_option_id }}]" rows="5" placeholder="{{ option.name }}" id="input-option{{ option.product_option_id }}" class="form-control">{{ option.value }}</textarea>
																							</div>
																						{% endif %}
																						{% if option.type == 'file' %}
																							<div class="form-group{% if option.required %} required{% endif %}">
																								<label class="control-label">{{ option.name }}</label>
																								<button type="button" id="button-upload{{ option.product_option_id }}" data-loading-text="{{ text_loading }}" class="btn btn-default btn-block"><i class="fa fa-upload"></i> {{ button_upload }}</button>
																								<input type="hidden" name="option[{{ option.product_option_id }}]" value="" id="input-option{{ option.product_option_id }}" />
																							</div>
																						{% endif %}
																						{% if option.type == 'date' %}
																							<div class="form-group{% if option.required %} required{% endif %}">
																								<label class="control-label" for="input-option{{ option.product_option_id }}">{{ option.name }}</label>
																								<div class="input-group date">
																									<input type="text" name="option[{{ option.product_option_id }}]" value="{{ option.value }}" data-date-format="YYYY-MM-DD" id="input-option{{ option.product_option_id }}" class="form-control" />
																									<span class="input-group-btn">
																										<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
																									</span></div>
																								</div>
																							{% endif %}
																							{% if option.type == 'datetime' %}
																								<div class="form-group{% if option.required %} required{% endif %}">
																									<label class="control-label" for="input-option{{ option.product_option_id }}">{{ option.name }}</label>
																									<div class="input-group datetime">
																										<input type="text" name="option[{{ option.product_option_id }}]" value="{{ option.value }}" data-date-format="YYYY-MM-DD HH:mm" id="input-option{{ option.product_option_id }}" class="form-control" />
																										<span class="input-group-btn">
																											<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
																										</span></div>
																									</div>
																								{% endif %}
																								{% if option.type == 'time' %}
																									<div class="form-group{% if option.required %} required{% endif %}">
																										<label class="control-label" for="input-option{{ option.product_option_id }}">{{ option.name }}</label>
																										<div class="input-group time">
																											<input type="text" name="option[{{ option.product_option_id }}]" value="{{ option.value }}" data-date-format="HH:mm" id="input-option{{ option.product_option_id }}" class="form-control" />
																											<span class="input-group-btn">
																												<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
																											</span></div>
																										</div>
																									{% endif %}
																								{% endfor %}
																							{% endif %}
																							{% if recurrings %}
																								<hr>
																								<p>{{ text_payment_recurring }}</p>
																								<div class="form-group required">
																									<select name="recurring_id" class="form-control">
																										<option value="">{{ text_select }}</option>
																										{% for recurring in recurrings %}
																											<option value="{{ recurring.recurring_id }}">{{ recurring.name }}</option>
																										{% endfor %}
																									</select>
																									<div class="help-block" id="recurring-description"></div>
																								</div>
																							{% endif %}
																							<div class="form-group cart">
																							{% if text_alert %}
																								<div class="container">
																									<table style="margin-bottom: 30px;border: 2px solid #cb171a; border-radius: 10px; box-shadow: 0px 0px 10px -2px rgba(0,0,0,0.75);">
																										<tbody>
																											<tr>
																												<td>
																												<div style="margin:15px;">
																												<p id="blink5" style="font-size: 14pt; font-family: Verdana; color:red;text-align: center;">{{ text_alert }}</p>
																												</div>
																												</td>
																											</tr>
																										</tbody>
																									</table>
																								</div>
																							{% endif %} 
																								<label class="control-label qty" for="input-quantity"></label>
																								<input type="text" name="quantity" value="{{ minimum }}" size="2" id="input-quantity" class="form-control" />
																								<button type="button" id="button-cart" data-loading-text="{{ text_loading }}" class="btn btn-primary btn-lg btn-block">Купить</button>



																								<br>
																				
																								<div id="oneclick" style="width:300px">
																									<div class="oneclickn"> <h3><span class="glyphicon glyphicon-phone"></span>{{ text_one_click_header }}</h3></div>
																									<div class="input-group">
																										<input type="text" name="telephone" value="" placeholder="{{ text_one_click_placeholder }}" id="input-payment-telephone" class="form-control">
																										<input type="hidden" name="product_id" value="{{ product_id }}">
																										<span class="input-group-btn">
																											<button type="submit" id="button-oneclick" class="btn btn-primary">{{ text_one_click_button }}</button>
																										</span>
																									</div>
																									<span class="help-block">{{ text_one_click_help }}</span>
																								</div>
																								<script src="catalog/view/javascript/jquery.maskedinput.min.js" type="text/javascript"></script>
																								<script type="text/javascript">
																								$(document).ready(function() {
																									$("#input-payment-telephone").mask("{{ text_one_click_mask }}",{placeholder:" "});
																								});
																								</script>

																								<script type="text/javascript"><!--
																								$('#button-oneclick').on('click', function() {
																									$.ajax({
																										url: 'index.php?route=checkout/one_click/add',
																										type: 'post',
																										data: $('#oneclick input[type=\'text\'], #oneclick input[type=\'hidden\']'),
																										dataType: 'json',
																										beforeSend: function() {
																											$('#button-oneclick').button('loading');
																										},
																										complete: function() {
																											$('#button-oneclick').button('reset');
																										},
																										success: function(json) {
																											$('.alert, .text-danger').remove();
																											$('.form-group').removeClass('has-error');

																											if (json['error']) {
																												if (json['error']['telephone']) {
																													$('.breadcrumb').after('<div class="alert alert-danger text-danger">' + json['error']['telephone'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
																													$('html, body').animate({ scrollTop: 0 }, 'slow');
																												}
																												if (json['error']['product']) {
																													$('.breadcrumb').after('<div class="alert alert-danger text-danger">' + json['error']['product'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
																													$('html, body').animate({ scrollTop: 0 }, 'slow');
																												}
																												if (json['error']['order']) {
																													$('.breadcrumb').after('<div class="alert alert-danger text-danger">' + json['error']['order'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
																													$('html, body').animate({ scrollTop: 0 }, 'slow');
																												}
																											}

																											if (json['success']) {
																												$('.breadcrumb').after('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
																												$('html, body').animate({ scrollTop: 0 }, 'slow');
																											}
																										},
																										error: function(xhr, ajaxOptions, thrownError) {
																											alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
																										}
																									});
																								});
																								//--></script>



																								<div class="btn-group">

																									<button type="button" class="btn btn-default wishlist" title="{{ button_wishlist }}" onclick="wishlist.add('{{ product_id }}');"> <i style="color:#ff0000" class="fa fa-heart"></i> {{ button_wishlist }}</button>
																									<button type="button" class="btn btn-default compare" title="{{ button_compare }}" onclick="compare.add('{{ product_id }}');"><i style="color:#ff0000" class="fa fa-exchange"></i> {{ button_compare }} </button>
																								</div>

																							</div>
																							<input type="hidden" name="product_id" value="{{ product_id }}" />
																							{% if minimum > 1 %}
																								<div class="alert alert-info"><i class="fa fa-info-circle"></i> {{ text_minimum }}</div>
																							{% endif %}



																						</div>
																						<!-- товар с возможностью купить -->
																					{% endif %}
																				</div>

																				<!-- product page tab code start-->
																				{% if column_left and column_right %}
																					{% set class = 'col-sm-6' %}
																						{%  elseif column_left or column_right %}
																						{% set class = 'col-sm-12' %}
																						{% else %}
																							{% set class = 'col-sm-12' %}
																							{% endif %}
																							<div id="tabs_info" class="product-tab {{ class }}">
																								<ul class="nav nav-tabs">

																									<li><a href="#tab-description" data-toggle="tab">{{ tab_description }}</a></li>
																									{% if attribute_groups %}
																										<li  class="active"><a href="#tab-specification" data-toggle="tab">{{ tab_attribute }}</a></li>
																									{% endif %}
																									{% if review_status %}
																										<li><a href="#tab-review" data-toggle="tab">{{ tab_review }}</a></li>
																									{% endif %}
																								</ul>

																								<div class="tab-content">
																									<div class="tab-pane " id="tab-description">{{ description }}</div>
																									{% if attribute_groups %}
																										<div class="tab-pane active" id="tab-specification">
																											<table class="table table-bordered">
																												{% for attribute_group in attribute_groups %}
																													<thead>
																														<tr>
																															<td colspan="2"><strong>{{ attribute_group.name }}</strong></td>
																														</tr>
																													</thead>
																													<tbody>
																														{% for attribute in attribute_group.attribute %}
																															<tr style="border-bottom-color:#a8a8a8;border-bottom-style:dashed;border-bottom-width: 1px; background: #fafafa;">
																																<td>{{ attribute.name }}</td>
																																<td>{{ attribute.text }}</td>
																															</tr>
																														{% endfor %}
																													</tbody>
																												{% endfor %}
																											</table>
																										</div>
																									{% endif %}
																									{% if review_status %}
																										<div class="tab-pane" id="tab-review">
																											<form class="form-horizontal" id="form-review">
																												<div id="review"></div>
																												<h4>{{ text_write }}</h4>
																												{% if review_guest %}
																													<div class="form-group required">
																														<div class="col-sm-12">
																															<label class="control-label" for="input-name">{{ entry_name }}</label>
																															<input type="text" name="name" value="{{ customer_name }}" id="input-name" class="form-control" />
																														</div>
																													</div>
																													<div class="form-group required">
																														<div class="col-sm-12">
																															<label class="control-label" for="input-review">{{ entry_review }}</label>
																															<textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
																															<div class="help-block">{{ text_note }}</div>
																														</div>
																													</div>
																													<div class="form-group required">
																														<div class="col-sm-12">
																															<label class="control-label">{{ entry_rating }}</label>
																															&nbsp;&nbsp;&nbsp; {{ entry_bad }}&nbsp;
																															<input type="radio" name="rating" value="1" />
																															&nbsp;
																															<input type="radio" name="rating" value="2" />
																															&nbsp;
																															<input type="radio" name="rating" value="3" />
																															&nbsp;
																															<input type="radio" name="rating" value="4" />
																															&nbsp;
																															<input type="radio" name="rating" value="5" />
																															&nbsp;{{ entry_good }}</div>
																														</div>
																														{{ captcha }}
																														<div class="buttons clearfix">
																															<div class="pull-right">
																																<button type="button" id="button-review" data-loading-text="{{ text_loading }}" class="btn btn-primary">{{ button_continue }}</button>
																															</div>
																														</div>
																													{% else %}
																														{{ text_login }}
																													{% endif %}
																												</form>
																											</div>
																										{% endif %}</div>
																									</div>
																								</div>


																								<!-- products set DK -->

																								{% if products_set %}

																									<div class="box latest product-box">
																										<div class="box-heading">В комплект входит</div>
																										<div class="box-content">

																											<div class="latest-products home-products">
																												{% set sliderFor = 5 %}
																													{% set productCount = products_set|length %}
																														{% if productCount >= sliderFor %}
																															<div class="customNavigation">
																																<a class="fa prev fa-angle-left"></a>
																																<a class="fa next fa-angle-right"></a>
																															</div>
																														{% endif %}
																														<div class="box-product {% if productCount >= sliderFor %}product-carousel{% else %}productbox-grid{% endif %}" id="{% if productCount >= sliderFor %}latest-carousel{% else %}latest-grid{% endif %}">
																															{% for row in products_set|batch(1, 'No item') %}
																																<div class="{% if productCount >= sliderFor %}slider-item{% else %}product-items{% endif %}">

																																	<div class="product-wrapper">
																																		{% for product in row %}
																																			<div class="product-block product-thumb transition">
																																				<div class="product-block-inner">
																																					<div class="image">
																																						{% if product.thumb_swap %}
																																							<a href="{{ product.href }}">
																																								<img src="{{ product.thumb }}" title="{{ product.name }}" alt="{{ product.name }}" class="img-responsive reg-image"/>
																																								<img class="img-responsive hover-image" src="{{ product.thumb_swap }}" title="{{ product.name }}" alt="{{ product.name }}"/>
																																							</a>
																																						{% else %}
																																							<a href="{{ product.href }}">
																																								<img src="{{ product.thumb }}" title="{{ product.name }}" alt="{{ product.name }}" class="img-responsive"/></a>
																																							{% endif %}

																																							{% if not product.special %}
																																							{% else %}
																																								<div class="saleback">
																																									<span class="saleicon sale">Sale</span>
																																								</div>
																																							{% endif %}
																																							{# if product.rating #}
																																							<div class="rating">
																																								{% for i in 1..5 %}
																																									{% if product.rating < i %}
																																										<span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
																																									{% else %}
																																										<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
																																									{% endif %}
																																								{% endfor %}
																																							</div>
																																							{# endif #}
																																						</div>
																																						<div class="caption">

																																							<h4><a href="{{ product.href }} ">{{ product.name }} </a></h4>
																																							{# <p class="desc"><?php echo $product['description']; ?></p> #}

																																							{% if product.price %}
																																								<p class="price">
																																									{% if not product.special %}
																																										{{ product.price }}
																																									{% else %}
																																										<span class="price-new">{{ product.special }}</span> <span class="price-old">{{ product.price }}</span>
																																									{% endif %}
																																									{% if product.tax %}
																																										<span class="price-tax">{{ text_tax }} {{ product.tax }}</span>
																																									{% endif %}
																																									{% if product.special %}
																																										<span class="percentsaving">{{ product.percentsaving }}%</span>
																																									{% endif %}
																																								</p>
																																							{% endif %}
																																							<div class="button-group">
																																								<button type="button" data-placement="right" title="{{ button_cart }}" class="addtocart" onclick="cart.add('{{ product.product_id }} ');">{{ button_cart }}<i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
																																							</div>
																																						</div>
																																						<div class="button-group">
																				<!-- <button type="button" data-toggle="tooltip" data-placement="left" title="Add to cart" class="addtocart" onclick="cart.add('{{ product.product_id }} ');">{{ button_cart }} </button>
																				<button class="wishlist" type="button" data-toggle="tooltip" data-placement="left" title="{{ button_wishlist }} " onclick="wishlist.add('{{ product.product_id }} ');"></button>
																				<button class="compare" type="button" data-toggle="tooltip" data-placement="left" title="{{ button_compare }} " onclick="compare.add('{{ product.product_id }} ');"></button>
																				<div class="quickview" data-toggle="tooltip" data-placement="left" title="Quickview" ><a href="{{ product.quick }}">Quick View</a></div> -->

																				<button type="button" data-placement="right" title="{{ button_cart }}" class="addtocart" onclick="cart.add('{{ product.product_id }} ');">{{ button_cart }}<i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
																				<button class="wishlist" type="button" data-placement="right" title="{{ button_wishlist }} " onclick="wishlist.add('{{ product.product_id }} ');"><i class="fa fa-heart"></i></button>
																				<button class="compare" type="button" data-placement="right" title="{{ button_compare }} " onclick="compare.add('{{ product.product_id }} ');"><i class="fa fa-exchange"></i></button>
																				<div class="quickview" data-placement="right" title="{{ button_quickview }}" ><a href="{{ product.quick }}">Quick View<i class="fa fa-eye" aria-hidden="true"></i></a></div>
																			</div>
																		</div>
																	</div>
																{% endfor %}
															</div>

														</div>
													{% endfor %}
												</div>
											</div>
										</div>

									</div>
									<span class="latest_default_width" style="display:none; visibility:hidden"></span>


								{% endif %}

								<!-- products set DK -->



								{% if products %}
									<div class="box related">
										<div class="box-heading">{{ text_related }}</div>
										<div class="box-content">
											<div id="products-related" class="related-products">

												{% set sliderFor = 3 %}
													{% set productCount = products|length %}

														{% if productCount >= sliderFor %}
															<div class="customNavigation">
																<a class="fa prev fa-angle-left"></a>
																<a class="fa next fa-angle-right"></a>
															</div>
														{% endif %}

														<div class="box-product {% if productCount >= sliderFor %}product-carousel{% else %}productbox-grid{% endif %}" id="{% if productCount >= sliderFor %}related-carousel{% else %}related-grid{% endif %}">
															{% for product in products %}
																<div class="{% if productCount >= sliderFor %}slider-item{% else %}product-items{% endif %}">
																	<div class="product-block product-thumb transition">
																		<div class="product-block-inner">
																			<!-- <div class="image">
																			<a href="{{ product.href }} "><img src="{{ product.thumb }} " alt="{{ product.name }} " title="{{ product.name }} " class="img-responsive" /></a>
																			{% if not product.special %}
																				{% else %}
																					<span class="saleicon sale">Sale</span>
																				{% endif %}
																			</div> -->
																			<div class="image">
																				{% if product.thumb_swap %}
																					<a href="{{ product.href }}">
																						<img src="{{ product.thumb }}" title="{{ product.name }}" alt="{{ product.name }}" class="img-responsive reg-image"/>
																						<img class="img-responsive hover-image" src="{{ product.thumb_swap }}" title="{{ product.name }}" alt="{{ product.name }}"/>
																					</a>
																				{% else %}
																					<a href="{{ product.href }}">
																						<img src="{{ product.thumb }}" title="{{ product.name }}" alt="{{ product.name }}" class="img-responsive"/></a>
																					{% endif %}

																					{% if not product.special %}
																					{% else %}
																						<div class="saleback">
																							<span class="saleicon sale">Sale</span>
																						</div>
																					{% endif %}
																					{% if product.special %}
																						<span class="percentsaving">{{ product.percentsaving }}% </span>
																					{% endif %}
																					{# if product.rating #}
																					<div class="rating">
																						{% for i in 1..5 %}
																							{% if product.rating < i %}
																								<span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
																							{% else %}
																								<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
																							{% endif %}
																						{% endfor %}
																					</div>
																					{# endif #}
																					<div class="button-group">
																						<button type="button"  data-placement="right" title="{{ button_cart }}" class="addtocart" onclick="cart.add('{{ product.product_id }} ');">{{ button_cart }}</button>
																						<button class="wishlist" type="button" data-placement="right" title="{{ button_wishlist }} " onclick="wishlist.add('{{ product.product_id }} ');"><i class="fa fa-heart"></i></button>
																						<button class="compare" type="button"  data-placement="right" title="{{ button_compare }} " onclick="compare.add('{{ product.product_id }} ');"><i class="fa fa-exchange"></i></button>
																						<div class="quickview" data-placement="right" title="{{ button_quickview }}" ><a href="{{ product.quick }}">{{ button_quickview }}<i class="fa fa-eye" aria-hidden="true"></i>
																						</a></div>
																					</div>
																				</div>
																				<div class="caption">



																					<h4><a href="{{ product.href }} ">{{ product.name }} </a></h4>
																					{# <p class="desc"><?php echo $product['description']; ?></p> #}

																					{% if product.price %}
																						<p class="price">
																							{% if not product.special %}
																								{{ product.price }}
																							{% else %}
																								<span class="price-new">{{ product.special }}</span> <span class="price-old">{{ product.price }}</span>
																							{% endif %}
																							{% if product.tax %}
																								<span class="price-tax">{{ text_tax }} {{ product.tax }}</span>
																							{% endif %}

																						</p>
																					{% endif %}



																				</div>



																				<span class="related_default_width" style="display:none; visibility:hidden"></span>
																				<!-- Related Products Start -->
																			</div>
																		</div>
																	</div>
																{% endfor %}
															</div>
														</div>
													</div>
												</div>
											{% endif %}

											{% if tags %}
												<p>{{ text_tags }}
													{% for i in 0..tags|length %}
														{% if i < (tags|length - 1) %} <a href="{{ tags[i].href }}">{{ tags[i].tag }}</a>,
														{% else %} <a href="{{ tags[i].href }}">{{ tags[i].tag }}</a> {% endif %}
														{% endfor %} </p>
													{% endif %}
													{{ content_bottom }}</div>
													{{ column_right }}</div>
												</div>
											</div>
											<script type="text/javascript"><!--
											$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
												$.ajax({
													url: 'index.php?route=product/product/getRecurringDescription',
													type: 'post',
													data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
													dataType: 'json',
													beforeSend: function() {
														$('#recurring-description').html('');
													},
													success: function(json) {
														$('.alert-dismissible, .text-danger').remove();

														if (json['success']) {
															$('#recurring-description').html(json['success']);
														}
													}
												});
											});
											//--></script>
											<script type="text/javascript"><!--
											$('#button-cart').on('click', function() {
												$.ajax({
													url: 'index.php?route=checkout/cart/add',
													type: 'post',
													data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
													dataType: 'json',
													beforeSend: function() {
														$('#button-cart').button('loading');
													},
													complete: function() {
														$('#button-cart').button('reset');
													},
													success: function(json) {
														$('.alert-dismissible, .text-danger').remove();
														$('.form-group').removeClass('has-error');

														if (json['error']) {
															if (json['error']['option']) {
																for (i in json['error']['option']) {
																	var element = $('#input-option' + i.replace('_', '-'));

																	if (element.parent().hasClass('input-group')) {
																		element.parent().before('<div class="text-danger">' + json['error']['option'][i] + '</div>');
																	} else {
																		element.before('<div class="text-danger">' + json['error']['option'][i] + '</div>');
																	}
																}
															}

															if (json['error']['recurring']) {
																$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
															}

																								// Highlight any found errors
																								$('.text-danger').parent().addClass('has-error');
																							}

																							if (json['success']) {
																								$.notify({
																									message: json['success'],
																									target: '_blank'
																								},{
																								// settings
																								element: 'body',
																								position: null,
																								type: "info",
																								allow_dismiss: true,
																								newest_on_top: false,
																								placement: {
																									from: "top",
																									align: "center"
																								},
																								offset: 0,
																								spacing: 10,
																								z_index: 2031,
																								delay: 5000,
																								timer: 1000,
																								url_target: '_blank',
																								mouse_over: null,
																								animate: {
																									enter: 'animated fadeInDown',
																									exit: 'animated fadeOutUp'
																								},
																								onShow: null,
																								onShown: null,
																								onClose: null,
																								onClosed: null,
																								icon_type: 'class',
																								template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success" role="alert">' +
																								'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">&nbsp;&times;</button>' +
																								'<span data-notify="message"><i class="fa fa-check-circle"></i>&nbsp; {2}</span>' +
																								'<div class="progress" data-notify="progressbar">' +
																								'<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
																								'</div>' +
																								'<a href="{3}" target="{4}" data-notify="url"></a>' +
																								'</div>'
																							});

																								$('#cart > button').html('<span id="heading-title">' + json['headingtitle'] + '</span>' + '<span id="cart-icon">' + '</span>' + '<span id="cart-total">' + json['total'] + '</span>');

																								//$('html, body').animate({ scrollTop: 0 }, 'slow');

																								$('#cart > ul').load('index.php?route=common/cart/info ul li');
																							}
																						},
																						error: function(xhr, ajaxOptions, thrownError) {
																							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
																						}
																					});
});
//--></script>
<script type="text/javascript"><!--
$('.date').datetimepicker({
	language: '{{ datepicker }}',
	pickTime: false
});

$('.datetime').datetimepicker({
	language: '{{ datepicker }}',
	pickDate: true,
	pickTime: true
});

$('.time').datetimepicker({
	language: '{{ datepicker }}',
	pickDate: false
});

$('button[id^=\'button-upload\']').on('click', function() {
	var node = this;

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
		clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$('.text-danger').remove();

					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}

					if (json['success']) {
						alert(json['success']);

						$(node).parent().find('input').val(json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script>
<script type="text/javascript"><!--
$('#review').delegate('.pagination a', 'click', function(e) {
	e.preventDefault();

	$('#review').fadeOut('slow');

	$('#review').load(this.href);

	$('#review').fadeIn('slow');
});

$('#review').load('index.php?route=product/product/review&product_id={{ product_id }}');

$('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id={{ product_id }}',
		type: 'post',
		dataType: 'json',
		data: $("#form-review").serialize(),
		beforeSend: function() {
			$('#button-review').button('loading');
		},
		complete: function() {
			$('#button-review').button('reset');
		},
		success: function(json) {
			$('.alert-dismissible').remove();

			if (json['error']) {
				$('#review').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}

			if (json['success']) {
				$('#review').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').prop('checked', false);
			}
		}
	});
});

$(document).ready(function() {
	var galleryThumbs = new Swiper('#additional-carousel', {
		effect: 'slide',
		preloadImages: false,
		lazy: true,
		spaceBetween: 15,
		slidesPerView: 4,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});

	var galleryTop = new Swiper('#thumb-carousel', {
		effect: 'slide',
		preloadImages: false,
		lazy: true,
		thumbs: {
			swiper: galleryThumbs
		}
	});

	$('#thumb-carousel').magnificPopup({
		type: 'image',
		delegate: 'a',
		gallery: {
			enabled: true
		}
	});
});

function update_prices_opt() {

	var input_val = $('.plus-minus').val();
	var quantity  = parseInt(input_val);
	var minimumval = $('#minimumval').val();

	if (quantity < minimumval) {
		$('.plus-minus').val(minimumval);
	}

	$.ajax({
		type: 'post',
		url:  'index.php?route=product/product/update_prices',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, #smch_modal_data textarea'),
		dataType: 'json',
		success: function(json) {
			$('#update_price').html(json['price']);
			$('#update_special').html(json['special']);
			$('#you_save').html(json['you_save']);
			$('#update_tax').html(json['tax']);
		}
	});
}


//--></script>
{{ footer }}
