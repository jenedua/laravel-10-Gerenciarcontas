// Arquivo Boostrap
import './bootstrap';

//importar o JS personalizar
import './custom';

// importar o Inputmask
import Inputmask from 'inputmask';

// Acrescentar máscara no campo com Inputmask
// DOMContentLoaded - dispara o evento quando o HTML foi completamente carregado
document.addEventListener("DOMContentLoaded", function(){

    //Máscara para o campo CPF
     var cpfMask = new Inputmask("999.999.999-99");
     cpfMask.mask(document.querySelectorAll('.cpf'))
})