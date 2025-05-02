<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Liste toutes les destinations.
     *
     * @group Destinations
     * @response 200 array[
     *  {
     *    "id": 1,
     *    "name": "Mars",
     *    "description": "Planète rouge",
     *    "image": "mars.jpg",
     *    "created_at": "2024-01-01T00:00:00.000000Z",
     *    "updated_at": "2024-01-01T00:00:00.000000Z"
     *  }
     * ]
     */
    public function index()
    {
        return response()->json(Destination::all());
    }

    /**
     * Crée une nouvelle destination.
     *
     * @group Destinations
     * @bodyParam name string required Le nom de la destination. Exemple: Mars
     * @bodyParam description string required La description de la destination. Exemple: Planète rouge
     * @bodyParam image string L’URL de l’image (optionnelle). Exemple: mars.jpg
     *
     * @response 201 {
     *   "id": 2,
     *   "name": "Mars",
     *   "description": "Planète rouge",
     *   "image": "mars.jpg",
     *   "created_at": "2024-01-01T00:00:00.000000Z",
     *   "updated_at": "2024-01-01T00:00:00.000000Z"
     * }
     */
    public function store(Request $request)
    {
        $destination = Destination::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
        ]));

        return response()->json($destination, 201);
    }

    /**
     * Affiche une destination spécifique.
     *
     * @group Destinations
     * @urlParam destination int required L’ID de la destination. Exemple: 1
     * @response 200 {
     *   "id": 1,
     *   "name": "Mars",
     *   "description": "Planète rouge",
     *   "image": "mars.jpg",
     *   "created_at": "2024-01-01T00:00:00.000000Z",
     *   "updated_at": "2024-01-01T00:00:00.000000Z"
     * }
     */
    public function show(Destination $destination)
    {
        return response()->json($destination);
    }

    /**
     * Met à jour une destination existante.
     *
     * @group Destinations
     * @urlParam destination int required L’ID de la destination. Exemple: 1
     * @bodyParam name string Le nom mis à jour. Exemple: Jupiter
     * @bodyParam description string La nouvelle description. Exemple: Planète géante
     * @bodyParam image string L’URL de la nouvelle image. Exemple: jupiter.jpg
     */
    public function update(Request $request, Destination $destination)
    {
        $destination->update($request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'nullable|string|max:255',
        ]));

        return response()->json($destination);
    }

    /**
     * Supprime une destination.
     *
     * @group Destinations
     * @urlParam destination int required L’ID de la destination. Exemple: 1
     * @response 204 {
     *   "message": "Deleted successfully"
     * }
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return response()->json(null, 204);
    }
}
