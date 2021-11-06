<?php

namespace App\Http\Controllers;

use App\Http\Requests\SphereRequest;
use App\Models\Sphere;
use Symfony\Component\Uid\Uuid;

class CalculationsController extends Controller
{
    public function store(SphereRequest $request): Sphere
    {
        $sphere = new Sphere($request->validated());

        $sphere->id = (string)Uuid::v4();
        $sphere->V = $sphere->getVAttribute();

        $sphere->save();

        return $sphere;
    }

    public function show(string $uuid): Sphere
    {
        return Sphere::query()->where('id', $uuid)->firstOrFail();
    }

    public function update(SphereRequest $request, string $uuid)
    {
        /** @var Sphere $sphere */
        $sphere = Sphere::query()->where('id', $uuid)->firstOrFail();

        $sphere->R = $request->get('R');
        $sphere->V = $sphere->getVAttribute();

        $sphere->save();

        return $sphere;
    }

    public function destroy(string $uuid)
    {
        /** @var Sphere $sphere */
        $sphere = Sphere::query()->where('id', $uuid)->firstOrFail();

        $sphere->delete();

        return response(null, 204);
    }
}
