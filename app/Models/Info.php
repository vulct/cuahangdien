<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereBusinessLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereHotline1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereHotline2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereMapAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereMapIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereTaxCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereZalo($value)
 * @mixin \Eloquent
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
