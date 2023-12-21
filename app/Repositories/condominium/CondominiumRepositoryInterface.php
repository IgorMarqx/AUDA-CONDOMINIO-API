<?php

namespace App\Repositories\condominium;

use App\Http\Requests\condominium\CondominiumCreateRequest;
use App\Models\Condominium;
use Illuminate\Database\Eloquent\Collection;

interface CondominiumRepositoryInterface
{
    public function getAll(): Collection;
    public function getCondominiumById(string $id): Collection|null;
    public function createCondominium(CondominiumCreateRequest $data): bool;
    public function updateCondominium(Collection $condominium,array $data): bool;
    public function deleteCondominium(string $id): bool;

}
