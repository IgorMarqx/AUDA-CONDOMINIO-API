<?php

namespace App\Services\condominium;

use App\Http\Requests\condominium\CondominiumCreateRequest;
use App\Repositories\condominium\CondominiumRepository;
use Illuminate\Database\Eloquent\Collection;

class CondominiumService
{
    public function __construct(private CondominiumRepository $condominiumRepository)
    {
        $this->condominiumRepository = $condominiumRepository;
    }

    public function getAll(): Collection
    {
        return $this->condominiumRepository->getAll();
    }

    public function getCondominiumById(string $id): Collection|null
    {
        return $this->getCondominiumById($id);
    }

    public function createCondominium(CondominiumCreateRequest $data): bool
    {
        return $this->condominiumRepository->createCondominium($data);
    }

    public function updateCondominium(array $data, string $id): bool
    {
        $condominium = $this->condominiumRepository->getCondominiumById($id);

        if (!$condominium) {
            return false;
        }

        return $this->condominiumRepository->updateCondominium($condominium, [
            'name' => $data['name'],
            'address' => $data['address'],
            'color' => $data['color'],
        ]);
    }

    public function deleteCondominium(string $id): bool
    {
        $condominium = $this->getCondominiumById($id);

        if(!$condominium) {
            return false;
        }

        return $this->deleteCondominium($condominium);
    }

}
