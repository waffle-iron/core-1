<?php

namespace App\Modules\NetworkData\Events;

use App\Events\Event;
use App\Modules\NetworkData\Models\Atc;
use Illuminate\Queue\SerializesModels;

class AtcSessionUpdated extends Event
{
    use SerializesModels;

    public $atcSession = null;

    /**
     * Construct the event, storing the ATC session that's just been updated.
     *
     * There's little to construct at the minute as it's simply a notification!
     */
    public function __construct(Atc $atc)
    {
        $this->atcSession = $atc;
    }
}