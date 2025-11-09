document.addEventListener('DOMContentLoaded', function(){
    const perguntas = document.querySelectorAll('.blocoPergunta');
    const blocoFinal = document.querySelector('.blocoFinal');
    const botaoProx = document.getElementById('botaoProx');

    let perguntaAtual = 0;    

    botaoProx.addEventListener('click', function(){
        const opcoes = perguntas[perguntaAtual].querySelectorAll('input[type="radio"]');
        let validar = false;
        for(let i = 0; i< opcoes.length; i++){
            if (opcoes[i].checked == true){
                validar = true;  
            }
        }
        

        if (validar == false){
            alert('Nenhuma pontuação foi definida!');
        }else{
            perguntas[perguntaAtual].style.display = 'none';
            perguntaAtual++;
            if(perguntaAtual < perguntas.length){
                perguntas[perguntaAtual].style.display = 'block';
            }else{
                botaoProx.style.display = 'none';
                blocoFinal.style.display = 'block';
            }
        }
    });

    if (perguntas.length > 0) { 
        blocoFinal.style.display = 'none';
        perguntas[perguntaAtual].style.display = 'block';


    } else {
        console.log('Nenhuma pergunta encontrada para exibir.');
    }
})