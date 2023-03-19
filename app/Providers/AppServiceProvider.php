<?php

namespace App\Providers;

use App\Mail\AppointmentMail;
use App\Mail\DoctorMail;
use App\Models\appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Doctor::created(function($doctor){
            Mail::to($doctor->email)->send(new DoctorMail($doctor));
        });
        // appointment::created(function($appoint){
        //     Mail::to($appoint->email)->send(new AppointmentMail($appoint));
        // });
    }
}
