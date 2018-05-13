<?php

namespace App\Http\Controllers\Auth;

use App\Http\Helpers\Message;
use App\Http\Services\Content\EmailService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

trait RegistersUsers
{
    protected $config;

    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('auth.register', compact('compact'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $configModel = new Config();
        $configAll = $configModel->all();
        $configService = new ConfigService($configModel);
        $this->config = $configService->prepareConfigs($configAll);

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        $to = $user->email;
        $subject = $this->config['registration_email']['subject'];
        $text = nl2br($this->config['registration_email']['text']);
        $template = $this->config['registration_email']['template'];
        $additional =
            [
                'topText' =>  'Witaj ' . $user->login . '!',
                'signature' => $this->config['library_name']
            ];

        $emailService = new EmailService(new Config(), new ConfigService(new Config()));
        $emailService->sendEmail($to, $this->config['registration_email']['email'], $subject, $text, '/emails/' . $template, $additional);

        $message = new Message('Dziękujemy za rejestrację', 'Dziękujemy za rejestrację w naszej bibliotece. W najbliższym czasie powinieneś otrzymać wiadomość mailową z instrukcjami dotyczącymi korzystania z portalu. Życzymy miłego korzystania z systemu bibliotecznego.', 200, 1);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('message', $message);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
