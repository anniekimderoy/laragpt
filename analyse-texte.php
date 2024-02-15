<?php

public function methode_qui_recoit_la_question( /* ????? */)
{

    /**
     * @todo Valider la question
     */

    /**
     * @todo Sauvegarder la question reçue dans une variable $question
     */
    $question = null;

    /**
     * @todo Créer un objet du modèle approprié
     */

    /**
     * @todo Sauvegarder la question dans l'objet
     */


    /**
     * @todo Lire le fichier json et le décoder.
     * Les prochaines lignes prennent pour acquis que le fichier
     * sera présent dans une variable $phrases
     */


    /**
     * Trouver la réponse appropriée ou une réponse par défaut 
     * (déjà implémentée)
     */
    $reponse = null;

    foreach ($phrases as $keyword => $phrase) {
        if (mb_stripos($question, $keyword) !== false) {
            $reponse = $phrase;
            break;
        }
    }

    if ($reponse === null) {
        $reponse = "Je ne sais pas quoi répondre...";
    }

    /**
     * @todo Remplacer les informations entre [crochet] dans $reponse, s'il y a lieu
     */


    /**
     * @todo Sauvegarder la réponse dans l'objet
     */

    /**
     * @todo Sauvegarder l'objet dans la BDD
     */

    /**
     * @todo Redirection
     */
}
