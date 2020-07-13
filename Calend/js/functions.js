$(function(){
    var data = new Date();
    var mesAtual = data.getMonth() + 1;
    var diaAtual = data.getDay();

    function hideShow(){
        if(mesAtual > 12){
            mesAtual = 1;
        }
        else if(mesAtual < 1){
            mesAtual = 12;
        }
        $('.mes').hide();
        $('#mes_'+mesAtual).show();
    }

    function hideShowDia(){
        if(diaAtual > 31){
            diaAtual = 1;
        }
        else if(diaAtual < 1){
            diaAtual = 31;
        }
        $('.dia').hide();
        $('#dia_'+diaAtual).show();
    }

    $('#proximoMes').on('click', function(e){
        e.preventDefault();
        mesAtual++;
        hideShow();

        return false;
    });

    $('#anteriorMes').on('click', function(e){
        e.preventDefault();
        mesAtual--;
        hideShow();

        return false;
    });

    $('#proximoDia').on('click', function(e){
        e.preventDefault();
        diaAtual++;
        hideShowDia();

        return false;
    });

    $('#anteriorDia').on('click', function(e){
        e.preventDefault();
        diaAtual--;
        hideShowDia();

        return false;
    });

});