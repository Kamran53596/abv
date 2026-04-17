<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute qəbul edilməlidir.',
    'accepted_if' => ':other :value olduğu zaman :attribute qəbul edilməlidir.',
    'active_url' => ':attribute düzgün URL deyil.',
    'after' => ':attribute :date tarixindən sonra bir tarix olmalıdır.',
    'after_or_equal' => ':attribute :date tarixindən sonra və ya ona bərabər bir tarix olmalıdır.',
    'alpha' => ':attribute yalnız hərflərdən ibarət olmalıdır.',
    'alpha_dash' => ':attribute yalnız hərflər, rəqəmlər, tire və alt xətt simvollarından ibarət olmalıdır.',
    'alpha_num' => ':attribute yalnız hərflər və rəqəmlərdən ibarət olmalıdır.',
    'array' => ':attribute bir massiv olmalıdır.',
    'ascii' => ':attribute yalnız bir bayt uzunluğundakı hərflər və simvollarından ibarət olmalıdır.',
    'before' => ':attribute :date tarixindən əvvəl bir tarix olmalıdır.',
    'before_or_equal' => ':attribute :date tarixindən əvvəl və ya ona bərabər bir tarix olmalıdır.',
    'between' => [
        'array' => ':attribute :min ilə :max element arasında olmalıdır.',
        'file' => ':attribute :min ilə :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute :min ilə :max arasında olmalıdır.',
        'string' => ':attribute :min ilə :max simvol arasında olmalıdır.',
    ],
    'boolean' => ':attribute məlumatı doğru və ya yanlış olmalıdır.',
    'confirmed' => ':attribute təsdiq ilə uyğun gəlmir.',
    'current_password' => 'Şifrə yanlışdır.',
    'date' => ':attribute düzgün tarix deyil.',
    'date_equals' => ':attribute :date tarixinə bərabər bir tarix olmalıdır.',
    'date_format' => ':attribute :format formatına uyğun deyil.',
    'decimal' => ':attribute :decimal onluq qismə malik olmalıdır.',
    'declined' => ':attribute rədd edilməlidir.',
    'declined_if' => ':other :value olduğu zaman :attribute rədd edilməlidir.',
    'different' => ':attribute və :other fərqli olmalıdır.',
    'digits' => ':attribute :digits rəqəmli olmalıdır.',
    'digits_between' => ':attribute :min ilə :max rəqəm arasında olmalıdır.',
    'dimensions' => ':attribute doğru şəkil ölçülərinə malik deyil.',
    'distinct' => ':attribute sahəsində dublikat dəyər var.',
    'doesnt_end_with' => ':attribute aşağıdakılardan heç biri ilə bitməməlidir: :values.',
    'doesnt_start_with' => ':attribute aşağıdakılardan heç biri ilə başlamamalıdır: :values.',
    'email' => ':attribute düzgün e-poçt ünvanı olmalıdır.',
    'ends_with' => ':attribute aşağıdakılardan biri ilə bitməlidir: :values.',
    'enum' => 'Seçilmiş :attribute yalnışdır.',
    'exists' => 'Seçilmiş :attribute yalnışdır.',
    'file' => ':attribute bir fayl olmalıdır.',
    'filled' => ':attribute sahəsi doldurulmalıdır.',
    'gt' => [
        'array' => ':attribute :value elementdən çox olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük olmalıdır.',
        'numeric' => ':attribute :value dəyərindən böyük olmalıdır.',
        'string' => ':attribute :value simvoldan çox olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute :value elementdən çox olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük və ya bərabər olmalıdır.',
        'numeric' => ':attribute :value dəyərindən böyük və ya bərabər olmalıdır.',
        'string' => ':attribute :value simvoldan çox və ya bərabər olmalıdır.',
    ],
    'image' => ':attribute bir şəkil olmalıdır.',
    'in' => 'Seçilmiş :attribute yalnışdır.',
    'in_array' => ':attribute sahəsi :other içində mövcud deyil.',
    'integer' => ':attribute bir tam ədəd olmalıdır.',
    'ip' => ':attribute düzgün bir IP ünvanı olmalıdır.',
    'ipv4' => ':attribute düzgün bir IPv4 ünvanı olmalıdır.',
    'ipv6' => ':attribute düzgün bir IPv6 ünvanı olmalıdır.',
    'json' => ':attribute düzgün JSON formatında olmalıdır.',
    'lowercase' => ':attribute kiçik hərflərdən ibarət olmalıdır.',
    'lt' => [
        'array' => ':attribute :value elementdən az olmalıdır.',
        'file' => ':attribute :value kilobaytdan az olmalıdır.',
        'numeric' => ':attribute :value dəyərindən az olmalıdır.',
        'string' => ':attribute :value simvoldan az olmalıdır.',
    ],
    'lte' => [
        'array' => ':attribute :value elementdən çox olmamalıdır.',
        'file' => ':attribute :value kilobaytdan az və ya bərabər olmalıdır.',
        'numeric' => ':attribute :value dəyərindən az və ya bərabər olmalıdır.',
        'string' => ':attribute :value simvoldan az və ya bərabər olmalıdır.',
    ],
    'mac_address' => ':attribute düzgün bir MAC ünvanı olmalıdır.',
    'max' => [
        'array' => ':attribute :max elementdən çox olmamalıdır.',
        'file' => ':attribute :max kilobaytdan çox olmamalıdır.',
        'numeric' => ':attribute :max dəyərindən çox olmamalıdır.',
        'string' => ':attribute :max simvoldan çox olmamalıdır.',
    ],
    'max_digits' => ':attribute :max rəqəmli olmamalıdır.',
    'mimes' => ':attribute faylın tipi: :values olmalıdır.',
    'mimetypes' => ':attribute faylın tipi: :values olmalıdır.',
    'min' => [
        'array' => ':attribute ən az :min elementdən ibarət olmalıdır.',
        'file' => ':attribute ən az :min kilobaytdan ibarət olmalıdır.',
        'numeric' => ':attribute ən az :min dəyərindən ibarət olmalıdır.',
        'string' => ':attribute ən az :min simvoldan ibarət olmalıdır.',
    ],
    'min_digits' => ':attribute ən az :min rəqəmli olmalıdır.',
    'missing' => ':attribute sahəsi çatışmır.',
    'missing_if' => ':other :value olduğu zaman :attribute sahəsi çatışmır.',
    'missing_unless' => ':other :value olduğu müddətdən əlavə :attribute sahəsi çatışmır.',
    'missing_with' => ':values mövcud olduğu zaman :attribute sahəsi çatışmır.',
    'missing_with_all' => ':values dəyərləri mövcud olduğu zaman :attribute sahəsi çatışmır.',
    'multiple_of' => ':attribute :value-in bölünən çoxqat olmalıdır.',
    'not_in' => 'Seçilmiş :attribute yalnışdır.',
    'not_regex' => ':attribute formatı düzgün deyil.',
    'numeric' => ':attribute bir rəqəm olmalıdır.',
    'password' => [
        'letters' => ':attribute ən az bir hərf içərməlidir.',
        'mixed' => ':attribute ən az bir böyük və bir kiçik hərf içərməlidir.',
        'numbers' => ':attribute ən az bir rəqəm içərməlidir.',
        'symbols' => ':attribute ən az bir simvol içərməlidir.',
        'uncompromised' => 'Verilmiş :attribute verilənlər sızıntısında göstərilmişdir. Xahiş olunur fərqli bir :attribute seçin.',
    ],
    'present' => ':attribute sahəsi mövcud olmalıdır.',
    'prohibited' => ':attribute sahəsi qadağandır.',
    'prohibited_if' => ':other :value olduğu zaman :attribute sahəsi qadağandır.',
    'prohibited_unless' => ':other :values içində olmadığı müddətdə :attribute sahəsi qadağandır.',
    'prohibits' => ':attribute sahəsi :other mövcud olduğu zaman qadağandır.',
    'regex' => ':attribute formatı düzgün deyil.',
    'required' => ':attribute sahəsi tələb olunur.',
    'required_array_keys' => ':attribute sahəsi bu dəyərlər üçün qeydlər içərməlidir: :values.',
    'required_if' => ':other :value olduğu zaman :attribute sahəsi tələb olunur.',
    'required_if_accepted' => ':other qəbul edildiyi zaman :attribute sahəsi tələb olunur.',
    'required_unless' => ':other :values daxilində olmadığı müddətdə :attribute sahəsi tələb olunur.',
    'required_with' => ':values mövcud olduğu zaman :attribute sahəsi tələb olunur.',
    'required_with_all' => ':values dəyərləri mövcud olduğu zaman :attribute sahəsi tələb olunur.',
    'required_without' => ':values mövcud olmadığı zaman :attribute sahəsi tələb olunur.',
    'required_without_all' => ':values dəyərləri',
    'same' => ' :attribute və :other eyni olmalıdır.',
    'size' => [
        'array' => ' :attribute :size element içərməlidir.',
        'file' => ' :attribute :size kilobayt olmalıdır.',
        'numeric' => ' :attribute :size olmalıdır.',
        'string' => ' :attribute :size simvol olmalıdır.',
    ],
    'starts_with' => ' :attribute aşağıdakılardan biri ilə başlamalıdır: :values.',
    'string' => ' :attribute bir simvol olmalıdır.',
    'timezone' => ' :attribute doğru bir saat zonası olmalıdır.',
    'unique' => ' :attribute artıq götürülmüşdür.',
    'uploaded' => ' :attribute yüklənmədi.',
    'uppercase' => ' :attribute böyük hərflərdən ibarət olmalıdır.',
    'url' => ' :attribute doğru bir URL olmalıdır.',
    'ulid' => ' :attribute doğru bir ULID olmalıdır.',
    'uuid' => ' :attribute doğru bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'Ad',
        'surname' => 'Soyad',
        'full_name' => 'S.A.A',
        'address' => 'Ünvan',
        'fin' => 'Sənəd tipi, seryası və nömrəsi',
        'phone' => 'Telefon',
        'password' => 'Şifrə',
        'mobile' => 'Abunəçinin mobil nömrəsi (əsas)',
        'role' => 'Role',
        'current_password' => 'Köhnə şifrə',
        'password_confirmation' => 'Şifrəni təkrarlayın',
        'email' => 'E-mail',
        'sign' => 'İmza',
        'title' => 'Başlıq',
        'priority' => 'Prioritet',
        'category' => 'Kateqoriya',
        'text' => 'Messaj',
        'file' => 'File'
    ],

];