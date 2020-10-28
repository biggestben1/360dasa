<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
//use Request;

use App\Topic;
use App\User;
use App\Questtions;
use App\Question;
use App\Answer;
use App\Objective;
use App\Answerobjectives;
use App\Contactedb;
use App\Dbcontact;
use App\Survey;
use App\Mail\MyMail;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $posts = Survey::where('user_id', '=', $id)->orderBy('id','DESC')->paginate(20);
        ;
       // echo dd($posts);
        return view('home') ->with('posts', $posts);;
    }
    public function getzipcode()
    {
        echo '1';
       //echo $lastName  = Input::get('id') ;
        //echo $request->id;
        exit;
        $states = DB::table("regions")
            ->where("id",$request->id);
        foreach ($states as $user){
            echo $user->phone_prefix;
        }
        //return response()->json($states);
    }
    public function topics()
    {
        return view('addtopics');
    }
    public function topic(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(
            $request, [
                'topic' => 'required'

            ]
        );

        $user= Topic::create([
            'topics' => $request['topic'],
            'total' => '0',
            'user_id' => Auth::user()->id
        ]);

        $insertedId = $user->id;

         $insertedId ;
        return redirect()->route('addquest',  ['id' => $insertedId]);




    }

    public function addquest($id)
    {
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $topics = Topic::find($id);
       // var_dump($topics);
       //echo $topics->topics;

        return view('addquest')->with('topics', $topics);;
    }


    public function survey($id)
    {
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $topics = Topic::find($id);
       // var_dump($topics);
       //echo $topics->topics;

        return view('survey')->with('topics', $topics);;
    }


    public function editsurvey($id)
    {
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $topics = Topic::find($id);
       // var_dump($topics);
       //echo $topics->topics;

        return view('editquest')->with('topics', $topics);;
    }

    public function viewsurvey($id)
    {
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $teams= Answerobjectives::where('objectives_id', '=', $id)->paginate(20);
       // var_dump($topics);
       //echo $topics->topics;
//echo count($topics);
        $topic = Topic::find($id);

        return view('all_users')->with('teams', $teams);;
    }


    public function viewasurvey($id)
    {
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $teams= Answerobjectives::where('id', '=', $id)->paginate(20);
       // var_dump($topics);
       //echo $topics->topics;
//echo count($topics);
        $topic = Topic::find($id);

        return view('viewusers')->with('teams', $teams);;
    }
    public function viewsolutions($id)
    {

        $teams = Answer::find($id);

        return view('sucessful')->with('teams', $teams);;
    }






    public function addquested(Request $request)
    {
        $form_data = json_decode(file_get_contents('php://input'));
        $form_data = json_decode(file_get_contents('php://input'));

        foreach ($form_data as $key => $value) {
            $field[$value->name] = $value->value;
        }

//here's the formID
        $formID = $field['formID'];

//and here's the form fields (converted back into json)
        $formFields = json_encode($field['formFields']);
         $formIDw = $field['formID'];
//now just save it to your database.
        //echo $form_data['type'];
        echo json_encode('If this was not a demo, your form would have saved successfully!');
    }

    public function addquestestions(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(
            $request, [
                'description' => 'required',
                'topic_id' => 'required',

            ]
        );

        $user= Questtions::create([
            'description' => $request['description'],
            'topic_id' => $request['topic_id'],
            'user_id' => Auth::user()->id
        ]);

        //$insertedId = $user->id;

        //$insertedId ;
        //return redirect()->route('addquest',  ['id' => $insertedId]);
        return view('successfull');
}
    public function editquestestions(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(
            $request, [
                'description' => 'required',
                'topic_id' => 'required',

            ]
        );



       $topic_id= $request['topic_id'];

        $Questtions = Questtions::where('topic_id', $topic_id)->first();

        $Questtions->description = $request['description'];
        $Questtions->save();
        //$insertedId = $user->id;

        //$insertedId ;
        //return redirect()->route('addquest',  ['id' => $insertedId]);
        return view('successfull');
}
    public function profile()
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        $country = DB::select('select * from regions  ORDER BY country ASC');
        return view('auth.profile', ['country' => $country])->with('user', $user);
        // This will send the $region variable to the view
    }

    public function objective()
    {

        return view('objetive');
        // This will send the $region variable to the view
    }

    public function deletesurvay($id)
    {
        ///$id=Auth::user()->id;
        //echo $id;
        $user = Objective::find($id);
        $user->Answerobjectives()->delete();
        $user->delete();

        //$country = DB::select('select * from regions  ORDER BY country ASC');
       // return view('auth.profile', ['country' => $country])->with('user', $user);
        // This will send the $region variable to the view
        return redirect('home');

    }

    public function updateprofile(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(
            $request, [
                'title' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'country' => 'required|string|max:255',

            'phonenumber' => 'required|numeric|numeric'


        ]);



        $id=Auth::user()->id;

        $User = User::find($id);
        $User->id = auth()->id();
        $User->title = $request->title;
        $User->firstname = $request->firstname;
        $User->last_name = $request->last_name;
        $User->gender = $request->gender;
        $User->country = $request->country;
        $User->phone_number = $request->phonenumber;
        $User->save();
return back()->with('success','Profile successfully Updated');

    }
    public function fileUpload(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $id=Auth::user()->id;
            $imageName = $id . '.' .
                $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/pics/', $imageName
            );


            //return back()->with('success','Image Upload successful');

            $id=Auth::user()->id;

            $User = User::find($id);
            $User->id = auth()->id();
            $User->pics = $imageName;

            $User->save();
            return back()->with('success','Image Upload successfully');
        }
    }



    public function addojective(Request $request)
    {
        //dd($request);
        //exit;

            $question = $request['question'];
            $obja = $request['obja'];
            $objb = $request['objb'];
            $objc = $request['objc'];
            $objd = $request['objd'];
            $aobj = $request['aobj'];
            $bobj = $request['bobj'];
            $cobj = $request['cobj'];
            $dobj = $request['dobj'];
            //$b[]='0,0,0,0,0';
      // echo  $arr=json_encode($b);
//exit;
            $a[] = array('question' => $question, 'obja' => $obja, 'objb' => $objb, 'objc' => $objc, 'objd' => $objd,
                'aobj' => $aobj,'bobj' => $bobj,'cobj' => $cobj,'dobj' => $dobj );
//exit;
       // }
        //$arr=$request->all();
        $arr=json_encode($a);

        $id=Auth::user()->id;

        $Objective = Objective::create([

            'description' =>$arr,
            'topic' => $request['title'],
            'user_id' => $id,
            'total'=>'0'


        ]);
        return back()->with('success',' successfully');


    }


    public function contact(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(

            $request, [
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required',
            'dbid' => 'required',
            'country' => 'required|string|max:255',

            'phone_number' => 'required|numeric|numeric'


        ]);

//echo $request['phonenumber'];
//exit;

        $id=Auth::user()->id;
        $Objective = Contactedb::create([


            'title' => $request['title'],
            'firstname' => $request['first_name'],
            'last_name' => $request['last_name'],

            'country' => $request['country'],
            'address' => $request['address'],
            'phonenumber' => $request['phone_number'],
            'email' => $request['email'],
            'dbid' => $request['dbid'],
            'user_id' => $id


        ]);


        return back()->with('success',' Successful');
    }
    public function adddata($id)
    {

        //$id=Auth::user()->id;
        $teams= Dbcontact::where('user_id', '=', $id);
        // var_dump($topics);
        //echo $topics->topics;
//echo count($topics);
        //$topic = Topic::find($id);

        //return view('viewnewdb')->with('teams', $teams);;
        return view('adddata')->with('teams', $teams);
    }


    public function uploudexce()
    {
        return view('uploadexcel');
    }

    public function viewdb($id)
    {
        $userid=Auth::user()->id;
        $teams= Contactedb::where('user_id', '=', $userid)
            ->where('dbid', $id)
            ->paginate(20);
        // var_dump($topics);
        //echo $topics->topics;
//echo count($topics);
        $topic = Topic::find($id);

        return view('viewdb')->with('teams', $teams);;
    }

    public function importExcel($dbid)
    {
        $id=Auth::user()->id;
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
$insert[] = ['title' => $value->title, 'firstname' => $value->firstname,'last_name' => $value->lastname,'country' => $value->country,'address' => $value->address,'phonenumber' => $value->phonenumber,'email' => $value->email,'user_id' => $id,'dbid' => $dbid];
                }
                if(!empty($insert)){
                    DB::table('contactedbs')->insert($insert);
                    return back()->with('success',' successfull');
                }
            }
        }
        return back();
    }


    public function downloadExcel($dbid)
    {
        $id=Auth::user()->id;
        $dbid;
        $data = Contactedb::where('user_id', '=', $id)
            ->where('dbid', '=', $dbid)->get()->toArray();
        return Excel::create('360dasa', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('csv');
    }

    public function objective2()
    {

        return view('objetive2');
        // This will send the $region variable to the view
    }
    public function addojectivetest(Request $request)
    {
        //dd($request);
        //exit;

        $question = $request['question'];
        $obja = $request['obja'];
        $obj = $request['obj'];
        $objgroup = $request['objgroup'];

        //$b[]='0,0,0,0,0';
        // echo  $arr=json_encode($b);
//exit;
        $a[] = array('question' => $question, 'obja' => $obja, 'obj' => $obj, 'objgroup' => $objgroup );
//exit;
        // }
        //$arr=$request->all();
        $arr=json_encode($a);

        $id=Auth::user()->id;

        $Objective = Objective::create([

            'description' =>$arr,
            'topic' => $request['title'],
            'user_id' => $id,
            'total'=>'0'


        ]);
        return back()->with('success',' successfully');


    }

    public function edithdb($id)
   {
      // $id=Auth::user()->id;
       $user = Contactedb::find($id);
       //$country = DB::select('select * from regions  ORDER BY country ASC');
       //return view('auth.profile')->with('user', $user);
       return view('edithdb')->with('user', $user);
   }

   public function updatecontact(Request $request)
   {
       //dd($request);
       //exit;

       $this->validate(

           $request, [
           'title' => 'required|string|max:255',
           'first_name' => 'required|string|max:255',
           'last_name' => 'required|string|max:255',
           'address' => 'required',
           'country' => 'required|string|max:255',

           'phone_number' => 'required|numeric|numeric'


       ]);

//echo $request['phonenumber'];
//exit;

      // $id=Auth::user()->id;
       /*$Objective = Contactedb::create([


           'title' => $request['title'],
           'firstname' => $request['first_name'],
           'last_name' => $request['last_name'],

           'country' => $request['country'],
           'address' => $request['address'],
           'phonenumber' => $request['phone_number'],
           'email' => $request['email'],
           'user_id' => $id


       ]);
*/
        $id=$request->id;


       $User = Contactedb::find($id);

       $User->title = $request->title;
       $User->firstname = $request->first_name;
       $User->last_name = $request->last_name;

       $User->email = $request->email;
       $User->address = $request->address;
       $User->country = $request->country;
       $User-> phonenumber = $request->phone_number;
       $User->save();

       return back()->with('success',' Successful');




   }

   public function deletecontact($id)
    {
        ///$id=Auth::user()->id;
        //echo $id;
        $user = Contactedb::find($id);
        //$user->Answerobjectives()->delete();
        $user->delete();

        //$country = DB::select('select * from regions  ORDER BY country ASC');
        // return view('auth.profile', ['country' => $country])->with('user', $user);
        // This will send the $region variable to the view
        return redirect('viewdb');

    }

    # Show page to create new survey
    public function addcontactdb()
    {
        return view('addnewdb');
    }
    public function addnewdb(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(
            $request, [
                'title' => 'required',
                'description' => 'required'

            ]
        );

        $user= Dbcontact::create([
            'title' => $request['title'],
            'content' => $request['description'],
            'user_id' => Auth::user()->id
        ]);

        //$insertedId = $user->id;

        //$insertedId ;
        return back()->with('success',' Successful');




    }

    public function viewnewdb()
    {
        $id=Auth::user()->id;
        $teams= Dbcontact::where('user_id', '=', $id)->paginate(20);
        // var_dump($topics);
        //echo $topics->topics;
//echo count($topics);
        $topic = Topic::find($id);

        return view('viewnewdb')->with('teams', $teams);;
    }

    public function edithnewdb($id)
    {
        // $id=Auth::user()->id;
        $user = Dbcontact::find($id);
        //$country = DB::select('select * from regions  ORDER BY country ASC');
        //return view('auth.profile')->with('user', $user);
        return view('editnewdb')->with('user', $user);
    }

    public function updatedbcontact(Request $request)
    {
        //dd($request);
        //exit;

        $this->validate(

            $request, [
            'title' => 'required',
            'description' => 'required',
            'id' => 'required'



        ]);


        echo $id=$request->id;

//echo $request->description;
        $User = Dbcontact::find($id);

        $User->title = $request->title;
        $User->content = $request->description;
        $User->save();

        return back()->with('success',' Successful');




    }
    public function deletedbcontact($id)
    {
        ///$id=Auth::user()->id;
        //echo $id;
        $user = Dbcontact::find($id);
        //$user->Answerobjectives()->delete();
        $user->delete();

        //$country = DB::select('select * from regions  ORDER BY country ASC');
        // return view('auth.profile', ['country' => $country])->with('user', $user);
        // This will send the $region variable to the view
        return redirect('viewnewdb');

    }
    public function deleteq($id)
    {
        ///$id=Auth::user()->id;
        //echo $id;
        $user = Question::where('id', '=', $id)->delete();
        //$user->Answerobjectives()->delete();

return redirect()->back();
        //$country = DB::select('select * from regions  ORDER BY country ASC');
        // return view('auth.profile', ['country' => $country])->with('user', $user);
        // This will send the $region variable to the view
      //  return redirect('viewnewdb');

    }

    public function sendtoall($id)
    {
        $user = Survey::find($id);
        $user_id=Auth::user()->id;
        $teams= Dbcontact::where('user_id', '=', $user_id)->paginate(20);
        // dd($teams);
        //echo $topics->topics;
//echo count($topics);

        return view('sendtoall')->with('user', $user)
            ->with('teams', $teams);
        // This will send the $region variable to the view
    }


    public function testmail(Request $request)
    {
        //dd($request);
        //exit;
        $this->validate(
            $request, [
                'check' => 'required'
                //'description' => 'required'

            ]
        );
       $check= $request['check'];
         $dbid= $request['dbid'];
      // echo count($check);
      // echo $check[0];
        foreach($check as $quan) {

            $quan;
            $users = DB::select("select * from contactedbs where dbid ='$quan'");
            foreach ($users as $user){
                 $cid=$user->id;
                //$bb='1';
                $survey = Survey::find($dbid);
              // \Mail::to($email)->send(new MyMail);
                $contactedb = Contactedb::find($cid);
                $user_id=Auth::user()->id;
                $user = User::find($user_id);
                \Mail::to($contactedb)->send(new MyMail($contactedb,$survey,$user));
            }

        }

        //$insertedId = $user->id;

        //$insertedId ;
        return back()->with('success','Message Successfully sent');




    }
    public function poll()
    {

        $questionnaires =auth()->user()->questionnaires;
        return view('poll.home', compact('questionnaires'));
    }

}
