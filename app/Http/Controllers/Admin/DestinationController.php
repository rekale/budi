<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\LatestCriteria;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Repositories\DestinationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Storage;

class DestinationController extends AppBaseController
{
    /** @var  DestinationRepository */
    private $destinationRepository;

    public function __construct(DestinationRepository $destinationRepo)
    {
        $this->destinationRepository = $destinationRepo;
    }

    /**
     * Display a listing of the Destination.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->destinationRepository->pushCriteria(new RequestCriteria($request))
                                    ->pushCriteria(LatestCriteria::class);
        $destinations = $this->destinationRepository->paginate();

        return view('admin.destinations.index')
            ->with('destinations', $destinations);
    }

    /**
     * Show the form for creating a new Destination.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.destinations.create');
    }

    /**
     * Store a newly created Destination in storage.
     *
     * @param CreateDestinationRequest $request
     *
     * @return Response
     */
    public function store(CreateDestinationRequest $request)
    {
        $input = $request->all();

        $storage = Storage::disk('public');

        $link = $storage->put('destinations' ,$request->file('image'));

        $input['image'] = $storage->url($link);

        $destination = $this->destinationRepository->create($input);

        Flash::success('Destination saved successfully.');

        return redirect(route('destinations.index'));
    }

    /**
     * Display the specified Destination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $destination = $this->destinationRepository->findWithoutFail($id);

        if (empty($destination)) {
            Flash::error('Destination not found');

            return redirect(route('destinations.index'));
        }

        return view('admin.destinations.show')->with('destination', $destination);
    }

    /**
     * Show the form for editing the specified Destination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $destination = $this->destinationRepository->findWithoutFail($id);

        if (empty($destination)) {
            Flash::error('Destination not found');

            return redirect(route('destinations.index'));
        }

        return view('admin.destinations.edit')->with('destination', $destination);
    }

    /**
     * Update the specified Destination in storage.
     *
     * @param  int              $id
     * @param UpdateDestinationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestinationRequest $request)
    {
        $destination = $this->destinationRepository->findWithoutFail($id);

        if (empty($destination)) {
            Flash::error('Destination not found');

            return redirect(route('destinations.index'));
        }

        $input = $request->all();

        if($request->hasFile('image')) {
            $storage = Storage::disk('public');
            $link = $storage->put('destinations' ,$request->file('image'));
            $input['image'] = $storage->url($link);
        }

        $destination = $this->destinationRepository->update($input, $id);

        Flash::success('Destination updated successfully.');

        return redirect(route('destinations.index'));
    }

    /**
     * Remove the specified Destination from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $destination = $this->destinationRepository->findWithoutFail($id);

        if (empty($destination)) {
            Flash::error('Destination not found');

            return redirect(route('destinations.index'));
        }

        $this->destinationRepository->delete($id);

        Flash::success('Destination deleted successfully.');

        return redirect(route('destinations.index'));
    }
}
