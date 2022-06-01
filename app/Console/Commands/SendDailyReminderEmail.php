<?php

namespace App\Console\Commands;

use App\Actions\Borrow\ListEmailsWithActiveBorrowsAction;
use App\Mail\DailyReminderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that send email for users that have active borrows';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailList = (new ListEmailsWithActiveBorrowsAction())->execute();
        foreach ($emailList as $email){
            Mail::to($email)->send(new DailyReminderEmail());
        }
    }
}
