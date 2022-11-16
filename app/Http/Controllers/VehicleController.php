<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Repositories\VehicleRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     *
     * @var VehicleRepository
     */
    private $vehicleRepository;

    /**
     *
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     *
     * @return View
     */
	public function index(): View
	{
		$perPage = 6;
		$items = $this->vehicleRepository->paginate($perPage);

		return view('home', compact('items'));
	}

    /**
     *
     * @return View
     */
	public function listVehicles(): View
	{
		$perPage = 6;
		$items = $this->vehicleRepository->paginate($perPage);

		return view('index', compact('items'));
	}

    /**
     *
     * @return View
     */
	public function create(): View
	{
		return view('form');
	}

    /**
     *
     * @param integer $id
     * @return View
     */
	public function edit(int $id): View
	{
		$item = $this->vehicleRepository->findById($id);

		return view('form', compact('item'));
	}

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
	public function store(VehicleRequest $request): RedirectResponse
	{
		$data = $request->validated();

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename);
            $data['image'] = $filename;
        }

		$insert = $this->vehicleRepository->store($data);

		if (!$insert) {
			return redirect()->back()->with('error', 'Erro ao cadastrar veículo');
		}

		return redirect()->route('home')->with('message', 'Veículo cadastrado com sucesso');
	}

    /**
     *
     * @param VehicleRequest $request
     * @param integer $id
     * @return RedirectResponse
     */
	public function update(VehicleRequest $request, int $id): RedirectResponse
	{
		$data = $request->validated();

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        $update = $this->vehicleRepository->update($id, $data);

		if (!$update) {
			return redirect()->back()->with('error', 'Erro ao atualizar veículo');
		}

		return redirect()->route('home')->with('message', 'Veículo atualizado com sucesso');
	}

    /**
     *
     * @param integer $id
     * @return RedirectResponse
     */
	public function destroy(int $id): RedirectResponse
	{
		$delete = $this->vehicleRepository->delete($id);

		if (!$delete) {
			return redirect()->back()->with('error', 'Erro ao excluir veículo');
		}

		return redirect()->route('home')->with('message', 'Veículo excluído com sucesso');
	}
}
