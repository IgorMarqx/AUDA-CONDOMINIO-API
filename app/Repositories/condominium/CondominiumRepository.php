<?php

namespace App\Repositories\condominium;

use App\Http\Requests\condominium\CondominiumCreateRequest;
use App\Models\Condominium;
use Illuminate\Database\Eloquent\Collection;

class CondominiumRepository
{
    public function getAll(): Collection
    {
        return Condominium::all();
    }

    public function getCondominiumById(string $id): Collection|null
    {
        return Condominium::find($id);
    }

    public function createCondominium(CondominiumCreateRequest $data): bool
    {
        return Condominium::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'color' => $data['color'],
        ]);
    }

    public function updateCondominium(Collection $condominium, array $data): bool
    {
        return $condominium->update($data);
    }

    public function deleteCondominium(string $id): bool
    {
        return Condominium::destroy($id);
    }
}
