function afficherFormulaireNom() {
    document.getElementById("formulaireNom").style.display = "block";
}

function cacherBtnNom() {
    document.getElementById("modifNom").addEventListener("click", function () {
        document.getElementById("modifNom").style.display = "none";
    });
}

function afficherFormulairePrenom() {
    document.getElementById("formulairePrenom").style.display = "block";
}

function cacherBtnPrenom() {
    document.getElementById("modifPrenom").addEventListener("click", function () {
        document.getElementById("modifPrenom").style.display = "none"
    })
}

cacherBtnNom();