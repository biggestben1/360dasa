<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollsurvey_responseRequest;
use App\Http\Requests\UpdatePollsurvey_responseRequest;
use App\Repositories\Pollsurvey_responseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Pollsurvey_responseController extends AppBaseController
{
    /** @var  Pollsurvey_responseRepository */
    private $pollsurveyResponseRepository;

    public function __construct(Pollsurvey_responseRepository $pollsurveyResponseRepo)
    {
        $this->pollsurveyResponseRepository = $pollsurveyResponseRepo;
    }

    /**
     * Display a listing of the Pollsurvey_response.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pollsurveyResponseRepository->pushCriteria(new RequestCriteria($request));
        $pollsurveyResponses = $this->pollsurveyResponseRepository->all();

        return view('pollsurvey_responses.index')
            ->with('pollsurveyResponses', $pollsurveyResponses);
    }

    /**
     * Show the form for creating a new Pollsurvey_response.
     *
     * @return Response
     */
    public function create()
    {
        return view('pollsurvey_responses.create');
    }

    /**
     * Store a newly created Pollsurvey_response in storage.
     *
     * @param CreatePollsurvey_responseRequest $request
     *
     * @return Response
     */
    public function store(CreatePollsurvey_responseRequest $request)
    {
        $input = $request->all();

        $pollsurveyResponse = $this->pollsurveyResponseRepository->create($input);

        Flash::success('Pollsurvey Response saved successfully.');

        return redirect(route('pollsurveyResponses.index'));
    }

    /**
     * Display the specified Pollsurvey_response.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pollsurveyResponse = $this->pollsurveyResponseRepository->findWithoutFail($id);

        if (empty($pollsurveyResponse)) {
            Flash::error('Pollsurvey Response not found');

            return redirect(route('pollsurveyResponses.index'));
        }

        return view('pollsurvey_responses.show')->with('pollsurveyResponse', $pollsurveyResponse);
    }

    /**
     * Show the form for editing the specified Pollsurvey_response.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pollsurveyResponse = $this->pollsurveyResponseRepository->findWithoutFail($id);

        if (empty($pollsurveyResponse)) {
            Flash::error('Pollsurvey Response not found');

            return redirect(route('pollsurveyResponses.index'));
        }

        return view('pollsurvey_responses.edit')->with('pollsurveyResponse', $pollsurveyResponse);
    }

    /**
     * Update the specified Pollsurvey_response in storage.
     *
     * @param  int              $id
     * @param UpdatePollsurvey_responseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePollsurvey_responseRequest $request)
    {
        $pollsurveyResponse = $this->pollsurveyResponseRepository->findWithoutFail($id);

        if (empty($pollsurveyResponse)) {
            Flash::error('Pollsurvey Response not found');

            return redirect(route('pollsurveyResponses.index'));
        }

        $pollsurveyResponse = $this->pollsurveyResponseRepository->update($request->all(), $id);

        Flash::success('Pollsurvey Response updated successfully.');

        return redirect(route('pollsurveyResponses.index'));
    }

    /**
     * Remove the specified Pollsurvey_response from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pollsurveyResponse = $this->pollsurveyResponseRepository->findWithoutFail($id);

        if (empty($pollsurveyResponse)) {
            Flash::error('Pollsurvey Response not found');

            return redirect(route('pollsurveyResponses.index'));
        }

        $this->pollsurveyResponseRepository->delete($id);

        Flash::success('Pollsurvey Response deleted successfully.');

        return redirect(route('pollsurveyResponses.index'));
    }
}
