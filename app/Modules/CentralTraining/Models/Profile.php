<?php

namespace App\Modules\CentralTraining\Models;

use App\Models\Mship\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Malahierba\PublicId\PublicId;
use Carbon\Carbon;

class Profile extends Model
{
    use PublicId, SoftDeletes;

    static protected $public_id_salt       = 'vatsim-uk-central-training-profile';
    static protected $public_id_min_length = 6;
    static protected $public_id_alphabet   = 'upper_alphanumeric';

    protected $table      = "ct_profile";
    protected $fillable   = [
        "setting_default_availability_start",
        "setting_default_availability_end",
    ];

    public $timestamps = true;
    protected $dates      = [
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    /**
     * Relate this profile to the owning membership account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(){
        return $this->belongsTo(Account::class, "id", "account_id");
    }
}
