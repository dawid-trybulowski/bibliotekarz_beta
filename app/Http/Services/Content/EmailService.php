<?php


namespace App\Http\Services\Content;


use App\Http\Helpers\Message;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use http\Exception;
use Illuminate\Support\Facades\Mail;


class EmailService
{
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;

    private $config;

    public function __construct
    (
        Config $configAll,
        ConfigService $configService
    )
    {
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function sendEmail($to, $from, $subject, $text, $template, $additional = null)
    {
        $data =
            [
                'to' => $to,
                'from' => $from,
                'subject' => $subject,
                'text' => $text,
                'additonal' => $additional,
                'template' => $template,
                'libraryName' => $this->config['library_name'],
                'logoUrl' => '/img/logo.png',
                'additional' => $additional
            ];

        try {
            Mail::send($template, ['data' => $data], function ($message) use ($data) {
                $message->sender($data['from']);
                $message->to($data['to'], $data['from'])->subject($data['subject']);
            });
            $message = new Message(__('view.W porządku!'), __('view.Wiadomość wysłana'), 200, true);
        } catch (Exception $e) {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas wysyłania wiadomości'), 409, false);
        }
        return $message;
    }
}