<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

    public function emailConfig($input)
    {
        $this->setEnv('MAIL_HOST',$input['email_host']);
        $this->setEnv('MAIL_PORT',$input['email_port']);
        $this->setEnv('MAIL_USERNAME',$input['smtp_username']);
        $this->setEnv('MAIL_PASSWORD',$input['smtp_password']);
        $this->setEnv('MAIL_ENCRYPTION',$input['email_encryption']);
        $this->setEnv('MAIL_FROM_ADDRESS',$input['from_email']);
        $this->setEnv('MAIL_FROM_NAME',$input['from_name']);
    }

    public function create()
    {
        return view('admin.email.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email_host' => 'required',
            'email_port' => 'required|numeric',
            'email_encryption' => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
            'from_email' =>'required|email',
            'from_name' => 'required'
        ]);

        $data = new Email();
        $input = $request->all();
        $data->fill($input)->save();

        $this->emailConfig($input);

        return back()->with('success', 'Mail configaration update successfully.');
    }
}
