<?php

namespace App\Services;

use App\Models\Club;
use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CountryService
{
    public function store($data): Model|Builder {
        return Country::query()->create($data);
    }

    public function getAll(): Collection {
        return Country::all();
    }

    /**
     * Get the latest country
     * @return Model|Builder|null
     */
    public function getLatest(): Model|Builder|null {
        return Country::query()->latest()->first();
    }

    /**
     * Get the country by ID
     * @param int $id
     * @return Builder|array|Collection|Model
     */
    public function getById(int $id) : Builder|array|Collection|Model {
        return Country::query()->find($id);
    }

    /**
     * Update an existing country
     * @param Country $country
     * @param $data
     * @return Country
     */
    public function update(Country $country, $data): Country
    {
        $country->update($data);
        return $country;
    }


    /**
     * Delete an existing country
     * @param Country $country
     * @return bool|null
     */
    public function delete(Country $country): ?bool {
        return $country->delete();
    }

}
