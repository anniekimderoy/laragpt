<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Affiche les messages
     *
     * @return View
     */
    public function index()
    {
        return view('messages.index', [
            "messages" => auth()->user()->messages
        ]);
    }

    public function store(Request $request)
    {
        /**
         * Valider la question
         */
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
        ]);

        /**
         * Sauvegarder la question reçue dans une variable $question
         */
        $question = $validatedData['question'];

        /**
         * Créer un objet du modèle approprié
         */
        $message = new Message();

        /**
         * Sauvegarder la question dans l'objet
         */
        $message->question = $question;

        // Lire le fichier JSON et le décoder
        $phrases = json_decode(
            file_get_contents(storage_path("app/data/phrases.json"))
        );

        // Trouver la réponse appropriée ou une réponse par défaut
        $reponse = null;
        $keyword = null;

        foreach ($phrases as $keywordText => $phrase) {
            if (mb_stripos($question, $keywordText) !== false) {
                $reponse = $phrase;
                $keyword = $keywordText;
                break;
            }
        }

        if ($reponse === null) {
            $reponse = "Je ne sais pas quoi répondre...";
        }

        // Remplacer les informations entre [crochet] dans la réponse
        $reponse = str_replace('[nom]', $request->user()->prenom, $reponse);
        $reponse = str_replace('[heure]', now()->format('H:i'), $reponse);

        /**
         * Sauvegarder la réponse dans l'objet
         */
        $message->reponse = $reponse;

        /**
         * Associer le message à l'utilisateur connecté
         */
        $request->user()->messages()->save($message);

        /**
         * Associer le keyword au message s'il a été trouvé
         */
        if ($keyword) {
            $keywordModel = Keyword::where('keyword', $keyword)->first();
            if ($keywordModel) {
                $message->keyword()->associate($keywordModel);
                $message->save();
            }
        }

        /**
         * Redirection
         */
        return redirect()->route('messages.index')
            ->with('success', 'Question traitée avec succès.');
    }
}
