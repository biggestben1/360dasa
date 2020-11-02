<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePollanswerRequest;
use App\Http\Requests\UpdatePollanswerRequest;
use App\Repositories\PollanswerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Pollanswer;

class PollanswerController extends AppBaseController
{
    /** @var  PollanswerRepository */
    private $pollanswerRepository;

    public function __construct(PollanswerRepository $pollanswerRepo)
    {
        $this->middleware('auth');
        $this->pollanswerRepository = $pollanswerRepo;
    }

    /**
     * Display a listing of the Pollanswer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pollanswerRepository->pushCriteria(new RequestCriteria($request));
        $pollanswers = $this->pollanswerRepository->all();

        return view('pollanswers.index')
            ->with('pollanswers', $pollanswers);
    }


    public function see($request)
    {
       // $pollanswers = Pollanswer::where('pollquestion_id', '=', $request);

        $pollanswers = Pollanswer::where('pollquestion_id', '=', $request)->orderBy('id','DESC')->paginate(20);
       // dd($pollanswers);
        // $this->pollanswerRepository->pushCriteria(new RequestCriteria($request));
        //$pollanswers = $this->pollanswerRepository->all();

        return view('pollanswers.index')
            ->with('pollanswers', $pollanswers);
    }

    /**
     * Show the form for creating a new Pollanswer.
     *
     * @return Response
     */
    public function create()
    {
        return view('pollanswers.create');
    }

    /**
     * Store a newly created Pollanswer in storage.
     *
     * @param CreatePollanswerRequest $request
     *
     * @return Response
     */
    public function store(CreatePollanswerRequest $request)
    {
        $input = $request->all();

        $pollanswer = $this->pollanswerRepository->create($input);

        Flash::success('Choice saved successfully.');

      //  return redirect(route('pollanswers.index'));
        $questionnaire_id=$input['pollquestion_id'];
        return redirect("mychoice/$questionnaire_id");
    }

    /**
     * Display the specified Pollanswer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pollanswer = $this->pollanswerRepository->findWithoutFail($id);

        if (empty($pollanswer)) {
            Flash::error('Pollanswer not found');

            return redirect(route('pollanswers.index'));
        }

        return view('pollanswers.show')->with('pollanswer', $pollanswer);
    }

    public function addanswer($id)
    {
        $pollanswer = $this->pollanswerRepository->findWithoutFail($id);
//dd($pollanswer);
        if (empty($pollanswer)) {
            Flash::error('Pollanswer not found');

            return redirect(route('pollanswers.index'));
        }

        return view('pollanswers.create')->with('pollanswer', $pollanswer);
    }

    /**
     * Show the form for editing the specified Pollanswer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pollanswer = $this->pollanswerRepository->findWithoutFail($id);

        if (empty($pollanswer)) {
            Flash::error('Pollanswer not found');

            return redirect(route('pollanswers.index'));
        }

        return view('pollanswers.edit')->with('pollanswer', $pollanswer);
    }

    /**
     * Update the specified Pollanswer in storage.
     *
     * @param  int              $id
     * @param UpdatePollanswerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePollanswerRequest $request)
    {
        $pollanswer = $this->pollanswerRepository->findWithoutFail($id);

        if (empty($pollanswer)) {
            Flash::error('Pollanswer not found');

            return redirect(route('pollanswers.index'));
        }

        $pollanswer = $this->pollanswerRepository->update($request->all(), $id);

        Flash::success('Pollanswer updated successfully.');
        $questionnaire_id=$request['pollquestion_id'];

        //return redirect(route('pollanswers.index'));
        return redirect("mychoice/$questionnaire_id");
    }

    /**
     * Remove the specified Pollanswer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pollanswer = $this->pollanswerRepository->findWithoutFail($id);

        if (empty($pollanswer)) {
            Flash::error('Pollanswer not found');

            return redirect(route('pollanswers.index'));
        }
        $questionnaire_id=  $pollanswer['pollquestion_id'];
        $this->pollanswerRepository->delete($id);

        Flash::success('Pollanswer deleted successfully.');

        //return redirect(route('pollanswers.index'));
        return redirect("mychoice/$questionnaire_id");
    }
}
