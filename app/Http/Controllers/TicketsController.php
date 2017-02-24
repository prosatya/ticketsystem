<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Category;
use App\Ticket;
use App\Developer;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
		public function __construct()
		{
		    $this->middleware('auth');
		}
		public function index()
		{
		    $tickets = Ticket::paginate(10);
		    $categories = Category::all();

		    return view('tickets.index', compact('tickets', 'categories'));
		}

/** AJ DONE **/
   public function create()
		{
		    $categories = Category::all();

		    return $categories;
		    //return view('tickets.create', compact('categories'));
		}

/** AJ DONE **/
		public function store(Request $request, AppMailer $mailer)
		{		
				$cat = $request->input('category');
				$catid = $cat['id'];
		    
		    $this->validate($request, [
		            'title'     => 'required',
		            'category'  => 'required',
		            'priority'  => 'required',
		            'message'   => 'required'
		        ]);

		        $ticket = new Ticket([
		            'title'     => $request->input('title'),
		            'user_id'   => Auth::user()->id,
		            'ticket_id' => strtoupper(str_random(10)),
		            'category_id'  => $catid,
		            'priority'  => $request->input('priority'),
		            'message'   => $request->input('message'),
		            'status'    => "Open",
		        ]);

		        $ticket->save();

		        $mailer->sendTicketInformation(Auth::user(), $ticket);

		        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
		}

		public function userTickets()
		{
		    $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
		    $categories = Category::all();

		    return view('tickets.user_tickets', compact('tickets', 'categories'));
		}

/** AJ DONE **/
		public function isadmin()
		{
      $isadmin = Auth::user()->is_admin;
      return $isadmin;
		}	

		public function isdeveloper()
		{
      $isdeveloper = Auth::user()->is_developer;
      return $isdeveloper;
		}	

		public function userid()
		{
      $userid = Auth::user()->id;
      return $userid;
		}		

/** AJ DONE **/
		public function userTickets2(Request $request)
    {		
        if (Auth::user()->is_admin){
            $input = $request->all();
		        if($request->get('search')){
		            $tickets = Ticket::where("title", "LIKE", "%{$request->get('search')}%")->orderBy('id','DESC')->paginate(25);    
		        }else{
				  			$tickets = Ticket::orderBy('id','DESC')->paginate(25);
		        }
		        //return response($tickets);   
        }elseif(Auth::user()->is_developer){
						$input = $request->all();
		        if($request->get('search')){
		            $tickets = Ticket::where("title", "LIKE", "%{$request->get('search')}%")->where('developer_id', Auth::user()->id)->orderBy('id','DESC')->paginate(25);    
		        }else{
				  			$tickets = Ticket::where('developer_id', Auth::user()->id)->orderBy('id','DESC')->paginate(25);
		        }
	        //return response($tickets);
        }else{
		  		//$tickets = Ticket::where('user_id', Auth::user()->id);    
        	//$input = $request->all();
	        if($request->get('search')){
	            $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(25);    
	        }else{
			  			$tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(25);
	        }
	        //return response($tickets);
	      }  

        return response($tickets);
        //return compact($tickets);

    }

/** AJ DONE **/
		public function show($ticket_id)
		{
		    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

		    $comments = $ticket->comments;
		    foreach ($comments as $commen){
		      $uid = $commen->user_id;
		    	$commentuser = User::all();
		    }	

		    $category = $ticket->category;

		    return compact('ticket', 'category', 'comments', 'commentuser');

		    //return view('tickets.show', compact('ticket', 'category', 'comments'));
		}

/** AJ DONE **/
		public function close($ticket_id, AppMailer $mailer)
		{
		    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

		    $ticket->status = 'Closed';

		    $ticket->save();

		    $ticketOwner = $ticket->user;

		    $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

		    return redirect()->back()->with("status", "The ticket has been closed.");
		}

/** AJ DONE **/
		public function reopen($ticket_id, AppMailer $mailer)
		{
		    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

		    $ticket->status = 'Open';

		    $ticket->save();

		    $ticketOwner = $ticket->user;

		    $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

		    return redirect()->back()->with("status", "The ticket has been Re-opened.");
		}

    // public function devcreate(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    protected function devstore(Request $request){

    	if (Auth::user()->is_admin){
				// $v = $this->validate($request, [
			 //  	 'name' => 'required|max:255',
			 //  	 'email' => 'required|email|max:255|unique:users',
				// 	 'password' => 'required|min:6'  
		  //   ]);

		  //   if ($v->fails()){
				//  	return $v->errors();
				//   //return redirect()->back()->withErrors($v->errors());
				// }

		    $statistics = array(
					'name' => $request->get('name'),
					'email' => $request->get('email'),
					'password' => bcrypt($request->get('password')),
					'is_developer' => 1
		   	);
				User::create($statistics);
				$msg = "Developer added successfully.";
				return $msg;
			}

		}

    protected function devlist(){
    	//if (Auth::user()->is_admin){
				$devuers = User::all(); //User::where('is_developer', '=','1');
				//print_r($devuers);
				foreach ($devuers as $devuser) {
					//echo $tst['name'];
					$devuser['is_developer'];
					if($devuser['is_developer'] == '1'){
						$usdev[] = $devuser;
					}
				}
				//echo $devuers->is_developer;
	    	return $usdev;
	   // }
    }

  protected function deletedev($id){  
   	if (Auth::user()->is_admin){
	    $devdlt = User::find($id);
			$devdlt->delete();
			// $updateticket = Ticket::where('developer_id', $id);
			// $updateticket->developer_id = '0';
      // $updateticket->save();
			$msg = "Developer removed successfully.";
			return $msg;
		}
	}	

	protected function devassignedto(Request $request ){  
		$ticket_id = $request->get('ticket_id');
		$assigned_id = $request->get('assigned_id');
   	if (Auth::user()->is_admin){
			$updateticket = Ticket::where('ticket_id', $ticket_id)->first();
			$updateticket->developer_id = $assigned_id;
      $updateticket->save();

			if (is_null($updateticket)) {
			    return $msg = "Developer not assigned to [".$ticket_id."] Ticket successfully.";
			}else{
				$msg = "Developer assigned to [ ".$ticket_id." ] Ticket successfully.";
				return $msg;
			}
		}
	}

	// protected function devassigneddetails(Request $request ){  

	// 	$assigned_id = $request->get('assigned_id');
	// 	$developer = User::where('id', $assigned_id)->firstOrFail();
	// 	return $developer;

	// }		

	// protected function devassigneddetails2($id){  

	// 	//$assigned_id = $id; //$request->get('assigned_id');
	// 	$developer = User::where('id', $id)->firstOrFail();
	// 	return $developer;

	// }	


		
}

