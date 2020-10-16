<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Answerobjectives;
use App\Questtions;
use App\Answer;
use App\Objective;
use \Crypt;
use Mail;
use App\Survey;
use Illuminate\Mail\Mailable;
use App\Mail\MyMail;
use App\User;
class QuestController extends Controller
{
    //

    public function survey($id)
    {
        //header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $id=base64_decode($id);
        $topics = Objective::find($id);
        // var_dump($topics);
        //echo $topics->topics;
        $users = DB::select('select * from regions  ORDER BY country ASC');
        return view('survey')->with( ['topics'=> $topics,'users' => $users]);;
    }



    public function scoresurvey($id)
    {
        //header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $id=base64_decode($id);
        $topics = Objective::find($id);
        // var_dump($topics);
        //echo $topics->topics;
        $users = DB::select('select * from regions  ORDER BY country ASC');
        return view('scoresurvey')->with( ['topics'=> $topics,'users' => $users]);;
    }
    public function loadquest($topic_id)
    {
//echo $topic_id;
        $Questtions = Questtions::where('topic_id', '=', $topic_id)->get();
        echo $Questtions[0]->description;
        // return view('addtopics');

//The demo string is below. Normally, you would just grab the saved json string from your database and echo it out here.
        // echo '[{"type":"text","label":"Name","req":1},{"type":"date","label":"Name","req":1},{"type":"month","label":"Name","req":1},{"type":"textarea","label":"Describe yourself in 3rd person","req":0},{"type":"select","label":"Are you a...","req":1,"choices":[{"label":"","sel":1},{"label":"Early Riser","sel":0},{"label":"Night Owl","sel":0},{"label":"I Don\'t Sleep","sel":0}]},{"type":"radio","label":"Favorite gaming platform:","req":1,"choices":[{"label":"PC","sel":0},{"label":"XBOX","sel":0},{"label":"PlayStation","sel":0},{"label":"Wii","sel":0}]},{"type":"checkbox","label":"What do you do for fun? Check all that apply:","req":0,"choices":[{"label":"Hiking","sel":0},{"label":"Running","sel":0},{"label":"Gym","sel":0},{"label":"Movies","sel":0},{"label":"Music","sel":0}]},{"type":"agree","label":"I agree that I\'ve been somewhat truthful. Maybe.","req":0}]';
    }

    public function solution(Request $request)
    {



        $arr=$request->all();
        $arr=json_encode($arr);
        $user= Answer::create([

            'sulution' =>$arr,
            'topic_id' => $request['topic_id']


        ]);

    }

    public function surveyadd(Request $request)
    {

        $this->validate(
            $request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'country' => 'required|string|max:255',

            'phonenumber' => 'required|numeric|numeric'


        ]);

        $question = $request['question'];
        $obja = $request['obja'];
        $objb = $request['objb'];
        $objc = $request['objc'];
        $objd = $request['objd'];
        $aobj = $request['aobj'];

        $bobj = $request['bobj'];
        $cobj = $request['cobj'];
        $dobj = $request['dobj'];
        $appsDetails = $request['appsDetails'];
        //$b[]='0,0,0,0,0';
           $arr=json_encode($appsDetails);
           $m=json_encode($question);
        $count =0;
        $count2 =0;
        $json_a = json_decode($arr, true);
        $num= count(json_decode($m));

        foreach ($json_a as $person_name => $person_a)
        {
            $k=0;
            for($i=0; $i<count($num); $i++) {
                //$i=0;
                 $count = $count + 1;
                 $q = "q$count";
                 $anw=$person_a[$q];
                if($anw=='a'){
                    $gbaobj=$aobj[$count2];
                    $aaobj=$gbaobj+1;
                    $aobj[$count2]=$aaobj;
                    //echo $aobj[$count2];
                   // echo $count2;
                    //echo "<br>";
                }
                //dd($aobj);
                //exit;
                if($anw=='b'){
                    $baobj=$bobj[$count2];
                    $baobj=$baobj+1;
                    $bobj[$count2]=$baobj;
                    //echo $bobj[$count2];
                    //echo $count2;
                    //echo "<br>";
                }

                if($anw=='c'){
                    $caobj=$cobj[$count2];
                    $caobj=$caobj+1;
                    $cobj[$count2]=$caobj;
                    //echo $cobj[$count2];
                    //echo $count2;
                    //echo "<br>";
                }

                if($anw=='d'){
                    $daobj=$dobj[$count2];
                    $daobj=$daobj+1;
                    $dobj[$count2]=$daobj;
                    //echo $dobj[$count2];
                    //echo $count2;
                    //echo "<br>";
                }

               // echo "<br>";
                //echo $aobj[$i];
                $count2 = $count2 + 1;
            }

        }



        $a[] = array('question' => $question, 'obja' => $obja, 'objb' => $objb, 'objc' => $objc, 'objd' => $objd,
            'aobj' =>$aobj,'bobj' => $bobj,'cobj' => $cobj,'dobj' => $dobj );

        $b[] = array('question' => $question, 'ans' => $appsDetails);
//exit;
        // }
        //$arr=$request->all();
         $arrb=json_encode($a);
         $arrtt=json_encode($b);
        //exit;
        $id = $request['id'];
         $value = Crypt::decrypt($id);

        $arr=$request->all();
        $arr=json_encode($arr);
        $userb= Answerobjectives::create([

            'name' =>$request['name'],
            'phonenumber' =>$request['phonenumber'],
            'country' =>$request['country'],
            'email' =>$request['email'],
            'description' =>$arrtt,
            'objective_id' => $value


        ]);

        $users = DB::select("select * from objectives where id ='$value'");
        foreach ($users as $user){
            $total= $user->total;
        }
$total= $total+1;
        $User = Objective::find($value);

        $User->description =$arrb;
        $User->total = $total;
        $User->save();


        return back()->with('success',' successfully');


    }

    public function getmore()
    {
       $num= rand(1, 1000000);
        ?>
        <script src="http://the360surveys.com/public/js/jquery-1.6.3.min.js"></script>
        <script src="http://the360surveys.com/public/js/jquery.multiFieldExtender-2.0.js"></script>
        <script type="text/javascript">

        //<![CDATA[
        var jQuery_1_6_3 = $.noConflict(true);
        jQuery_1_6_3(document).ready(function() {

            jQuery_1_6_3("#itemDetails<?php echo $num;?>").EnableMultiField();


        });

        //]]>

    </script>  <div class="form-group wrapper bg-light dk m">

                    <p>
                    <div class="form-group"> Question
                        <input type="text" name="question[]" class="form-control" placeholder="Enter Question Here" value=""> </div>
                    <fieldset id="itemDetails<?php echo $num;?>">
                    <div class="form-group">Option
    <input type="hidden" name="obja[]"  value="0">
    <input type="hidden" name="objgroup[]"  value="<?php echo $num;?>">
                        <input type="text" name="obj[]" class="form-control" Required  placeholder="Enter Option" value="">
                    </div>

                    </fieldset>

                    <!-- <div class="form-group">Select  Answer
    <label class="checkbox-inline i-checks">
                             <input type="radio" name="obj[]" id="inlineCheckbox1" value="a"><i></i> A </label>

                         <label class="checkbox-inline i-checks">
                             <input type="radio" name="obj[]" id="inlineCheckbox2" value="b"><i></i> B </label>

                         <label class="checkbox-inline i-checks"> <input type="radio" name="obj[]" id="inlineCheckbox3" value="c"><i></i> C </label>

                         <label class="checkbox-inline i-checks"> <input type="radio" name="obj[]" id="inlineCheckbox4" value="d">
                             <i></i> D </label>

                     </div>-->



                    </p>



</div>
<?php
    }
    public function surveytest($id)
    {
        //header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        //$id= Request::segment(2);
//echo $id;

        //var_dump($user->topics);
        $id=base64_decode($id);
        $topics = Objective::find($id);
        // var_dump($topics);
        //echo $topics->topics;
        $users = DB::select('select * from regions  ORDER BY country ASC');
        return view('surveytest')->with( ['topics'=> $topics,'users' => $users]);;
    }

    public function surveyaddtest(Request $request)
    {

        $this->validate(
            $request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'country' => 'required|string|max:255',

            'phonenumber' => 'required|numeric|numeric'


        ]);

        $question = $request['question'];
        $obja = $request['obja'];
        $objb = $request['objb'];
        $objc = $request['objc'];
        $objd = $request['objd'];
        $aobj = $request['aobj'];

        $bobj = $request['bobj'];
        $cobj = $request['cobj'];
        $dobj = $request['dobj'];
        $appsDetails = $request['appsDetails'];
        //$b[]='0,0,0,0,0';
        $arr=json_encode($appsDetails);
        $m=json_encode($question);
        $count =0;
        $count2 =0;
        $json_a = json_decode($arr, true);
        $num= count(json_decode($m));

        foreach ($json_a as $person_name => $person_a)
        {
            $k=0;
            for($i=0; $i<count($num); $i++) {
                //$i=0;
                $count = $count + 1;
                $q = "q$count";
                $anw=$person_a[$q];
                if($anw=='a'){
                    $gbaobj=$aobj[$count2];
                    $aaobj=$gbaobj+1;
                    $aobj[$count2]=$aaobj;
                    //echo $aobj[$count2];
                    // echo $count2;
                    //echo "<br>";
                }
                //dd($aobj);
                //exit;
                if($anw=='b'){
                    $baobj=$bobj[$count2];
                    $baobj=$baobj+1;
                    $bobj[$count2]=$baobj;
                    //echo $bobj[$count2];
                    //echo $count2;
                    //echo "<br>";
                }

                if($anw=='c'){
                    $caobj=$cobj[$count2];
                    $caobj=$caobj+1;
                    $cobj[$count2]=$caobj;
                    //echo $cobj[$count2];
                    //echo $count2;
                    //echo "<br>";
                }

                if($anw=='d'){
                    $daobj=$dobj[$count2];
                    $daobj=$daobj+1;
                    $dobj[$count2]=$daobj;
                    //echo $dobj[$count2];
                    //echo $count2;
                    //echo "<br>";
                }

                // echo "<br>";
                //echo $aobj[$i];
                $count2 = $count2 + 1;
            }

        }



        $a[] = array('question' => $question, 'obja' => $obja, 'objb' => $objb, 'objc' => $objc, 'objd' => $objd,
            'aobj' =>$aobj,'bobj' => $bobj,'cobj' => $cobj,'dobj' => $dobj );

        $b[] = array('question' => $question, 'ans' => $appsDetails);
//exit;
        // }
        //$arr=$request->all();
        $arrb=json_encode($a);
        $arrtt=json_encode($b);
        //exit;
        $id = $request['id'];
        $value = Crypt::decrypt($id);

        $arr=$request->all();
        $arr=json_encode($arr);
        $userb= Answerobjectives::create([

            'name' =>$request['name'],
            'phonenumber' =>$request['phonenumber'],
            'country' =>$request['country'],
            'email' =>$request['email'],
            'description' =>$arrtt,
            'objective_id' => $value


        ]);

        $users = DB::select("select * from objectives where id ='$value'");
        foreach ($users as $user){
            $total= $user->total;
        }
        $total= $total+1;
        $User = Objective::find($value);

        $User->description =$arrb;
        $User->total = $total;
        $User->save();


        return back()->with('success',' successfully');


    }
    public function send()
   {
       //$title = $request->input('title');
       //$content = $request->input('content');
       //Grab uploaded file
       //$attach = $request->file('file');
       $id='1';
       $user = User::find($id);
   \Mail::to($user)->send(new MyMail($user));
   }

   public function about()
   {
       return view('about');
   }

   public function view_survey(Survey $survey)
   {
     $survey->option_name = unserialize($survey->option_name);
     return view('survey.view', compact('survey'));
   }

}
