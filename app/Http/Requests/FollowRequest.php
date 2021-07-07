<?php

namespace App\Http\Requests;

use App\Rules\NotFollowedBeforeRule;
use App\Rules\UserCannotFollowHimselfRule;
use Illuminate\Foundation\Http\FormRequest;

class FollowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'following_user_id' => ['required', 'exists:users,id', new NotFollowedBeforeRule(), new UserCannotFollowHimselfRule()]
        ];
    }
}
