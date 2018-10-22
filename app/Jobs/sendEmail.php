<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class sendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        dump($this->user);die;
        Mail::raw('欢迎加入',function($message){

            $message -> from('li690953473@163.com','User');
            $message -> to($this->user);
            $message -> subject('小米商城注册邮件');
        });
    }
}
