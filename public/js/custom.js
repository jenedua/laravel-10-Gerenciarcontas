const { error } = require("jquery");

// Adiciona um listener para executar o código quando o DOM estiver totalmente carregado
 document.addEventListener('DOMContentLoaded', function (){

    // Seleciona a meta tag com o nome 'csrf-token' para obter o token CSRF necessário para requisições seguras
    var csrfTokenElement = document.querySelector('meta[name="csrf-token"]');

    // Verifica se a meta tag foi encontrada
    if(csrfTokenElement){
        // Obtem o valor do token CSRF da meta tag
        var csrfToken =csrfTokenElement.getAttribute('content');


        
        // Define uma função que sera executada em intervalos regulares
        setInterval(function () {
            // Faz uma requisição POST para a rota '/update-last-active' para atualizar a ultima atividade do usuario
            fetch('/update-last-active', {
                method: 'POST', //Define o method HTTP como POST
                headers: {
                    'Content-Type': 'application/json', // Define o tipo de conteudo como JSON
                    'X-CSRF-TOKEN':csrfToken // Inclui o token CSRF para proteger contra ataques CSRF
                },
                body: JSON.stringify({}) // Envia um corpo de requisição vazio como JSON

            })
            .then(response => response.json()) // Converte a resposta para JSON
            .then(data => {
                //Verifica se a resposta indica sucesso
                if(data.status == 'success'){
                    

                }else{
                    // Loga um error no console se a atualização falhar
                    console.error('Não atualizado a data e hora de acesso');

                }

            })
            .catch(error => console.error('Error: ', error)); //Loga um erro no console se a requisição falhar
            console.log(csrfToken);

        }, 10000) // Define o intervalo de tempo - 10000 = 10 segundo ou pode colocar 300000 ms = 5 minutos
    }

 })