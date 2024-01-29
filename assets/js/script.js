
function toggleInput(nomChamp) {
    var spanId = 'span' + nomChamp;
    console.log("spanId:", spanId);
    var inputId = nomChamp;
    var modifierBtn = 'modif' + nomChamp;
    var enregistrerBtn = modifierBtn.replace('modif', 'enregistrer');

    document.getElementById(spanId).style.display = 'none';
    document.getElementById(inputId).style.display = 'inline-block';
    document.getElementById(modifierBtn).style.display = 'none';
    document.getElementById(enregistrerBtn).style.display = 'inline-block';
}
