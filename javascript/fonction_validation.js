// Fonction pour confirmer avant de valider ou refuser une réservation
function confirmerAction(action) {
    if (action === 'valider') {
        return confirm("Voulez-vous vraiment valider cette réservation ?");
    } else if (action === 'refuser') {
        return confirm("Voulez-vous vraiment refuser cette réservation ?");
    }
    return false;
}

// Fonction pour afficher un message temporaire
function afficherMessage(message, type = 'success') {
    const alertBox = document.createElement('div');
    alertBox.className = `alert alert-${type} fixed-top m-3`;
    alertBox.textContent = message;

    document.body.prepend(alertBox);

    setTimeout(() => {
        alertBox.remove();
    }, 3000);
}
