<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // public function create($id)
    // {
    //     $id = User::find($id);
    //     return view('contact.formContact', compact('id'));
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'testconfirmemail@example.com';
        $subject = 'This is a demo!';
        $name = 'Jane Test';

        $headerData = [
            'category' => 'category',
            'unique_args' => [
                'variable_1' => 'abc'
            ]
        ];

        $header = $this->asString($headerData);

        $this->withSwiftMessage(function ($message) use ($header) {
            $message->getHeaders()
                    ->addTextHeader('X-SMTPAPI', $header);
        });

        return $this->view('emails.contactEmail')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $this->data['message'] ]);
    }

    private function asJSON($data)
    {
        $json = json_encode($data);
        $json = preg_replace('/(["\]}])([,:])(["\[{])/', '$1$2 $3', $json);
        return $json;
    }


    private function asString($data)
    {
        $json = $this->asJSON($data);
        return wordwrap($json, 76, "\n   ");
    }
}
