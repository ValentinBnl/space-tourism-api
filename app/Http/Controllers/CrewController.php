<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    /**
     * Liste tous les membres d'équipage.
     *
     * @group Crew
     * @response 200 array[
     *  {
     *    "id": 1,
     *    "name": "John Doe",
     *    "role": "Commander",
     *    "bio": "Experienced astronaut.",
     *    "image": "johndoe.jpg",
     *    "created_at": "2024-01-01T00:00:00.000000Z",
     *    "updated_at": "2024-01-01T00:00:00.000000Z"
     *  }
     * ]
     */
    public function index()
    {
        return response()->json(Crew::all());
    }

    /**
     * Crée un membre d'équipage.
     *
     * @group Crew
     * @bodyParam name string required Nom du membre. Exemple: John Doe
     * @bodyParam role string required Rôle dans la mission. Exemple: Commander
     * @bodyParam bio string Biographie (optionnelle). Exemple: Expérimenté dans plusieurs missions spatiales.
     * @bodyParam image string URL de l’image (optionnelle). Exemple: johndoe.jpg
     * @response 201 {
     *   "id": 2,
     *   "name": "John Doe",
     *   "role": "Commander",
     *   "bio": "Expérimenté dans plusieurs missions spatiales.",
     *   "image": "johndoe.jpg",
     *   "created_at": "2024-01-01T00:00:00.000000Z",
     *   "updated_at": "2024-01-01T00:00:00.000000Z"
     * }
     */
    public function store(Request $request)
    {
        $crew = Crew::create($request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]));

        return response()->json($crew, 201);
    }

    /**
     * Affiche un membre d'équipage spécifique.
     *
     * @group Crew
     * @urlParam crew int required ID du membre. Exemple: 1
     * @response 200 {
     *   "id": 1,
     *   "name": "John Doe",
     *   "role": "Commander",
     *   "bio": "Expérimenté dans plusieurs missions spatiales.",
     *   "image": "johndoe.jpg",
     *   "created_at": "2024-01-01T00:00:00.000000Z",
     *   "updated_at": "2024-01-01T00:00:00.000000Z"
     * }
     */
    public function show(Crew $crew)
    {
        return response()->json($crew);
    }

    /**
     * Met à jour un membre d'équipage.
     *
     * @group Crew
     * @urlParam crew int required ID du membre. Exemple: 1
     * @bodyParam name string Nom mis à jour. Exemple: Jane Smith
     * @bodyParam role string Nouveau rôle. Exemple: Pilot
     * @bodyParam bio string Nouvelle biographie. Exemple: Spécialiste technique.
     * @bodyParam image string Nouvelle image. Exemple: janesmith.jpg
     */
    public function update(Request $request, Crew $crew)
    {
        $crew->update($request->validate([
            'name' => 'sometimes|required|string|max:255',
            'role' => 'sometimes|required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]));

        return response()->json($crew);
    }

    /**
     * Supprime un membre d'équipage.
     *
     * @group Crew
     * @urlParam crew int required ID du membre. Exemple: 1
     * @response 204 {
     *   "message": "Deleted successfully"
     * }
     */
    public function destroy(Crew $crew)
    {
        $crew->delete();

        return response()->json(null, 204);
    }
}
