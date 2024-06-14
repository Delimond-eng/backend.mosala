<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Confirmation de Candidature</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1>Merci pour votre candidature, {{ $candidate->prenom }} {{ $candidate->nom }}</h1>
            </div>
            <div class="card-body">
                <p>Votre candidature, pour la session de formation sur l'Intelligence Artificielle, a été reçue avec succès. Nous allons examiner votre candidature et vous contacterons bientôt.</p>
                <p>Cordialement,<br/>Castor Network</p>
            </div>
        </div>
    </div>
</body>
</html>
