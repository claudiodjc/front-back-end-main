function camposLetrasMaiuscula(){
    let nome_escola = document.getElementById('nome_escola')
    let nome  = document.getElementById('nome')
    let cidade = document.getElementById('cidade')
    let curso_interesse = document.getElementById('curso_interesse')

    nome_escola.value = nome_escola.value.toUpperCase()
    nome.value = nome.value.toUpperCase()
    cidade.value = cidade.value.toUpperCase()
    curso_interesse.value = curso_interesse.value.toUpperCase()
}

