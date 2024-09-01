<?php

namespace App\Console\Commands;

use Aimedidierm\FdiSms\SendSms;
use App\Models\Contraceptive;
use App\Models\Patient;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProcessReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process due reminders for contraceptives';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $contraceptives = Contraceptive::where('reminder_date', '<=', Carbon::now())
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('reminders')
                    ->whereColumn('reminders.contraceptive_id', 'contraceptives.id');
            })
            ->get();
        foreach ($contraceptives as $contraceptive) {
            Reminder::create([
                'contraceptive_id' => $contraceptive->id,
                'processed' => true,
            ]);
            $patientName = $contraceptive->patient->name;
            $patientMethod = $contraceptive->method;
            $patientExpire = $contraceptive->due_date;

            $to = $contraceptive->patient->phone;
            $message = "Hello $patientName, your $patientMethod will be expired on $patientExpire, Thank you!";
            $senderId = "FDI";
            $ref = Str::random(30);
            $callbackUrl = "";

            try {
                $apiUsername = env('SMS_USERNAME');
                $apiPassword = env('SMS_PASSWORD');
                $smsSender = new SendSms($apiUsername, $apiPassword);

                $smsSender->sendSms($to, $message, $senderId, $ref, $callbackUrl);
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()], 500);
            }
        }

        $this->info('Reminders processed successfully.');
    }
}
