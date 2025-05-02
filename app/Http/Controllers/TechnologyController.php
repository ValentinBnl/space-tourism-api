<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Liste toutes les technologies.
     *
     * @group Technologies
     * @response 200 array[
     *  {
     *    "id": 1,
     *    "name": "Launch vehicle",
     *    "description": "A rocket used to carry payload into space.",
     *    "image": "launch-vehicle.jpg",
     *    "created_at": "2024-01-01T00:00:00.000000Z",
     *    "updated_at": "2024-01-01T00:00:00.000000Z"
     *  }
     * ]
     */
    public function index()
    {
        return response()->json(Technology::all());
    }

    /**
     * Crée une technologie.
     *
     * @group Technologies
     * @bodyParam name string required Nom de la technologie. Exemple: Launch vehicle
     * @bodyParam description string Description de la technologie. Exemple: Rocket used to carry payload into space.
     * @bodyParam image string URL ou nom de l’image. Exemple: launch-vehicle.jpg
     * @response 201 {
     *   "id": 2,
     *   "name": "Space capsule",
     *   "description": "Capsule pour les astronautes.",
     *   "image": "capsule.jpg",
     *   "created_at": "2024-01-01T00:00:00.000000Z",
     *   "updated_at": "2024-01-01T00:00:00.000000Z"
     * }
     */
    public function store(Request $request)
    {
        $technology = Technology::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]));

        return response()->json($technology, 201);
    }

    /**
     * Affiche une technologie spécifique.
     *
     * @group Technologies
     * @urlParam technology int required ID de la technologie. Exemple: 1
     * @response 200 {
     *   "id": 1,
     *   "name": "Launch vehicle",
     *   "description": "Rocket used to carry payload.",
     *   "image": "launch.jpg",
     *   "created_at": "2024-01-01T00:00:00.000000Z",
     *   "updated_at": "2024-01-01T00:00:00.000000Z"
     * }
     */
    public function show(Technology $technology)
    {
        return response()->json($technology);
    }

    /**
     * Met à jour une technologie.
     *
     * @group Technologies
     * @urlParam technology int required ID de la technologie. Exemple: 1
     * @bodyParam name string Nom mis à jour. Exemple: New rocket
     * @bodyParam description string Description mise à jour. Exemple: Nouvelle version du lanceur.
     * @bodyParam image string Image mise à jour. Exemple: new-rocket.jpg
     */
    public function update(Request $request, Technology $technology)
    {
        $technology->update($request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]));

        return response()->json($technology);
    }

    /**
     * Supprime une technologie.
     *
     * @group Technologies
     * @urlParam technology int required ID de la technologie. Exemple: 1
     * @response 204 {
     *   "message": "Deleted successfully"
     * }
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return response()->json(null, 204);
    }
}
