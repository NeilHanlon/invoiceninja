<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2023. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Models;

use App\Utils\Traits\MakesHash;

class Proposal extends BaseModel
{
    use MakesHash;

    protected $guarded = [
        'id',
    ];

    protected $touches = [];

    public function getEntityType()
    {
        return self::class;
    }

    protected $appends = ['proposal_id'];

    public function getRouteKeyName()
    {
        return 'proposal_id';
    }

    public function getProposalIdAttribute()
    {
        return $this->encodePrimaryKey($this->id);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function assigned_user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id', 'id');
    }
}
