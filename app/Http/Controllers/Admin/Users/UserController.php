<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{

    public function index()
    {
        if(Auth::user()->user_role != 1){
            return '404,Unauthorized User';
        }

        $users = User::where('user_role',2)->orderBy('id','DESC')->get();
            foreach($users as $user){
                $deposit = Deposit::where('user_id',$user->id)->sum('amount');
                $user->total_deposit = $deposit ;
            }
        return view('admin.users.index',compact('users'));
    }
    //LOAD CREATE VIEW//
    public function create()
    {
        if(Auth::user()->user_role != 1){
            return '404,Unauthorized User';
        }
        return view('admin.users.create');
    }
    //CREATE PROCESS START HERE//
    public function create_process(Request $request)
    {
        $checkEmail=User::where('email',$request->email)->first();
        if(!empty($checkEmail)) return 'email';
        $user= new User ;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email  = $request->email;
        $user->phone = $request->phone;
        $user->image = $request->hasFile('image') ?  $request->file('image')->store('UserProfile') :'';
        $user->password = $request->password;
        $user->real_password = $request->password;
        $user->id_card_number = $request->cnic_number;
        $user->sponcer_by = $request->sponcer_by;
        $user->save();
        $right_code = random_int(10000, 99999).$user->id;
        $left_code = $user->id.random_int(10000, 99999);

        $signup_code = random_int(100000, 999999).$user->id;
        $data["code"] = $signup_code;
        User::where('id',$user->id)->update(['left_code' => $left_code,'right_code' => $right_code,'remember_token' => $signup_code]);
        $data["title"] = 'SignUp Verification Code';
        $email = $request->email;
            //   Mail::send('emails.signup-mail', $data, function($message)use($data,$email) {
            //      $message->to($email) ->subject($data["title"]);
            // });
         $headers = "From:info@partnership4x.com\r\n";
            $headers .= "Reply-To:info@partnership4x.com\r\n";
           // $headers .= "CC: susan@example.com\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $message = '<html><body>';
            $message .= '<script>const links = document.querySelectorAll(".copy-click");
const cls = {
  copied: "is-copied",
  hover: "is-hovered"
}

const copyToClipboard = str => {
  const el = document.createElement("input");
  str.dataset.copyString ? el.value = str.dataset.copyString : el.value = str.text;
  el.setAttribute("readonly", "");
  el.style.position = "absolute";
  el.style.opacity = 0;
  document.body.appendChild(el);
  el.select();
  document.execCommand("copy");
  document.body.removeChild(el);
}

const clickInteraction = (e) => {
  e.preventDefault();
  copyToClipboard(e.target);
  e.target.classList.add(cls.copied);
  setTimeout(() => e.target.classList.remove(cls.copied), 1000);
  setTimeout(() => e.target.classList.remove(cls.hover), 700);  
}

Array.from(links).forEach(link => {
  link.addEventListener("click", e => clickInteraction(e));
  link.addEventListener("keypress", e => {
    if (e.keyCode === 13) clickInteraction(e);
  });
  link.addEventListener("mouseover", e => e.target.classList.add(cls.hover));
  link.addEventListener("mouseleave", e => {
    if (!e.target.classList.contains(cls.copied)) {
     e.target.classList.remove(cls.hover); 
    }
  });
});
</script><div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin: 0px auto 50px 0;width: 70%;padding: 25px;border: 10px solid #fcae1c;border-bottom: none;">
    <div style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #FBAE1C;text-decoration:none;font-weight:600">Partnership4x Traders!</a>
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p>Thank you for choosing Partnership4x Traderd!. Use the following OTP to complete your Sign Up procedures. OTP is valid for 30 minutes</p>
    <h2 style="background: #000000;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;.copy-click {
  position: relative;
  padding-bottom: 2px;
  text-decoration: none;
  cursor: copy;
  color: #484848;
  border-bottom: 1px dashed #767676;
  transition: background-color calc(var(--duration) * 2) var(--ease);
}
.copy-click:after {
  content: attr(data-tooltip-text);
  position: absolute;
  bottom: calc(100% + 6px);
  left: 50%;
  padding: 8px 16px;
  white-space: nowrap;
  background-color: white;
  border-radius: 4px;
  box-shadow: 0 0 0 -12px rgba(0, 0, 0, 0);
  pointer-events: none;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  opacity: 0;
  transform: translate(-50%, 12px);
  transition: box-shadow calc(var(--duration) / 1.5) var(--bounce), opacity calc(var(--duration) / 1.5) var(--bounce), transform calc(var(--duration) / 1.5) var(--bounce);
}
.copy-click.is-hovered:after {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  opacity: 1;
  transform: translate(-50%, 0);
  transition-timing-function: var(--ease);
}
.copy-click.is-copied {
  background-color: yellow;
}
.copy-click.is-copied:after {
  content: attr(data-tooltip-text-copied);
}" class="copy-click" data-tooltip-text="Click to copy" data-tooltip-text-copied="✔ Copied to clipboard">'.$signup_code.'</h2>
    <p style="font-size:0.9em;">Note: if You found this email not related to you just ignore it.</p>
    <p style="font-size:0.9em;">Regards,<br />Partnership4x Traderd!</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>Partnership4x Traderd! Inc</p>
      <p>1600 Amphitheatre Parkway</p>
      <p>California</p>
    </div>
  </div>
</div>';
$message .= '</body></html>';
//$headers = "From: info@partnership4x.com " . "\r\n" . "CC: support@partnership4x.com";
            mail($email, $data["title"], $message,$headers);

          //  mail($email, $data["title"], $signup_code);
        return 'true';
    }
     //LOAD EDIT VIEW//
     public function edit($id)
     {
        if(Auth::user()->user_role != 1){
            $user = User::where('id', $id)->first();
            return view('admin.users.edit',compact('user'));
        }
        $user = User::where('id', $id)->first();
         return view('admin.users.edit',compact('user'));
     }
     //update Process start here//
     public function update(Request $request)
     {
         //CHECK DUPLICATE EMAIL And USER ROLES//
         $checkResource = User::where('user_role',2)->get();
         //checking for duplicates Values
         foreach ($checkResource as $pro)
          {
            // for duplidate email
             if ($request->email == $pro->email){
                if ($request->id != $pro->id) {
                    return 'email';
                }
              }
            }
        $user = User::where('id', $request->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email  = $request->email;
        $user->phone = $request->phone;
        $user->image = $request->hasFile('image') ?  $request->file('image')->store('UserProfile') : $user->image;
        $user->password = $request->password;
        $user->real_password = $request->password;
        $user->id_card_number = $request->cnic_number;
        $user->sponcer_by = $request->sponcer_by;
        $user->save();
        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = User::where('id', $request->id)->first();

        if ($ctype->is_active == 1) {
            User::where('id', $request->id)->update(['is_active' => 0]);
        } else {
            User::where('id', $request->id)->update(['is_active' => 1]);
        }

        echo $ctype->is_active;
    }
    //TODO: DELETE User
    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
    }
}
