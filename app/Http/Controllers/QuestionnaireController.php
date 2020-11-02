<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Repositories\QuestionnaireRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use Illuminate\Support\Str;
use App\Models\Questionnaire;
use App\Models\User;


class QuestionnaireController extends AppBaseController
{
    
    /** @var  QuestionnaireRepository */
    private $questionnaireRepository;

    public function __construct(QuestionnaireRepository $questionnaireRepo)
    {
        $this->middleware('auth');
        $this->questionnaireRepository = $questionnaireRepo;
    }

    /**
     * Display a listing of the Questionnaire.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $id=Auth::user()->id;
        $this->questionnaireRepository->pushCriteria(new RequestCriteria($request));
        $questionnaires = $this->questionnaireRepository->all();
        $questionnaires = Questionnaire::where('user_id', '=', $id)->orderBy('id','DESC')->paginate(20);

        return view('questionnaires.index')
            ->with('questionnaires', $questionnaires);
    }

    /**
     * Show the form for creating a new Questionnaire.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created Questionnaire in storage.
     *
     * @param CreateQuestionnaireRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnaireRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $questionnaire = $this->questionnaireRepository->create($input);

        Flash::success('Questionnaire saved successfully.');

        return redirect(route('questionnaires.index'));
    }

    /**
     * Display the specified Questionnaire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user_id =Auth::user()->id;
        $questionnaire = $this->questionnaireRepository->findWithoutFail($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }
        if ($questionnaire->user_id !== $user_id) {
            Flash::error('This Poll is not Yours');
        
            return redirect(route('questionnaires.index'));
        }
       

        return view('questionnaires.show')->with('questionnaire', $questionnaire);
    }

    /**
     * Show the form for editing the specified Questionnaire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user_id =Auth::user()->id;
       // ->where('user_id', '=', $id);
        $questionnaire = $this->questionnaireRepository->findWithoutFail($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

       // echo $user_id;
//echo $questionnaire->user_id;
if ($questionnaire->user_id !== $user_id) {
    Flash::error('This Poll is not Yours');

    return redirect(route('questionnaires.index'));
}

      
        return view('questionnaires.edit')->with('questionnaire', $questionnaire);
    }

    /**
     * Update the specified Questionnaire in storage.
     *
     * @param  int              $id
     * @param UpdateQuestionnaireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnaireRequest $request)
    {
        $questionnaire = $this->questionnaireRepository->findWithoutFail($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

        $questionnaire = $this->questionnaireRepository->update($request->all(), $id);

        Flash::success('Questionnaire updated successfully.');

        return redirect(route('questionnaires.index'));
    }

    /**
     * Remove the specified Questionnaire from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnaire = $this->questionnaireRepository->findWithoutFail($id);

        if (empty($questionnaire)) {
            Flash::error('Questionnaire not found');

            return redirect(route('questionnaires.index'));
        }

        $this->questionnaireRepository->delete($id);

        Flash::success('Questionnaire deleted successfully.');

        return redirect(route('questionnaires.index'));
    }

    public function storequestion(Questionnaire $questionnaire, Request $request)
    {

       // dd(request()->all());
       $data =   $this->validate(
        $request, [
            'question.question' => 'required',
            'answers.*.answer' => 'required',

        ]
    );
       
       // dd($request['question']);
        $question = $questionnaire->pollquestions()->create($request['question']);
        $question->pollanswers()->createMany($request['answers']);
        
        Flash::success('Questions saved successfully.');
        return redirect('/questionnaires/'.$questionnaire->id);
        // return view('question.create', compact('questionnaire'));
    }

    public function result(Questionnaire $questionnaire){
        $questionnaire->load('pollquestions.pollanswers.pollresponses');
        //dd($questionnaire);
        return view('questionnaires.result', compact('questionnaire'));
    }

}
