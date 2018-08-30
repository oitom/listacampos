	<div class="container-wrap">
		<footer id="fh5co-footer" role="contentinfo">
			<div class="row">
				<div class="col-md-6 fh5co-widget">
					<h4>Sobre Lista Campos</h4>
					<p class="justify">
						O portal de empresas de Campos do Jordão. Nosso objetivo é ligar clientes aos negócios locais. Facilitando o acesso à informações dos mais diversos segmentos, entre empresas  privadas  e  públicas.  Encontre  em nosso portal: contato, endereço, horário de funcionamento e muito mais.
					</p>
				</div>
				<div class="col-md-6">
					<h4>Contato</h4>
					<ul class="fh5co-footer-links">
						<li>Rua Inacio Caetano, 480. Edifício Toscana, 2º andar - Sala 206.</li>
						<li><a href="tel://1234567920">(12) 9-9672-7945 / 9-8205-6774</a></li>
						<li><a href="mailto:info@yoursite.com">contato@listacampos.com.br</a></li>
						<li><a href="http://listacampos.com.br/contato/" class="btn-a">Envie sua mensagem</a></li>
					</ul>
				</div>

			</div>
		</footer>
		<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="https://www.facebook.com/Lista-Campos-523506748005521/" target="_blank"><i class="icon-facebook2 fb-footer"></i></a></li>
							<li><a href="https://www.instagram.com/lista.campos/" target="_blank"><i class="icon-instagram fb-footer"></i></a></li>
						</ul>
					</p>
					<p>
						<small class="block">&copy; 2017-2018  -  Lista Campos. All Rights Reserved.</small> 
					</p>
				</div>
			</div>
	</div><!-- END container-wrap -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo JS; ?>jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo JS; ?>jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo JS; ?>bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo JS; ?>jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?php echo JS; ?>jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo JS; ?>jquery.magnific-popup.min.js"></script>
	<script src="<?php echo JS; ?>magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="<?php echo JS; ?>jquery.countTo.js"></script>
	<!-- Main -->
	<script src="<?php echo JS; ?>main.js"></script>
	<script src="<?php echo JS; ?>jquery.bxslider.js"></script>
    <script>
        $(document).ready(function(){
            
            var myslider = $('.slider').bxSlider();
        	if($('.slider') =="")
        	{
            	if(myslider != null)
           			$myslider.reloadSlider();
           	}

           	var cadastro = getCookie("cadastro");

           	if(cadastro.length == 0){
           		setCookie("cadastro", "1", "1");
           		
           		if(window.location.href == "http://listacampos.com.br/" || window.location.href == "http://listacampos.com.br")
           		{
           			$("body").css("overflow", "hidden");
           			$(".bg-popup").fadeIn();
           		}
           	}

           	function setCookie(cname, cvalue, exdays) {
			    var d = new Date();
			    d.setTime(d.getTime() + (exdays * 12 * 60 * 60 * 1000));
			    var expires = "expires="+d.toUTCString();
			    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}


           	function getCookie(cname) {
			    var name = cname + "=";
			    var decodedCookie = decodeURIComponent(document.cookie);
			    var ca = decodedCookie.split(';');

			    for(var i = 0; i <ca.length; i++) {
			        var c = ca[i];
			        while (c.charAt(0) == ' ') {
			            c = c.substring(1);
			        }
			        if (c.indexOf(name) == 0) {
			            return c.substring(name.length, c.length);
			        }
			    }
			    return "";
			}

        });
    </script>
     <script type="text/javascript">
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

		$("#carregar").click(function(){

			var ext = $('#upload-foto').val().split('.').pop().toLowerCase();

			if($.inArray(ext, ['gif','png','jpg','jpeg', 'JPG', 'PNG', 'GIF']) == -1) {
				alert('Esse tipo de arquivo não é permitido!');
				return false;
			}
			$(".upload-bar").fadeIn();
		});


        $("#avancar-form").click(function(){
        
            if($('#nome-empresa').val().length < 3){
                $('#nome-empresa').focus();
                $(".result").html("O campo Nome da empresa está incompleto!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
            if($('#select-categoriaa').val() == "Selecione..."){
                $('#select-categoriaa').focus();
                $(".result").html("A Categoria da empresa não foi selecionada!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
            if($('#select-subcategoriaa').val() == "Selecione..."){
                $('#select-subcategoriaa').focus();
                $(".result").html("A Subcategoria da empresa não foi selecionada!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }

            if($("#time-domingo-abre").val().length > 0)
            {
            	if($("#time-domingo-fecha").val().length == 0)
            	{
            		$("#time-domingo-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no domingo");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            if($("#time-segunda-abre").val().length > 0)
            {
            	if($("#time-segunda-fecha").val().length == 0)
            	{
            		$("#time-segunda-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no segunda");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            if($("#time-terca-abre").val().length > 0)
            {
            	if($("#time-terca-fecha").val().length == 0)
            	{
            		$("#time-terca-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no terça");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            if($("#time-quarta-abre").val().length > 0)
            {
            	if($("#time-quarta-fecha").val().length == 0)
            	{
            		$("#time-quarta-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no quarta");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            if($("#time-quinta-abre").val().length > 0)
            {
            	if($("#time-quinta-fecha").val().length == 0)
            	{
            		$("#time-quinta-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no quinta");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            if($("#time-sexta-abre").val().length > 0)
            {
            	if($("#time-sexta-fecha").val().length == 0)
            	{
            		$("#time-sexta-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no sexta");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            if($("#time-sabado-abre").val().length > 0)
            {
            	if($("#time-sabado-fecha").val().length == 0)
            	{
            		$("#time-sabado-fecha").focus();
	                $(".result").html("É necessário colocar uma hora de fechamento no sabado");
	                $(".result").css('background', '#d02424');
	                $(".result").fadeIn();
	                return false;
            	}
            }
            
        });
		// CLEAR TIME
        $("#nao-abre-domingo").click(function(){
			$('#time-domingo-fecha, #time-domingo-abre').val("");
		});
		$("#nao-abre-segunda").click(function(){
			$('#time-segunda-fecha, #time-segunda-abre').val("");
		});
		$("#nao-abre-terca").click(function(){
			$('#time-terca-fecha, #time-terca-abre').val("");
		});
		$("#nao-abre-quarta").click(function(){
			$('#time-quarta-fecha, #time-quarta-abre').val("");
		});
		$("#nao-abre-quinta").click(function(){
			$('#time-quinta-fecha, #time-quinta-abre').val("");
		});
		$("#nao-abre-sexta").click(function(){
			$('#time-sexta-fecha, #time-sexta-abre').val("");
		});
		$("#nao-abre-sabado").click(function(){
			$('#time-sabado-fecha, #time-sabado-abre').val("");
		});
		// UNCHECK
		$('#time-domingo-fecha, #time-domingo-abre').keypress(function(){
			$('#nao-abre-domingo').attr('checked', false);
		});
		$('#time-segunda-fecha, #time-segunda-abre').keypress(function(){
			$('#nao-abre-segunda').attr('checked', false);
		});
		$('#time-terca-fecha, #time-terca-abre').keypress(function(){
			$('#nao-abre-terca').attr('checked', false);
		});
		$('#time-quarta-fecha, #time-quarta-abre').keypress(function(){
			$('#nao-abre-quarta').attr('checked', false);
		});
		$('#time-quinta-fecha, #time-quinta-abre').keypress(function(){
			$('#nao-abre-quinta').attr('checked', false);
		});
		$('#time-sexta-fecha, #time-sexta-abre').keypress(function(){
			$('#nao-abre-sexta').attr('checked', false);
		});
		$('#time-sabado-fecha, #time-sabado-abre').keypress(function(){
			$('#nao-abre-sabado').attr('checked', false);
		});


		function mask(e, id, mask)
		{
			var tecla=(window.event)?event.keyCode:e.which;

			if((tecla>47 && tecla<58)){
				mascara(id, mask);
				return true;
			} 
			else{
				if (tecla==8 || tecla==0){
					mascara(id, mask);
					return true;
				} 
				else
					return false;
			}
		}

		function mascara(id, mask)
		{
			var i = id.value.length;
			var carac = mask.substring(i, i+1);
			var prox_char = mask.substring(i+1, i+2);

			if(i == 0 && carac != '#'){
				insereCaracter(id, carac);
				if(prox_char != '#')
					insereCaracter(id, prox_char);
			}
			else if(carac != '#'){
				insereCaracter(id, carac);
				if(prox_char != '#')
					insereCaracter(id, prox_char);
			}

			function insereCaracter(id, char){
				id.value += char;
			}
		}

		 $("#cadastro").click(function(){
            if($('#nome-cadastro').val().length < 3){
                $('#nome-cadastro').focus();
                $(".result").html("O campo nome está incompleto!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
            if(!isValidEmailAddress($('#email-cadastro').val())){
                $('#email-cadastro').focus();
                $(".result").html("O campo e-mail está inválido!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
     
       		$.post("http://listacampos.com.br/email/send/", { nome: $('#nome-cadastro').val(), email: $('#email-cadastro').val() }, function(data) 
       		{
                $('#email-cadastro').val('');
                $('#nome-cadastro').val('');
                $(".result").html(data);
                $(".result").html("E-mail enviado com sucesso!");
                $(".result").css('background', '#589955');
                $(".result").fadeIn();

                setTimeout(function(){ 
					$(".bg-popup").fadeOut();
                	$("body").css("overflow", "auto");
               	}, 3000);
            });
        });

		 $(".close-popup>p").click(function(){
		 	$(".bg-popup").fadeOut();
            $("body").css("overflow", "auto");
		 });
            
        $("#enviar").click(function(){
            if($('#nome').val().length < 3){
                $('#nome').focus();
                $(".result").html("O campo nome está incompleto!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
            if(!isValidEmailAddress($('#email').val())){
                //alert("Email inválido");
                $('#email').focus();
                $(".result").html("O campo e-mail está inválido!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
            if($('#mensagem').val().length < 3){
                $('#mensagem').focus();
                $(".result").html("O campo mensagem está incompleto!");
                $(".result").css('background', '#d02424');
                $(".result").fadeIn();
                return false;
            }
            console.log(window.location.href);
            console.log("http://listacampos.com.br/contato");

            if(window.location.href == "http://listacampos.com.br/contato/" || window.location.href == "http://listacampos.com.br/contato"){
            	$.post("http://listacampos.com.br/contato/enviar/", { nome: $('#nome').val(), email: $('#email').val(), mensagem: $('#mensagem').val() }, function(data) {
	                $('#email').val('');
	                $('#nome').val('');
	                $('#mensagem').val('');
	                $(".result").html(data);
	                $(".result").html("E-mail enviado com sucesso!");
	                $(".result").css('background', '#589955');
	                $(".result").fadeIn(); 
	            });
            }
            else if(window.location.href == "http://listacampos.com.br/sugestao/" || window.location.href == "http://listacampos.com.br/contato"){
            	$.post("http://listacampos.com.br/sugestao/enviar/", { nome: $('#nome').val(), email: $('#email').val(), mensagem: $('#mensagem').val() }, function(data) {
	                $('#email').val('');
	                $('#nome').val('');
	                $('#mensagem').val('');
	                $(".result").html(data);
	                $(".result").html("E-mail enviado com sucesso!");
	                $(".result").css('background', '#589955');
	                $(".result").fadeIn(); 
	            });
            }
            else{

	            $.post("http://listacampos.com.br/email/index/", { nome: $('#nome').val(), email: $('#email').val(), mensagem: $('#mensagem').val(), codigo_empresa: $('#codigo_empresa').val() }, function(data) {
	                $('#email').val('');
	                $('#nome').val('');
	                $('#mensagem').val('');
	                $(".result").html(data);
	                $(".result").html("E-mail enviado com sucesso!");
	                //$(".result").html(data);
	                $(".result").css('background', '#589955');
	                $(".result").fadeIn(); 
	            });
        	}

        });
    </script>
	
	</body>
</html>
