<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Repositories\AgendaRepository;
use App\Repositories\DestinationRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AgendaController extends AppBaseController
{
    /** @var  AgendaRepository */
    private $agendaRepository;

    public function __construct(AgendaRepository $agendaRepo)
    {
        $this->agendaRepository = $agendaRepo;
    }

    /**
     * Display a listing of the Agenda.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agendaRepository->pushCriteria(new RequestCriteria($request));
        $agendas = $this->agendaRepository->paginate(15);

        return view('admin.agendas.index')
            ->with('agendas', $agendas);
    }

    /**
     * Show the form for creating a new Agenda.
     *
     * @return Response
     */
    public function create(DestinationRepository $destRepo)
    {
        $destinations = $destRepo->all(['id', 'title'])->pluck('title', 'id');

        return view('admin.agendas.create', compact('destinations'));
    }

    /**
     * Store a newly created Agenda in storage.
     *
     * @param CreateAgendaRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendaRequest $request)
    {
        $input = $request->all();

        $agenda = $this->agendaRepository->create($input);

        Flash::success('Agenda saved successfully.');

        return redirect(route('agendas.index'));
    }

    /**
     * Display the specified Agenda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

            return redirect(route('agendas.index'));
        }

        return view('admin.agendas.show')->with('agenda', $agenda);
    }

    /**
     * Show the form for editing the specified Agenda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, DestinationRepository $destRepo)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

            return redirect(route('agendas.index'));
        }
        $destinations = $destRepo->all(['id', 'title'])->pluck('title', 'id');

        return view('admin.agendas.edit', compact('agenda', 'destinations'));
    }

    /**
     * Update the specified Agenda in storage.
     *
     * @param  int              $id
     * @param UpdateAgendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendaRequest $request)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

            return redirect(route('agendas.index'));
        }

        $agenda = $this->agendaRepository->update($request->all(), $id);

        Flash::success('Agenda updated successfully.');

        return redirect(route('agendas.index'));
    }

    /**
     * Remove the specified Agenda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

            return redirect(route('agendas.index'));
        }

        $this->agendaRepository->delete($id);

        Flash::success('Agenda deleted successfully.');

        return redirect(route('agendas.index'));
    }
}
