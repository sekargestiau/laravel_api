<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Collectors
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property float|null $drop_latitude
 * @property float|null $drop_longitude
 * @property float|null $current_latitude
 * @property float|null $current_longitude
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors query()
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereCurrentLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereCurrentLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereDropLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereDropLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collectors whereUserId($value)
 */
	class Collectors extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contents
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $content_title
 * @property string $content_text
 * @method static \Illuminate\Database\Eloquent\Builder|Contents newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contents newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contents query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contents whereContentText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contents whereContentTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contents whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contents whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contents whereUpdatedAt($value)
 */
	class Contents extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Orders
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $waste_type
 * @property int $waste_qty
 * @property string $user_notes
 * @property int $recycle_fee
 * @property int $pickup_fee
 * @property int $subtotal_fee
 * @property string $order_status
 * @property string $order_datetime
 * @property string $pickup_datetime
 * @property float $pickup_longitude
 * @property float $pickup_latitude
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders query()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereOrderDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders wherePickupDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders wherePickupFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders wherePickupLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders wherePickupLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereRecycleFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereSubtotalFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereUserNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereWasteQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orders whereWasteType($value)
 */
	class Orders extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $phone
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Waste
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Waste newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Waste newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Waste query()
 */
	class Waste extends \Eloquent {}
}

