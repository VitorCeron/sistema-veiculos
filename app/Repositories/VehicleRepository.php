<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Utils\Filters\LowerThanFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class VehicleRepository
{
    /**
     *
     * @var Vehicle
     */
    private $model;

    /**
     *
     * @param Vehicle $model
     */
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    /**
     *
     * @param integer $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage): LengthAwarePaginator {
        $vehicles = QueryBuilder::for(Vehicle::class)
            ->allowedFilters([
                'name',
                'brand',
                AllowedFilter::custom('vehicle_year', new LowerThanFilter),
                AllowedFilter::custom('kilometers', new LowerThanFilter),
                AllowedFilter::custom('price', new LowerThanFilter),
                'city',
                'type',
            ])
            ->paginate($perPage);

        return $vehicles;
    }

    /**
     *
     * @param integer $id
     * @return Vehicle|null
     */
    public function findById(int $id): ?Vehicle {
        $vehicle = QueryBuilder::for(Vehicle::class)
            ->where('id', $id)
            ->first();

        return $vehicle;
    }

    /**
     * Criar um recurso
     *
     * @param array $data
     * @return Vehicle
     */
    public function store(array $data): Vehicle {
        return $this->model->create($data);
    }

    /**
     *
     * @param integer $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool {
        $vehicle = $this->findById($id);

        if(!$vehicle) {
            return false;
        }

        return $vehicle->update($data);
    }

    /**
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool {
        $vehicle = $this->findById($id);

        if(!$vehicle) {
            return false;
        }

        return $vehicle->delete();
    }
}
