

// Receber o seletor do campo valor
    let inputValor = document.getElementById('valor');
    if(inputValor != null){

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
    }

    function confirmarExclusao(event, contaId){
        event.preventDefault();

        Swal.fire({
            title: 'Tem certeza?',
            text: 'Você não poderá reverter isso !',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#0d6efd',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Sim , excluir',

        }).then((result) => {
            if(result.isConfirmed){
                document.getElementById(`formExcluir${contaId}`).submit();
            }
        })
    }

    // Quando carregar a página execute o select
    $(function(){
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
    });

    