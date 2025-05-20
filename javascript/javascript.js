function inscription_role() {
    var role = document.getElementById("role").value;
    if (role == "etudiant") {
        
    } else if (role == "entreprise") {
        roleText.innerHTML = "Entreprise";
    } else if (role == "enseignant") {
        roleText.innerHTML = "Enseignant";
    } else {
        roleText.innerHTML = "";
    }
}
