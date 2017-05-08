<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\LatestCriteria;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Repositories\DestinationRepository;
use App\Repositories\ParticipantRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ParticipantController extends AppBaseController
{
    /** @var  ParticipantRepository */
    private $participantRepository;

    public function __construct(ParticipantRepository $participantRepo)
    {
        $this->participantRepository = $participantRepo;
    }

    /**
     * Display a listing of the Participant.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->participantRepository->pushCriteria(new RequestCriteria($request))
                                    ->pushCriteria(LatestCriteria::class);
        $participants = $this->participantRepository->paginate(15);

        return view('admin.participants.index')
            ->with('participants', $participants);
    }

    /**
     * Show the form for creating a new Participant.
     *
     * @return Response
     */
    public function create(DestinationRepository $destRepo)
    {

        $destinations = $destRepo->all(['id', 'title'])->pluck('title', 'id');

        return view('admin.participants.create', compact('destinations'));
    }

    /**
     * Store a newly created Participant in storage.
     *
     * @param CreateParticipantRequest $request
     *
     * @return Response
     */
    public function store(CreateParticipantRequest $request)
    {
        $input = $request->all();

        $participant = $this->participantRepository->create($input);

        Flash::success('Participant saved successfully.');

        return redirect(route('participants.index'));
    }

    /**
     * Display the specified Participant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('participants.index'));
        }

        return view('admin.participants.show')->with('participant', $participant);
    }

    /**
     * Show the form for editing the specified Participant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, DestinationRepository $destRepo)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('participants.index'));
        }

        $destinations = $destRepo->all(['id', 'title'])->pluck('title', 'id');

        return view('admin.participants.edit', compact('participant', 'destinations'));
    }

    /**
     * Update the specified Participant in storage.
     *
     * @param  int              $id
     * @param UpdateParticipantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParticipantRequest $request)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('participants.index'));
        }

        $participant = $this->participantRepository->update($request->all(), $id);

        Flash::success('Participant updated successfully.');

        return redirect(route('participants.index'));
    }

    /**
     * Remove the specified Participant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('participants.index'));
        }

        $this->participantRepository->delete($id);

        Flash::success('Participant deleted successfully.');

        return redirect(route('participants.index'));
    }
}
