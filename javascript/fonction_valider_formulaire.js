function validerFormulaireMateriel() {
    const requiredFields = ['ref', 'desgnation', 'type', 'date_achat', 'etat', 'quantite', 'satut'];
    for (const field of requiredFields) {
        const value = document.getElementById(field).value.trim();
        if (value === '') {
            alert(`Veuillez remplir le champ obligatoire : ${field}`);
            return false;
        }
    }
    return true;
}

function validerFormulaireSalle() {
    const requiredFields = ['nom','statut'];
    for (const field of requiredFields) {
        const value = document.getElementById(field).value.trim();
        if (value === '') {
            alert(`Veuillez remplir le champ obligatoire : ${field}`);
            return false;
        }
    }
    return true;
}
