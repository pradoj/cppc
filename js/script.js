$(function(){
	$("form").bind("submit", function(event) {
	    event.preventDefault();
	});
	$.global.preferCulture("pt-BR");
	
	// input1 -> percentual de um número
	$("#calcular").click(function(event){
	    var value     = $.global.parseFloat($("#value").val());
	    var percent   = $.global.parseFloat($("#percent").val());
	    var resultado = value * percent / 100;
	    
	    $("#result").html(
	        '<strong>' + $.global.format(percent, 'd') + '% </strong>' +
	        ' de ' +
	        '<em>' + $.global.format(value, 'n') + '</em>' +
	        ' é: ' + 
	        '<em>' + $.global.format(resultado, 'n') + '</em>'
	    );
	});
	
	// input2 -> percentual entre 2 números
	$("#calcular2").click(function(event){
        var value1     = $.global.parseFloat($("#value1").val());
        var value2     = $.global.parseFloat($("#value2").val());

        var html2 = '<ul>';
        html2 = html2 +
            '<li>' + 
            '<strong>' + $.global.format(value1, 'n') + '</strong>' +
            ' é ' + 
            '<em>' + $.global.format((value1/value2), 'p') + '</em>' +
            ' de ' + 
            '<strong>' + $.global.format(value2, 'n') + '</strong>' + 
            '</li>';
        html2 = html2 + 
            '<li>' + 
            '<strong>' + $.global.format(value2, 'n') + '</strong>' +
            ' é ' + 
            '<em>' + $.global.format((value2/value1), 'p') + '</em>' +
            ' de ' + 
            '<strong>' + $.global.format(value1, 'n') + '</strong>' + 
            '</li>';
        html2 = html2 + '</ul>';
        
        $("#result2").html(html2);
    });
	
});
