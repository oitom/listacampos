;(function () {
	
	var callcategoria = function(){

		$(document).ready(function(){

				var alimentos 	= ["Selecione...", "Açougue","Cafés", "Carrinho de lanches", "Chocolates", "Confeitarias", "Geléia/Doces", "Hortifrut", "Peixaria", "Lanchonetes", "Queijo", "Pizzaria", "Padaria", "Mercados", "Supermercados", "Restaurantes", "Vinhos", "Outros"];
				var compras 	= ["Selecione...", "Bebê e Gestante", "Bijouterias", "Boutiques", "Brinquedos", "Calçados", "Cama", "CD/DVD", "Casa e Construção", "Floricultura", "Jóias", "Lingerie", "Livrarias", "Lojas", "Magazines", "Malharias", "Materiais esportivos", "Meias", "Mesa e Banho", "Móveis", "Otica", "Perfumaria", "Pijama", "Presentes", "Relógio", "Selarias", "Shoppings", "Outros"];
				var educacao 	= ["Selecione...", "Infantil","Fundamental","Médio","Superior","Idioma","Técnica","Curso Profissionalizante", "Outros"];
				var saude 		= ["Selecione...", "Posto de saúde", "Cardiologia", "Cirurgia Vascular", "Clínicas", "Clínico Geral", "Farmácias", "Fisioterapia", "Ginecologia", "Homeopatia", "Hospitais", "Laboratório", "Neurologia", "Nutricionista", "Odontologia", "Ortopedia", "Otorrinolaringologia", "Pediatria", "Podologista", "Psicologia", "Urologia", "Academia", "Outros"];
				var veiculos 	= ["Selecione...", "Acessórios", "Auto Elétrica", "Bicicletarias", "Borracharias", "Lava Autos", "Locação", "Mecânicas", "Motos", "Oficinas Mecânicas", "Pneus", "Postos de Combustíveis", "Revendedores", "Som Automotivo", "Outros"];
				var utilidade 	= ["Selecione...", "Associações","Bancos","Entidades Religiosas","ONGs","Ponto de Táxi","Prefeitura","Rodoviária","Telefones de Emergência","Telefones Úteis", "Vereadores", "Outros"];
				var servicos 	= ["Selecione...", "Advogados", "Arquitetos", "Baby Sitter", "Dentistas", "Despachantes", "Eletricista", "Engenheiros", "Historiador", "Pintor", "Veterinários", "Comunicação", "Músico", "Contador", "Costureira", "Professor", "Jardineiro", "Pedreiro", "Motorista", "Encanador", "Taxista", "Faxineira", "Marceneiro", "Carpinteiro", "Administração", "Consultor de beleza", "Vendedor", "Eventos", "Turismo", "Construção Civil", "Beleza", "Estética", "Direito", "Fotógrafo", "Outros"];

					
				if ($("#select-categoriaa").val() == "Alimentos") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();

				} else if ($("#select-categoriaa").val() == "Compras") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();
				} else if ($("#select-categoriaa").val() == "Educação") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();
				} else if ($("#select-categoriaa").val() == "Saúde") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();
				}
				else if ($("#select-categoriaa").val() == "Veículos") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();
				}
				else if ($("#select-categoriaa").val() == "Utilidade públicas") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();
				}
				else if ($("#select-categoriaa").val() == "Serviços") {
					$("#select-categoriaa").val("Selecione...").change();
					$("#select-subcategoriaa").val("Selecione a categoria primeiro").change();
				}

				$("#select-categoriaa").change(function () {
					var val = $(this).val();

					$("#select-subcategoriaa>option").remove();
					//$("#select-subcategoriaa").append(new Option('Selecione...', 1));
					
					if (val == "Alimentos") {
						for(item in alimentos) {
							$("#select-subcategoriaa").append(new Option(alimentos[item]));
						}

					} else if (val == "Compras") {
						for(item in compras) {
							$("#select-subcategoriaa").append(new Option(compras[item]));
						}
					} else if (val == "Educação") {
						for(item in educacao) {
							$("#select-subcategoriaa").append(new Option(educacao[item]));
						}
					} else if (val == "Saúde") {
						for(item in saude) {
							$("#select-subcategoriaa").append(new Option(saude[item]));
						}
					}
					else if (val == "Veículos") {
						for(item in veiculos) {
							$("#select-subcategoriaa").append(new Option(veiculos[item]));
						}
					}
					else if (val == "Utilidade públicas") {
						for(item in utilidade) {
							$("#select-subcategoriaa").append(new Option(utilidade[item]));
						}
					}
					else if (val == "Serviços") {
						for(item in servicos) {
							$("#select-subcategoriaa").append(new Option(servicos[item]));
						}
					}
				});


				if($("#select-subcategoria").val() != "Selecione..."){
					$("#select-subcategoria").css("background","#d1ead2");
				}
				if($("#select-bairro").val() != "Selecione..."){
					$("#select-bairro").css("background","#d1ead2");
				}
				if($("#select-classificacao").val() != "Selecione..."){
					$("#select-classificacao").css("background","#d1ead2");
				}

				document.getElementById("seachcampo").onkeypress = function(e) {
				var chr = String.fromCharCode(e.which);
				if ("1234567890çãõíáéóúâêîôûqwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM ".indexOf(chr) < 0)
				return false;
				};
				
				$(".search-bar").click(function(){
					var value = $(".search-input").val();
					value = $.trim(value);

					if(value.length >0){
						
						value = value.toLowerCase();
						var map={"â":"a","Â":"A","à":"a","À":"A","á":"a","Á":"A","ã":"a","Ã":"A","ê":"e","Ê":"E","è":"e","È":"E","é":"e","É":"E","î":"i","Î":"I","ì":"i","Ì":"I","í":"i","Í":"I","õ":"o","Õ":"O","ô":"o","Ô":"O","ò":"o","Ò":"O","ó":"o","Ó":"O","ü":"u","Ü":"U","û":"u","Û":"U","ú":"u","Ú":"U","ù":"u","Ù":"U","ç":"c","Ç":"C", " ":"-", "/":"-"  };
						valor = value.replace(/[\W\[\] ]/g,function(a){return map[a]||a});

						window.location = "http://listacampos.com.br/home/pesquisar/"+valor+"/";
						return false;
					}
					else
						return false;
				});

				$(".search-input").keypress(function(event)
				{
					if (event.which == 13 )
					{
						var value = $(".search-input").val();
						
						value = $.trim(value);
						console.log("aaaa");

						if(value.length >0){
							value = value.toLowerCase();
							var map={"â":"a","Â":"A","à":"a","À":"A","á":"a","Á":"A","ã":"a","Ã":"A","ê":"e","Ê":"E","è":"e","È":"E","é":"e","É":"E","î":"i","Î":"I","ì":"i","Ì":"I","í":"i","Í":"I","õ":"o","Õ":"O","ô":"o","Ô":"O","ò":"o","Ò":"O","ó":"o","Ó":"O","ü":"u","Ü":"U","û":"u","Û":"U","ú":"u","Ú":"U","ù":"u","Ù":"U","ç":"c","Ç":"C", " ":"-", "/":"-" };
							valor = value.replace(/[\W\[\] ]/g,function(a){return map[a]||a});

						window.location = "http://listacampos.com.br/home/pesquisar/"+valor+"/";
							return false;
						}
						else
							return false;
					}
					if(event.which == 8){
						$(".search-input").val("");
						return false;
					}
				});

				$("#select-bairro").change(function(){
					var val = $(this).val();
					var url2 = false;
					var url  = window.location.href;
					var res  = url.substring(url.length-8, url.length-1);
					var res2 = url.substring(url.length-4, url.length-1);

					if(res == "rnessia" || res == "sia/asc" || res == "ia/desc")
						url = url.substring(url.length-11, 0);
					if(res == "apivari" || res == "ari/asc" || res == "ri/desc")
						url = url.substring(url.length-9, 0);
					if(res == "guaribe" || res == "ibe/asc" || res == "be/desc")
						url = url.substring(url.length-10, 0);
					
					var newurl="";

					if(res2 == "asc"){
						url = url.substring(url.length-4, 0);
						newurl = url+val+"/"+res2+"/";
						url2 = true;
					}
					if(res2 == "esc"){
						url = url.substring(url.length-5, 0);
						newurl = url+val+"/d"+res2+"/";
						url2 = true;
					}

					newurl2 = url+val+"/";

					if(url2)
						window.location = newurl;
					else	
						window.location = newurl2;
					
					console.log(res);
					console.log(res2);
					console.log(newurl);
					console.log(newurl2);

				});

				$("#select-classificacao").change(function(){
					var val = $(this).val();
					if(val == "De A - Z")
						val = "asc";
					else
						val = "desc";

					var url = window.location.href;
					var res = url.substring(url.length-4, url.length-1);
					
					if(res == "asc")
						url = url.substring(url.length-4, 0);
					if(res == "esc")
						url = url.substring(url.length-5, 0);

					var newurl = url+val+"/";
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
					else if (val == "Utilidade públicas")
						categoriaSelecionada = "utilidade-publica";
					else if (val == "Serviços")
						categoriaSelecionada = "servicos";

					window.location = "http://listacampos.com.br/home/categoria/"+categoriaSelecionada+"/";
					
					$("#select-categoria").css("background","#d1ead2");
					$("#select-subcategoria").css("background","#d1ead2");

				});

				$("#select-subcategoria").change(function () {
					
					var val = $(this).val();

					if(val != "Selecione...") {
						var categoriaSelecionada = $("#select-categoria").val();
						var url = "http://listacampos.com.br/home/categoria/";

						switch(categoriaSelecionada){
							case "Alimentos": categoriaSelecionada = "alimentos"; break;
							case "Compras": categoriaSelecionada = "compras"; break;
							case "Educação": categoriaSelecionada = "educacao"; break;
							case "Saúde": categoriaSelecionada = "saude"; break;
							case "Veículos": categoriaSelecionada = "veiculos"; break;
							case "Utilidade públicas": categoriaSelecionada = "utilidade-publica"; break;
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