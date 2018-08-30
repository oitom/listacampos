;(function () {
	
	var callcategoria = function(){

		$(document).ready(function(){

				var alimentos 	= ["Açougue","Cafés", "Carrinho de lanches", "Chocolates", "Confeitarias", "Geléia/Doces", "Hortifrut", "Peixaria", "Lanchonetes", "Queijo", "Pizzaria", "Padaria", "Mercados", "Supermercados", "Restaurantes", "Vinhos"];
				var compras 	= ["Bebê e Gestante", "Bijouterias", "Boutiques", "Brinquedos", "Calçados", "Cama", "CD / DVD", "Floricultura", "Jóias", "Langerie", "Livrarias", "Lojas", "Magazines", "Malharias", "Materiais esportivos", "Meias", "Mesa e Banho", "Móveis", "Otica", "Perfumaria", "Pijama", "Presentes", "Relógio", "Selarias", "Shoppings"];
				var educacao 	= ["Ifantil","Fundamental","Médio","Superior","Idioma","Técnica","Curso Profissionalizante"];
				var saude 		= ["Posto de saúde", "Cardiologia", "Cirurgia Vascular", "Clínicas", "Clínico Geral", "Farmácias", "Fisioterapia", "Ginecologia", "Homeopatia", "Hospitais", "Laboratório", "Neurologia", "Nutricionista", "Odontologia", "Ortopedia", "Otorrinolaringologia", "Pediatria", "Podologista", "Psicologia", "Urologia"];
				var veiculos 	= ["Acessórios", "Auto Elétrica", "Bicicletarias", "Borracharias", "Lava Autos", "Locação", "Mecânicas", "Motos", "Oficinas Mecânicas", "Pneus", "Postos de Combustíveis", "Revendedores", "Som Automotivo"];
				var utilidade 	= ["Associações","Bancos","Entidades Religiosas","ONGs","Ponto de Táxi","Prefeitura","Rodoviária","Telefones de Emergência","Telefones Úteis"];
				var servicos 	= ["Advogados", "Arquitetos", "Baby Sitter", "Dentistas", "Despachantes", "Eletricista", "Engenheiros", "Historiador", "Pintor", "Veterinários"];

				
				$("#select-bairro").change(function () {
					$(this).css("background","#d1ead2");
				});	

				$("#select-classificacao").change(function () {
					$(this).css("background","#d1ead2");
				});	
				
				$("#select-categoria").change(function () {
					
					$("#select-subcategoria>option").remove();
					var val = $(this).val();

					
					if (val == "Alimentos") {
						for(item in alimentos) {
							$("#select-subcategoria").append(new Option(alimentos[item]));
						}

					} else if (val == "Compras") {
						for(item in compras) {
							$("#select-subcategoria").append(new Option(compras[item]));
						}
					} else if (val == "Educação") {
						for(item in educacao) {
							$("#select-subcategoria").append(new Option(educacao[item]));
						}
					} else if (val == "Saúde") {
						for(item in saude) {
							$("#select-subcategoria").append(new Option(saude[item]));
						}
					}
					else if (val == "Veículos") {
						for(item in veiculos) {
							$("#select-subcategoria").append(new Option(veiculos[item]));
						}
					}
					else if (val == "Utilidades públicas") {
						for(item in utilidade) {
							$("#select-subcategoria").append(new Option(utilidade[item]));
						}
					}
					else if (val == "Serviços") {
						for(item in servicos) {
							$("#select-subcategoria").append(new Option(servicos[item]));
						}
					}
					$("#select-categoria").css("background","#d1ead2");
					$("#select-subcategoria").css("background","#d1ead2");

				});

		});
	};

	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
	    
	    	
	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="fh5co-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#fh5co-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#fh5co-offcanvas').append(clone2);

		$('#fh5co-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#fh5co-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
		});
	};


	var burgerMenu = function() {

		$('body').on('click', '.js-fh5co-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};
	

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
	
	};


	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};


	var counterWayPoint = function() {
		if ($('#fh5co-counter').length > 0 ) {
			$('#fh5co-counter').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);					
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	var sliderMain = function() {
		
	  	$('#fh5co-hero .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 5000,
			directionNav: true,
			start: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			}

	  	});

	};



	$(function(){
		mobileMenuOutsideClick();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		sliderMain();
		dropdown();
		goToTop();
		loaderPage();
		counterWayPoint();
		callcategoria();
	});


}());