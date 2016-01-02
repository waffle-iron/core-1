<?php

namespace App\Console\Commands;

use App\Jobs\Mship\Account\MemberCertUpdate;
use App\Models\Mship\Account;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;

class MembersCertUpdate extends aCommand
{
    use DispatchesJobs;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'Members:CertUpdate
                        {max_members=1000}
                        {--t|type=all : Which update are we running? Hourly, Daily, Weekly or Monthly?}
                        {--f|force= : If specified, only this CID will be checked.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update members using the CERT feeds.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $members = $this->getMembers();

        foreach ($members as $member) {
            $job = new MemberCertUpdate($member);
            $this->dispatch($job);
        }

        $this->sendSlackSuccess(sprintf('%s members have been added to the update queue.', count($members)));
    }

    protected function getMembers()
    {
        $members = Account::where('account_id', '>=', 800000);

        // add parameters based on the cron type
        if ($this->option('force')) {
            $members->where('account_id', $this->option('force'));
        } elseif (starts_with($this->option('type'), 'h')) {
            // members who have logged in in the last 30 days or who have never been checked
            $members->where(function ($query) {
                $query->where('last_login', '>=', Carbon::now()->subMonth())
                    ->orWhereNull('cert_checked_at');
            });
        } elseif (starts_with($this->option('type'), 'd')) {
            // members who have logged in in the last 90 days and haven't been checked today
            $members->where(function ($query) {
                $query->where('cert_checked_at', '<=', Carbon::now()->subHours(23))
                    ->where('last_login', '>=', Carbon::now()->subMonths(3));
            });
        } elseif ((starts_with($this->option('type'), 'w'))) {
            // members who have logged in in the last 180 days and haven't been checked this week
            $members->where(function ($query) {
                $query->where('cert_checked_at', '<=', Carbon::now()->subDays(6))
                    ->where('last_login', '>=', Carbon::now()->subMonths(6));
            });
        } elseif ((starts_with($this->option('type'), 'm'))) {
            // members who have never logged in and haven't been checked this month, but are still active VATSIM members
            $members->where(function ($query) {
                $query->where('cert_checked_at', '<=', Carbon::now()->subDays(25))
                    ->whereNull('last_login')
                    ->where('status', 0);
            });
        }

        return $members->orderBy('cert_checked_at', 'ASC')
            ->limit($this->argument('max_members'))
            ->pluck('account_id');
    }
}
