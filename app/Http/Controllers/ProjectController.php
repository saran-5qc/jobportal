<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RegModel;
use App\Models\category_models;
use App\Models\JobTypesModel;
use App\Models\jobtableModel;
 use App\Models\resumeModels;
use App\Mail\OtpMail;
use App\Mail\RegisterConfirmation;
use App\Mail\RegisterMail;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
class ProjectController extends Controller
{
    public function front()
    {
        return view('frontpage');
    }

    public function jobses()
    {
        return view('jobs');
    }
    public function registration()
    {
        return view('registration');
    }
      public function login()
    {
        return view('login');
    }
     public function inserted(Request $r)
    {
        $validatedData = $r->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'date' => 'required',
            'phone' => 'required',
            'file' => 'required|max:2048',

        ]);
        $email = $r->post('email');
        if (RegModel::where('email', $email)->exists()) {
            return view('registration')->with('error', 'This email already exists');
        }
        if ($r->hasFile('file')) {
            $file = $r->file('file');
            $originalFilename = $file->getClientOriginalName();
            //adding file to public folder
            $file->move(public_path('uploads'), $originalFilename);

            $model = new RegModel();
            $avatar = $model->file = $originalFilename;
            $name = $r->post('first_name');
            $lastname = $r->post('last_name');
            $gender = $r->post('gender');
            $date = $r->post('date');
            $phone = $r->post('phone');
            $data = array('first_name' => $name, 'last_name' => $lastname, 'email' => $email, 'gender' => $gender, 'date_of_birth' => $date, 'phone' => $phone, 'file' => $avatar);
            RegModel::create($data);
            $recieveremail = $email;
            Mail::to($recieveremail)->send(new RegisterConfirmation());
            $user = DB::table('reg_models')->where('email', $email)->first();
            return view('loginforotp', ['registeredEmail' => $user->email]);


        }
    }
     public function generateOTP(Request $r){
        $validatedData=$r->validate([
            'email'=>'required|email',
        ]);
        $email = $r->input('email');
        $user = DB::table('reg_models')->where('email', $email)->first();
        if($user){
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Mail::to($email)->send(new OtpMail($otp)); 
        return view('enterotp', ['registeredEmail' => $user->email]);
        }
        return view('forgotpassword', ['error'=>'Put registered email address']);
    }
    public function verifyOtp(Request $r){
        $email = $r->input('email');
        $otp = $r->input('otp');
        $storedOTP = Session::get('otp',$otp);
        if ($otp == $storedOTP) {
            $user = DB::table('reg_models')->where('email', $email)->first();
            return view('verify',['registeredEmail' => $user->email]);
    } else { 
            return view('enterotp')->with(['error'=>'Invalid Otp.','registeredEmail' => $email]);
        }
    }
    public function passworded(Request $r){
    $r->validate([
        'new'=>'required',
        'confirm'=>'required',
    
    
    ]);
    $email= $r->input('email');
    $new=$r->post('new');
    $confirm=$r->post('confirm');
    if($new==$confirm){ 
    $data=array('password'=>$confirm);
    RegModel::where('email',$email)->update($data);
    return redirect('/'); 
    }else{
        return view('verify')->with(['error'=>'Password do not match.','registeredEmail' => $email]);
    }
    
 
} 
  public function loginvalid(Request $r) 
    {

        $email = $r->post('email');
        $password = $r->post('password');
        $login = DB::table('reg_models')->where('email', '=', $email)->first();
        if ($login && $login->password === $password) {
            $r->session()->put('user_id', $login->id);
             
            return redirect('/pro');
        }
        return view('login')->with(['error' => 'Invalid credentials.']);



    }
     public function viewProfile()
    {
        $id = session('user_id');
        $data = DB::table('reg_models')->where('id', $id)->get();
        return view('dashboard')->with('data', $data);
    }

    public function changePasswordPage(){
        return view('changePassword');
    }
    public function changePassword(Request $r){
        $ExistingPassword=$r->post('existingpassword');
        $newPassword=$r->post('newpassword');
        $confirmPassword=$r->post('confirmpassword');
        $id=session('user_id');
        $data=DB::table('reg_models')->where('id',$id)->first();
        $passwordExist = $data->password;
        if($ExistingPassword===$passwordExist){
            if($newPassword===$confirmPassword){ 
                $data=array('password'=>$confirmPassword);
                RegModel::where('id',$id)->update($data);
                session()->pull('user_id');
                return redirect('/');
            }
            return view('changePassword')->with(['error'=>'Password do not match.']);
           
        }
        return view('changePassword')->with(['emailerror'=>'Invalid credentials.']);
    
        
    
    }
     public function editProfile()
    {
        $id = session('user_id');
        $data = DB::table('reg_models')->where('id', $id)->get();
        return view('editPage')->with('data', $data);
    }
    public function updateProfile(Request $r)
    {
        $id = session('user_id');

        $modid = RegModel::find($id);
        if ($r->hasFile('file')) {
            $destination = 'uploads/' . $modid->file;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $r->file('file');
            $originalFilename = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $originalFilename);
        }
        
        $name = $r->post('first_name');
        $lname = $r->post('last_name');
        $email = $r->post('email');
        $gender = $r->post('gender');
        $date = $r->post('date');
        $phone = $r->post('phone');
        $modid = RegModel::find($id);

        $avatar = $modid->file = $originalFilename;
        $data = array('first_name' => $name, 'last_name' => $lname, 'email' => $email, 'gender' => $gender, 'date_of_birth' => $date, 'phone' => $phone, 'file' => $avatar);
        RegModel::where('id', $id)->update($data);
        return redirect('/');
    }
      public function forgotView(){
        return view('forgotpassword');
    }
    public function jobView()
    {
        $categories = category_models::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobtype = JobTypesModel::orderBy('name', 'ASC')->where('status', 1)->get();
        $id = session('user_id');
        $data = DB::table('reg_models')->where('id', $id)->get();
        return view('post-job', ['categories' => $categories, 'jobType' => $jobtype,'data'=>$data]);
    }
     public function postJob(Request $r)
    {
        $id = session('user_id');
        $data = DB::table('reg_models')->where('id', $id)->first();

        // Check if session is valid
        if (!$data) {
            return back()->with('error', 'User not found in session.');
        }

        $validatedData = $r->validate([
            'title' => 'required',
            'category' => 'required',
            'jobtype' => 'required',
            'vacancy' => 'required',
            'location' => 'required',
            'description' => 'required',
            'companyname' => 'required',
            'companylocation'=>'required'
        ]);

        $sessionid = $data->id;

       
        $title = $r->post('title');
        $category = $r->post('category');
        $job = $r->post('jobtype');
        $vacancy = $r->post('vacancy');
        $salary = $r->post('salary');
        $location = $r->post('location');
        $description = $r->post('description');
        $benefits = $r->post('benefits');
        $responsibility = $r->post('responsibility');
        $qualification = $r->post('qualification');
        $keywords = $r->post('keywords');
        $experience = $r->post('experience');
        $companyname = $r->post('companyname');
        $companylocation = $r->post('companylocation');
        $website = $r->post('website');

        $data = array(
            'title' => $title,
            'category_id' => $category,
            'job_type_id' => $job,
            'user_id' => $sessionid,
            'vacancy' => $vacancy,
            'Salary' => $salary,
            'location' => $location,
            'description' => $description,
            'benefits' => $benefits,
            'Responsibility' => $responsibility,
            'Qualification' => $qualification,
            'Keywords' => $keywords,
            'experience' => $experience,
            'company_name' => $companyname,
            'company_location' => $companylocation,
            'company_website' => $website
        );

        jobtableModel::create($data);
        return redirect('/showjobs');
    }

     public function changePass(){
          return view('changePassword');
     }

    public function changesPassword(Request $r){
        $ExistingPassword=$r->post('existingpassword');
        $newPassword=$r->post('newpassword');
        $confirmPassword=$r->post('confirmpassword');
        $id=session('user_id');
        $data=DB::table('reg_models')->where('id',$id)->first();
        $passwordExist = $data->password;
        if($ExistingPassword===$passwordExist){
            if($newPassword===$confirmPassword){ 
                $data=array('password'=>$confirmPassword);
                RegModel::where('id',$id)->update($data);
                session()->pull('user_id');
                return redirect('/');
            }
            return view('changePassword')->with(['error'=>'Password do not match.']);
           
        }
        return view('changePassword')->with(['emailerror'=>'Invalid credentials.']);
    
    }

    
     public function showJobs()
    {
        $id = session('user_id');
        $data = jobtableModel::with('jobType')->where('user_id', $id)->orderBy('created_at','DESC')->paginate(3);
        return view('showjobs', ['jobs' => $data]);
    }
     public function viewJobPage($id){
        $data = JobtableModel::with(['JobType', 'Category'])->findOrFail($id);
        $res = array_filter(array_map('trim', explode(',', $data->responsibility)));
        $Qua = array_filter(array_map('trim', explode(',', $data->qualification)));
        $applications=resumeModels ::where('jobtable_models_id',$data->id)->with('User')->get();

        $benefits=explode(",",$data->benefits);
        $id=session('user_id');
        
      
        return view('viewPage',['data'=>$data,'resPo'=>$res,'qua'=>$Qua,'bene'=>$benefits,'applicants'=>$applications]);
    }
     public function editJob($id)
    {
        $data = DB::table('jobtable_models')->where('id', $id)->first();
        $categories = category_models::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobtype = JobTypesModel::orderBy('name', 'ASC')->where('status', 1)->get();

        return view('editJob', [
            'categories' => $categories,
            'jobType' => $jobtype,
            'data' => $data // Not datas
        ]);
        
    }
    public function updateJobs(Request $r, $id)
    {
        
        $user_id=session('user_id');
       
      
       
        
        // Validate required fields
        $validatedData = $r->validate([
            'title' => 'required',
            'category' => 'required',
            'jobtype' => 'required',
            'vacancy' => 'required',
            'location' => 'required',
            'description' => 'required',
            'companyname' => 'required',
        ]);
        
        // Update job data
        $title=$r->input('title');
        $category_id=$r->input('category');
        $job_type_id=$r->input('jobtype');
        $userid=$user_id;
        $vacancy=$r->input('vacancy');
        $salary=$r->input('salary');
        $location=$r->input('location');
        $description=$r->input('description');
        $benefits=$r->input('benefits');
        $responsibility=$r->input('responsibility');
        $qualification=$r->input('qualification');
        $keywords=$r->input('keywords');
        $experience=$r->input('experience');
        $companyname=$r->input('companyname');
        $companylocation=$r->input('companylocation');
        $website=$r->input('website');

        $data = array(
            'title' => $title,
            'category_id' => $category_id,
            'job_type_id' => $job_type_id,
            'user_id' => $userid,
            'vacancy' => $vacancy,
            'salary' => $salary,
            'location' => $location,
            'description' => $description,
            'benefits' => $benefits,
            'responsibility' => $responsibility,
            'qualification' => $qualification,
            'keywords' => $keywords,
            'experience' => $experience,
            'company_name' => $companyname,
            'company_location' => $companylocation,
            'company_website' => $website
        );

        
        jobtableModel::where('id', $id)->update($data);
        
        return redirect('/showjobs');
        
    }
      public function delete($id){
        $data = DB::table('jobtable_models')->where('id', $id)->delete();
        return redirect('/showjobs');
    }

    public function applyJob(Request $r)
{
    try {

        $id = $r->input('id');
        $userId = session('user_id');

        $job = jobtableModel::find($id);

        if (!$job) {
            return response()->json([
                'status' => false,
                'message' => 'Job does not exist'
            ]);
        }
         $employer_id=$job->user_id;
        if($employer_id==$userId ){
            $message='You cannot apply on your own job.';
            // session()->flash('error',value: $message);
            return response()->json([
                'status'=>false,
                'message'=>$message

            ]);
        }
        $existingJob=resumeModels::where(['user_id'=>$userId,'jobtable_models_id'=>$id])->exists();
       
        if($existingJob){
            $message='You already applied this job.';
            // session()->flash('error',$message);
            return response()->json([
                'status'=>false,
                'message'=>$message

            ]);
        }
        
       

        return response()->json([
            'status' => true,
            'redirect' => route('resume', ['id' => $id])
        ]);

    } catch (\Exception $e) {

        // TEMP — sends real error to browser
        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

    public function resumePage($id)
{
    $userId = session('user_id');
    $userregistration = RegModel::find($userId);
     $data = JobtableModel::with(['JobType', 'Category'])->findOrFail($id);
    return view('resume', ['userregistration'=>$userregistration,'data'=>$data]);
}
public function applyforjob(Request $r){

    if ($r->hasFile('file')) {
            $file = $r->file('file');
            $originalFilename = $file->getClientOriginalName();
            //adding file to public folder
            $file->move(public_path('uploads'), $originalFilename);

        $id=$r->input('id');
        $job=jobtableModel::where('id',$id)->first();
        $employer_id=$job->user_id;
        $userid=session('user_id'); 
        $model=new resumeModels();
        $model->jobtable_models_id=$r->input('id');
        $model->user_id=$userid;
        $model->registration_models_id=$employer_id;
        $model->name=$r->input('name');
        $model->phone=$r->input('phone');
        $model->email=$r->input('email');
        $model->Summary=$r->input('summary',255);
        $model->qualification=$r->input('qualifications');
        $model->skills=$r->input('skills');
        $model->projects=$r->input('projects');
        $model->Fathers_name=$r->input('fathername');
        $model->Passport=$r->input('passport');
        $model->date_of_birth=$r->input('date');
        $model->language_known=$r->input('language');
        $model->hobbies=$r->input('hobbies');
        $model-> address=$r->input('address');
        $model->image=$originalFilename;
        $model->applied_date=now();
        $model->save();
        $employer=RegModel::where('id',$employer_id)->first();
        $usersid=RegModel::where('id',$userid)->first();
       
        $mailable=['employer'=>$employer,'user'=>$usersid,'job'=>$job];

        Mail::to($employer->email)->send(new RegisterMail($mailable));


      return redirect('/showjo');
}
}
  public function editResume($id)
    {
        $data = DB::table('resume_models')->where('id', $id)->first();
      
        return view('editresume', [
            
            'data' => $data // Not datas
        ]);
        
    }
   public function updateResume(Request $r)
{
    $id = $r->input('id');

    $resume = resumeModels::find($id);
    if (!$resume) {
        return redirect('/')->with('error', 'Resume not found');
    }

    $avatar = $resume->image; 

    
    if ($r->hasFile('file')) {
        $destination = public_path('uploads/' . $resume->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $file = $r->file('file');
        $originalFilename = $file->getClientOriginalName(); 
        $file->move(public_path('uploads'), $originalFilename);
        $avatar = $originalFilename;
    }

    
    $data = [
        'name' => $r->input('name'), 
        'phone' => $r->input('phone'), 
        'email' => $r->input('email'),
        'Summary' => $r->input('summary'),
        'date_of_birth' => $r->input('date'),
        'qualification' => $r->input('qualifications'),
        'skills' => $r->input('skills'),
        'projects' => $r->input('projects'),
        'Fathers_name' => $r->input('fathername'),
        'Passport' => $r->input('passport'),
        'language_known' => $r->input('language'),
        'date_of_birth' => $r->input('date'),
        'language_known' => $r->input('language'),
        'hobbies' => $r->input('hobbies'),
        'address' => $r->input('address'),
        'qualification' => $r->input('qualifications'),
         'image' => $avatar
      

      
       
       
    ];

    resumeModels::where('id', $id)->update($data);

    return redirect('/showjo')->with('success', 'Resume updated successfully');
}

   public function showsjobs() {
        $id=session('user_id');
        $data=resumeModels::with(['JobTable'])->where('user_id',$id)->get();
        return view('myjobsapplication')->with('data',$data);
      }
        public function deleteappliedjob($id){
        $data = DB::table('resume_models')->where('id', $id)->delete();
        return redirect('/showjo');
    }
       public function showresumePage($id){
        $data = jobtableModel::findOrFail($id);
      
        $userid=session('user_id');

        $applications=resumeModels::where('jobtable_models_id',$data->id)->with('User')->first();
        $edu=explode(",",$applications->qualification);
        $exp=explode(",",$applications->projects);
        $skills=explode(",",$applications->skills);
        $hob=explode(",",$applications->hobbies);
        $benefits=explode(",",$applications->language_known);
        return view('resumepage',['data'=>$data,'edu'=>$edu,'exp'=>$exp,'skill'=>$skills,'hob'=>$hob,'bene'=>$benefits,'applicants'=>$applications ]);
    }
     public function search(Request $r)
{
    $category = category_models::where('status',1)->get();
    $JobType  = JobTypesModel::where('status',1)->get();

    $jobs = jobtableModel::where('status',1);

    // Keyword search (title + keywords)
    if($r->filled('keywords')){
        $jobs->
             where('title','like','%'.$r->keywords.'%')
              ->orWhere('keywords','like','%'.$r->keywords.'%')
              ->orWhere('description','like','%'.$r->keywords.'%');
       
    }

    // Location filter
    if($r->filled('location')){
        $jobs->where('location','like','%'.$r->location.'%');
    }

    // Category filter
    if($r->filled('category')){
        $jobs->where('category_id',$r->category);
    }

    // Job type (checkbox — supports multiple)
    if($r->filled('job_type')){
        $jobs->whereIn('job_type_id', (array)$r->job_type);
    }

    // Experience filter
    if($r->filled('experience')){
        $jobs->where('experience','>=',$r->experience);
    }
     if($r->filled('search')){
        $jobs->
             where('title','like','%'.$r->search.'%')
              ->orWhere('keywords','like','%'.$r->search.'%')
              ->orWhere('description','like','%'.$r->search.'%');
       
    }
    $jobs = $jobs->with(['JobType','Category'])
                 ->orderBy('created_at','DESC')
                 ->paginate(9)
                 ->appends($r->all());

    return view('jobs',[
        'categories' => $category,
        'JobType'    => $JobType,
        'job'        => $jobs
    ]);
}


public function showJobview(){
        $categories=category_models::where('status',1)->orderBy('name','ASC')->take(8)->get();
        $featuredJob=jobtableModel::where('is_featured',1)->with('JobType')->take(6)->get();
        $latestJob=jobtableModel::where('status',1)->orderBy('created_at','DESC')->take(6)->get();
       
         return view('frontpage',['categories'=>$categories,'featuredJobs'=>$featuredJob,'latestJobs'=>$latestJob]);
     }
     
    public function logout(Request $r)
    {
        $r->session()->flush();
        return redirect('/');

    }
    
}
