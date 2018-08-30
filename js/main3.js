;(function () {
	
	var callcategoria = function(){

		$(document).ready(function(){

				var alimentos 	= ["Selecione...", "Açougue","Cafés", "Carrinho de lanches", "Chocolates", "Confeitarias", "Geléia/Doces", "Hortifrut", "Peixaria", "Lanchonetes", "Queijo", "Pizzaria", "Padaria", "Mercados", "Supermercados", "Restaurantes", "Vinhos"];
				var compras 	= ["Selecione...", "Bebê e Gestante", "Bijouterias", "Boutiques", "Brinquedos", "Calçados", "Cama", "CD/DVD", "Floricultura", "Jóias", "Langerie", "Livrarias", "Lojas", "Magazines", "Malharias", "Materiais esportivos", "Meias", "Mesa e Banho", "Móveis", "Otica", "Perfumaria", "Pijama", "Presentes", "Relógio", "Selarias", "Shoppings"];
				var educacao 	= ["Selecione...", "Ifantil","Fundamental","Médio","Superior","Idioma","Técnica","Curso Profissionalizante"];
				var saude 		= ["Selecione...", "Posto de saúde", "Cardiologia", "Cirurgia Vascular", "Clínicas", "Clínico Geral", "Farmácias", "Fisioterapia", "Ginecologia", "Homeopatia", "Hospitais", "Laboratório", "Neurologia", "Nutricionista", "Odontologia", "Ortopedia", "Otorrinolaringologia", "Pediatria", "Podologista", "Psicologia", "Urologia"];
				var veiculos 	= ["Selecione...", "Acessórios", "Auto Elétrica", "Bicicletarias", "Borracharias", "Lava Autos", "Locação", "Mecânicas", "Motos", "Oficinas Mecânicas", "Pneus", "Postos de Combustíveis", "Revendedores", "Som Automotivo"];
				var utilidade 	= ["Selecione...", "Associações","Bancos","Entidades Religiosas","ONGs","Ponto de Táxi","Prefeitura","Rodoviária","Telefones de Emergência","Telefones Úteis"];
				var servicos 	= ["Selecione...", "Advogados", "Arquitetos", "Baby Sitter", "Dentistas", "Despachantes", "Eletricista", "Engenheiros", "Historiador", "Pintor", "Veterinários"];

				
				$("#select-classificacao").change(function () {
					$(this).css("background","#d1ead2");
				});	
				
				$("#select-bairro").change(function(){
					var val = $(this).val();
					var url = window.location.href;
					var newurl = url+"/"+val;
					window.location = newurl;

				});

				$("#select-categoria").change(function () {
					
					$("#select-subcategoria>option").remove();
					var val = $(this).val();
					var categoriaSelecionada = "";

					if (val == "Alimentos")
						categoriaSelecionada = "alimentos";
					else if (val == "Compras")
						categoriaSelecionada = "compras";
					else if (val == "Educação")
						categoriaSelecionada = "educacao";
					else if (val == "Saúde")
						categoriaSelecionada = "saude";
					else if (val == "Veículos")
						categoriaSelecionada = "veiculos";
					else if (val == "Utilidades públicas")
						categoriaSelecionada = "utilidade-publica";
					else if (val == "Serviços")
						categoriaSelecionada = "servicos";

					window.location = "http://listacampos.com.br/index.php/home/categoria/"+categoriaSelecionada+"/";
					
					$("#select-categoria").css("background","#d1ead2");
					$("#select-subcategoria").css("background","#d1ead2");

				});

				$("#select-subcategoria").change(function () {
					
					var val = $(this).val();

					if(val != "Selecione...") {
						var categoriaSelecionada = $("#select-categoria").val();
						var url = "http://listacampos.com.br/index.php/home/categoria/";

						switch(categoriaSelecionada){
							case "Alimentos": categoriaSelecionada = "alimentos"; break;
							case "Compras": categoriaSelecionada = "compras"; break;
							case "Educação": categoriaSelecionada = "educacao"; break;
							case "Saúde": categoriaSelecionada = "saude"; break;
							case "Veículos": categoriaSelecionada = "veiculos"; break;
							case "Utilidades públicas": categoriaSelecionada = "utilidade-publica"; break;
							case "Serviços": categoriaSelecionada = "servicos"; break;
						}

						subcategorialower = val.toLowerCase();
						var map={"â":"a","Â":"A","à":"a","À":"A","á":"a","Á":"A","ã":"a","Ã":"A","ê":"e","Ê":"E","è":"e","È":"E","é":"e","É":"E","î":"i","Î":"I","ì":"i","Ì":"I","í":"i","Í":"I","õ":"o","Õ":"O","ô":"o","Ô":"O","ò":"o","Ò":"O","ó":"o","Ó":"O","ü":"u","Ü":"U","û":"u","Û":"U","ú":"u","Ú":"U","ù":"u","Ù":"U","ç":"c","Ç":"C", " ":"-", "/":"-" };
						valor = subcategorialower.replace(/[\W\[\] ]/g,function(a){return map[a]||a});
						//console.log(url+categoriaSelecionada+"/"+valor);
						window.location = url+categoriaSelecionada+"/"+valor+"/";
					
					}
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