<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollsurveyRequest;
use App\Http\Requests\UpdatePollsurveyRequest;
use App\Repositories\PollsurveyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Questionnaire;
use App\User;

class PollsurveyController extends AppBaseController
{
    /** @var  PollsurveyRepository */
    private $pollsurveyRepository;

    public function __construct(PollsurveyRepository $pollsurveyRepo)
    {
        $this->pollsurveyRepository = $pollsurveyRepo;
    }

    /**
     * Display a listing of the Pollsurvey.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pollsurveyRepository->pushCriteria(new RequestCriteria($request));
        $pollsurveys = $this->pollsurveyRepository->all();

        return view('pollsurveys.index')
            ->with('pollsurveys', $pollsurveys);
    }

    /**
     * Show the form for creating a new Pollsurvey.
     *
     * @return Response
     */
    public function create()
    {
        return view('pollsurveys.create');
    }

    /**
     * Store a newly created Pollsurvey in storage.
     *
     * @param CreatePollsurveyRequest $request
     *
     * @return Response
     */
    public function store(Questionnaire $questionnaire, Request $request)
    {
        //$input = $request->all();

        //$pollsurvey = $this->pollsurveyRepository->create($input);

        $data = $this->validate(
            $request, [
            'responses.*.pollanswer_id' => 'required',
            'responses.*.pollquestion_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

       // dd($request);

        $survey = $questionnaire->pollsurveys()->create($request['survey']);
        $survey->pollresponses()->createMany($request['responses']);

        Flash::success('Survey saved successfully.');
        return redirect("takepoll/$questionnaire->id".'-'.$questionnaire->title);
      //  return redirect(route('pollsurveys.index'));
    }

    /**
     * Display the specified Pollsurvey.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pollsurvey = $this->pollsurveyRepository->findWithoutFail($id);

        if (empty($pollsurvey)) {
            Flash::error('Pollsurvey not found');

            return redirect(route('pollsurveys.index'));
        }

        return view('pollsurveys.show')->with('pollsurvey', $pollsurvey);
    }

    public function see(Questionnaire $questionnaire, $slug){

//dd($questionnaire);
        $questionnaire->load('pollquestions.pollanswers');
        return view('pollsurveys.show', compact('questionnaire'));
    }


    /**
     * Show the form for editing the specified Pollsurvey.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pollsurvey = $this->pollsurveyRepository->findWithoutFail($id);

        if (empty($pollsurvey)) {
            Flash::error('Pollsurvey not found');

            return redirect(route('pollsurveys.index'));
        }

        return view('pollsurveys.edit')->with('pollsurvey', $pollsurvey);
    }

    /**
     * Update the specified Pollsurvey in storage.
     *
     * @param  int              $id
     * @param UpdatePollsurveyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePollsurveyRequest $request)
    {
        $pollsurvey = $this->pollsurveyRepository->findWithoutFail($id);

        if (empty($pollsurvey)) {
            Flash::error('Pollsurvey not found');

            return redirect(route('pollsurveys.index'));
        }

        $pollsurvey = $this->pollsurveyRepository->update($request->all(), $id);

        Flash::success('Pollsurvey updated successfully.');

        return redirect(route('pollsurveys.index'));
    }

    /**
     * Remove the specified Pollsurvey from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pollsurvey = $this->pollsurveyRepository->findWithoutFail($id);

        if (empty($pollsurvey)) {
            Flash::error('Pollsurvey not found');

            return redirect(route('pollsurveys.index'));
        }

        $this->pollsurveyRepository->delete($id);

        Flash::success('Pollsurvey deleted successfully.');

        return redirect(route('pollsurveys.index'));
    }
}
