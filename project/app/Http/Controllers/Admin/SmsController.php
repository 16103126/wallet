<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Sms;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    public function create()
    {
        return view('admin.sms.create');
    }

    private function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

    public function smsConfig($input)
    {
        $this->setEnv('NEXMO_KEY', $input['sms_key']);
        $this->setEnv('NEXMO_SECRET', $input['sms_secret']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sms_key' => 'required',
            'sms_secret' => 'required',
            'from_sms' => 'required',
            'to_sms' => 'required'
        ]);

        $input = $request->all();

        $data = new Sms();
        $data->fill($input)->save();

        $this->smsConfig($input);

        return back()->with('success', 'Data save successfylly.');
    }

    public function sendSms()
    {
  
        // try {

        // $sms = Sms::first();

        //     $receiverNumber = $sms->to_sms;
        //     $message = "This is testing message";
  
        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");
  
        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($receiverNumber, [
        //         'from' => $twilio_number, 
        //         'body' => $message]);
  
        //     dd('SMS Sent Successfully.');
  
        // } catch (Exception $e) {
        //     dd("Error: ". $e->getMessage());
        // }





        try {

            $sms = Sms::first();
            $basic  = new \Nexmo\Client\Credentials\Basic($sms->sms_key, $sms->sms_secret);
            $client = new \Nexmo\Client($basic);
  
            $receiverNumber = $sms->to_sms;
            $message = "This is first message";
            
            $client->sms()->send(
                new \Vonage\SMS\Message\SMS($receiverNumber, $sms->from_sms, $message)
            );
  
            echo 'SMS Sent Successfully.';
              
        } catch (Exception $e) {
            
            echo "Error: ". $e->getMessage();
        }
    }

    
}
