<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Info
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $keyword
 * @property string|null $description
 * @property string|null $logo
 * @property string|null $icon
 * @property string|null $hotline1
 * @property string|null $hotline2
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $email
 * @property string|null $tax_code
 * @property string|null $business_license
 * @property string|null $map_address
 * @property string|null $map_iframe
 * @property string|null $facebook
 * @property string|null $zalo
 * @property string|null $sale
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Info newModelQuery()
 * @method static Builder|Info newQuery()
 * @method static Builder|Info query()
 * @method static Builder|Info whereAddress($value)
 * @method static Builder|Info whereBusinessLicense($value)
 * @method static Builder|Info whereCreatedAt($value)
 * @method static Builder|Info whereDescription($value)
 * @method static Builder|Info whereEmail($value)
 * @method static Builder|Info whereFacebook($value)
 * @method static Builder|Info whereHotline1($value)
 * @method static Builder|Info whereHotline2($value)
 * @method static Builder|Info whereIcon($value)
 * @method static Builder|Info whereId($value)
 * @method static Builder|Info whereKeyword($value)
 * @method static Builder|Info whereLogo($value)
 * @method static Builder|Info whereMapAddress($value)
 * @method static Builder|Info whereMapIframe($value)
 * @method static Builder|Info whereName($value)
 * @method static Builder|Info wherePhone($value)
 * @method static Builder|Info whereSale($value)
 * @method static Builder|Info whereTaxCode($value)
 * @method static Builder|Info whereUpdatedAt($value)
 * @method static Builder|Info whereZalo($value)
 * @mixin Builder
 */
class Info extends Model
{
    use HasFactory;

    protected $table = 'info';

    protected $fillable = [
        'name',
        'keyword',
        'description',
        'logo',
        'icon',
        'hotline1',
        'hotline2',
        'phone',
        'address',
        'email',
        'tax_code',
        'business_license',
        'map_address',
        'map_iframe',
        'facebook',
        'zalo',
        'sale',
    ];

}
