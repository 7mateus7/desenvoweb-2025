visor = document.getElementById('idResultado');
let primeiroValor;
let operador;
let segundoValor;
let calculoFeito = false;

function limpar(){
    visor.value = ""
}

function digito(valor){
    if (calculoFeito === true){
        limpar();
        calculoFeito = false;
    }
    visor.value += valor;
}

function escolheOperacao(operadorEscolhido){
    primeiroValor = visor.value;
    operador = operadorEscolhido;
    limpar();
}

function apresentaValor(tela, num1, ope, num2, resul){
    tela.value = num1 + " " + ope + " " + num2 + " = " + resul;
}

function calcular(){
    segundoValor = visor.value;

    primeiroValor = parseFloat(primeiroValor);
    segundoValor = parseFloat(segundoValor);

    let resultado;

    if(operador === '+'){
        resultado = primeiroValor + segundoValor;
    } else if (operador === '-'){
        resultado = primeiroValor - segundoValor;
    } else if (operador === '*'){
        resultado = primeiroValor * segundoValor;
    } else {
        resultado = primeiroValor / segundoValor;
    }

    calculoFeito = true;

    apresentaValor(visor, primeiroValor, operador, segundoValor, resultado);
}

    document.addEventListener('keydown', function(evento) {
        tecla = evento.key;

        console.log(tecla);
        if (tecla >= '0' && tecla <= '9'){
            digito(tecla)
        } else if (tecla === '+' || tecla === '-' || tecla === '*' || tecla === '/'){
            escolheOperacao(tecla)
        } else if (tecla === 'Enter' || tecla === '='){
            calcular()
        } else if (tecla === 'Escape' || tecla.toLowerCase() === 'c'){
            limpar()
        }
    })