<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollquestionRequest;
use App\Http\Requests\UpdatePollquestionRequest;
use App\Repositories\PollquestionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Pollquestion;

class PollquestionController extends AppBaseController
{
    /** @var  PollquestionRepository */
    private $pollquestionRepository;

    public function __construct(PollquestionRepository $pollquestionRepo)
    {
        $this->middleware('auth');
        $this->pollquestionRepository = $pollquestionRepo;
    }

    /**
     * Display a listing of the Pollquestion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pollquestionRepository->pushCriteria(new RequestCriteria($request));
        $pollquestions = $this->pollquestionRepository->all();

        return view('pollquestions.index')
            ->with('pollquestions', $pollquestions);
    }

    public function see($request)
    {
        $pollquestions = Pollquestion::where('questionnaire_id', '=', $request)->orderBy('id','DESC')->paginate(20);
        //$this->pollquestionRepository->pushCriteria(new RequestCriteria($request));
        //$pollquestions = $this->pollquestionRepository->all();
        //$pollquestions['questionnaire_id'] = $request;
        return view('pollquestions.index')
            ->with('pollquestions', $pollquestions);
    }
    /**
     * Show the form for creating a new Pollquestion.
     *
     * @return Response
     */
    public function create()
    {
        return view('pollquestions.create');
    }

    /**
     * Store a newly created Pollquestion in storage.
     *
     * @param CreatePollquestionRequest $request
     *
     * @return Response
     */
    public function store(CreatePollquestionRequest $request)
    {
        $input = $request->all();


        //$pollquestion = $this->pollquestionRepository->create($input);

        Flash::success('Pollquestion saved successfully.');
        $questionnaire_id=$input['questionnaire_id'];
       // return redirect(route('pollquestions.index'));
        return redirect("seeallmyquestions/$questionnaire_id");
    }

    /**
     * Display the specified Pollquestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pollquestion = $this->pollquestionRepository->findWithoutFail($id);

        if (empty($pollquestion)) {
            Flash::error('Pollquestion not found');

            return redirect(route('pollquestions.index'));
        }

        return view('pollquestions.show')->with('pollquestion', $pollquestion);
    }

    public function add($id)
    {
        $pollquestion = $this->pollquestionRepository->findWithoutFail($id);

        if (empty($pollquestion)) {
            Flash::error('Pollquestion not found');

            return redirect(route('pollquestions.index'));
        }

        return view('pollquestions.create')->with('pollquestion', $pollquestion);
    }

    /**
     * Show the form for editing the specified Pollquestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pollquestion = $this->pollquestionRepository->findWithoutFail($id);

        if (empty($pollquestion)) {
            Flash::error('Pollquestion not found');

            return redirect(route('pollquestions.index'));
        }

        return view('pollquestions.edit')->with('pollquestion', $pollquestion);
    }

    /**
     * Update the specified Pollquestion in storage.
     *
     * @param  int              $id
     * @param UpdatePollquestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePollquestionRequest $request)
    {
        $pollquestion = $this->pollquestionRepository->findWithoutFail($id);

        if (empty($pollquestion)) {
            Flash::error('Pollquestion not found');

            return redirect(route('pollquestions.index'));
        }


        $pollquestion = $this->pollquestionRepository->update($request->all(), $id);

        Flash::success('Pollquestion updated successfully.');
        $questionnaire_id=$request['questionnaire_id'];

        return redirect("seeallmyquestions/$questionnaire_id");
        // return redirect(route('pollquestions.index'));
    }

    /**
     * Remove the specified Pollquestion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pollquestion = $this->pollquestionRepository->findWithoutFail($id);

        if (empty($pollquestion)) {
            Flash::error('Pollquestion not found');

            return redirect(route('pollquestions.index'));
        }

        $questionnaire_id= $pollquestion['questionnaire_id'];
        $this->pollquestionRepository->delete($id);

        Flash::success('Pollquestion deleted successfully.');
        return redirect("seeallmyquestions/$questionnaire_id");
        //return redirect(route('pollquestions.index'));
    }
}
