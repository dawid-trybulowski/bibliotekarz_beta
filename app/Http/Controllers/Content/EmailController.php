<?php


namespace App\Http\Controllers\Content;

use App\Http\Services\Content\EmailService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailController
{
    /**
     * @var EmailService
     */
    private $emailService;
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;

    public function __construct
    (
        EmailService $emailService,
        Config $configAll,
        ConfigService $configService
    )
    {

        $this->emailService = $emailService;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function sendFromContactForm(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'main_text' => 'required|string',
            'subject' => 'required|string'
        ]);
        $to = $request->email;
        $subject = $request->subject;
        $text = nl2br($request->main_text);

        $message = $this->emailService->sendEmail($this->config['contact_form_email']['email'], $to, $subject, $text, '/emails/' . $this->config['contact_form_email']['template']);

        return Redirect::back()->with('message', $message);
    }
}