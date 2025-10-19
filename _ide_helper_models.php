<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryPartner whereUpdatedAt($value)
 */
	class DeliveryPartner extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restaurant whereUpdatedAt($value)
 */
	class Restaurant extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $phone_number
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserLocation> $locations
 * @property-read int|null $locations_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $address
 * @property string|null $city
 * @property string $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int $is_primary
 * @property int $is_current
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation current()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation primary()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserLocation whereUserId($value)
 */
	class UserLocation extends \Eloquent {}
}

