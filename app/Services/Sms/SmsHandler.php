<?php
namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;

class SmsHandler
{
    public function send($to, $message)
    {
        $apiKey = config('services.sms.api_key'); // Retrieve API key from .env
        $senderId = config('services.sms.sender_id'); // Retrieve sender ID from .env
        
        $url = "https://api.sparrowsms.com/v2/sms/"; // Replace with your SMS API endpoint

         $args = http_build_query(array(
            'token' => 'v2_a5XZw9x0WlAb27BaZBwcmYpmJYo.3Ogo',
            'from' => 'TheAlert',
            'to' => $to,
            'text' => $message,
        ));
    
        $url = "http://api.sparrowsms.com/v2/sms/";
    
        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }
}
