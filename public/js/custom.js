// Receber o seletor do campo valor
    let inputValor = document.getElementById('valor');
//Aguardar o usuário digitar valor no campo
    inputValor.addEventListener('input', function(){
        //obter o valor atual removendo qualquer caractere que não seja número
        let valueValor =  this.value.replace(/[^\d]/g, '');
        // adicionar os separadores de milhares
        var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor.slice(-2);
        //Adicionando a vírgula e até dois digitos se houver centavos
        formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);
        // Atualizar o valor do campo

        this.value = formattedValor;



    })

    