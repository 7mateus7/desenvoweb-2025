
function criaColunaMediaAluno() {
    const linhaCabecalho = document.getElementById('linhaCabecalho');
    const colunaNova = document.createElement('th');
    colunaNova.innerText = "Média Aluno";
    colunaNova.id = 'coluna-media';
    linhaCabecalho.appendChild(colunaNova);
}


function mediaLinha() {
    const colunaExistente = document.getElementById('coluna-media');
    if (!colunaExistente) {
        criaColunaMediaAluno();
    }
    
    const linhasAlunos = document.querySelectorAll("tbody tr");

    linhasAlunos.forEach(linha => {
        const celulaMediaExistente = linha.querySelector(".media-linha");
        if (celulaMediaExistente) {
            celulaMediaExistente.remove();
        }
    });

    linhasAlunos.forEach(linha => {
        const notasLinha = linha.querySelectorAll(".nota");
        let soma = 0;
        let contagemNotasValidas = 0;

        notasLinha.forEach(celulaNota => {
            const valorCelula = parseFloat(celulaNota.innerText);
            if (!isNaN(valorCelula)) {
                soma += valorCelula;
                contagemNotasValidas++;
            }
        });

        const media = (contagemNotasValidas > 0) ? (soma / contagemNotasValidas) : 0;
        
        const celulaMedia = document.createElement('td');
        celulaMedia.innerText = media.toFixed(2);
        celulaMedia.classList.add("media-linha"); 
        linha.appendChild(celulaMedia);
    });
}


function mediaColuna() {
    const rodape = document.querySelector('tfoot.rodape'); 
    if (!rodape) {
        return console.error("Elemento <tfoot> com a classe 'rodape' não encontrado.");
    }
    rodape.innerHTML = "";

    const linhasAlunos = document.querySelectorAll('tbody tr');
    if (linhasAlunos.length === 0) {
        return; 
    }

    const primeiraLinhaNotas = linhasAlunos[0].querySelectorAll(".nota");
    const numeroColunasNotas = primeiraLinhaNotas.length;

    const somaDasColunas = new Array(numeroColunasNotas).fill(0);

    linhasAlunos.forEach(linha => {
        const notasLinha = linha.querySelectorAll('.nota');
        notasLinha.forEach((nota, j) => {
            const valorNota = parseFloat(nota.innerText);
            if (!isNaN(valorNota)) {
                somaDasColunas[j] += valorNota;
            }
        });
    });

    const novaLinhaRodape = document.createElement("tr");
    rodape.appendChild(novaLinhaRodape);

    const celulaMediaLabel = document.createElement("th");
    celulaMediaLabel.innerText = "Média Notas";
    celulaMediaLabel.colSpan = 1; 
    novaLinhaRodape.appendChild(celulaMediaLabel);

    const numeroDeAlunos = linhasAlunos.length;
    somaDasColunas.forEach(soma => {
        const media = (numeroDeAlunos > 0) ? (soma / numeroDeAlunos) : 0;
        const celulaMedia = document.createElement("td");
        celulaMedia.innerText = media.toFixed(2);
        novaLinhaRodape.appendChild(celulaMedia);
    });
}