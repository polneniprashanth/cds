<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class MailConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if(isset(Auth::user()->id)) {

            $configuration = EmailConfiguration::where("user_id", Auth::user()->id)->orderBy('id', 'desc')->first();
            $existing = config('mail');
            if(!is_null($configuration)) {
                $config = array_merge($existing,
                [     
                    
                    'mailers'    =>     array(
                                            'smtp' => array(
                                                'transport'  =>     $configuration->driver,
                                                'host'       =>     $configuration->host,
                                                'port'       =>     $configuration->port,
                                                'username'   =>     $configuration->user_name,
                                                'password'   =>     $configuration->password,
                                                'encryption' =>     $configuration->encryption,

                                            ),
                                        ),
                    'from'       =>     array('address' => $configuration->sender_email, 'name' => $configuration->sender_name),
                ]);
                Config(['mail'=>$config]);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
