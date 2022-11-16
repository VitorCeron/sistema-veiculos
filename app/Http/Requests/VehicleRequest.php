<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'brand'         => 'required',
            'vehicle_year'  => 'required|integer',
            'kilometers'    => 'required|integer',
            'city'          => 'required',
            'type'          => 'required',
            'price'         => 'required|integer',
            'description'   => 'nullable',
            'image'         => 'required',
            'contact_name'  => 'required|string|min:3',
            'contact_phone' => 'required|string',
            'contact_mail'  => 'required|email'
        ];
    }

    /**
     * Mensagens de erro
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'name.required'         => 'O nome do veículo é obrigatório',
            'brand.required'        => 'A marca do veículo é obrigatória',

            'vehicle_year.required' => 'O ano do veículo é obrigatório',
            'vehicle_year.integer'  => 'O ano precisa ser um número',

            'kilometers.required'   => 'A kilometragem do veículo é obrigatória',
            'kilometers.integer'    => 'A kilometragem precisa ser um número',

            'city.required'         => 'A cidade do veículo é obrigatória',
            'type.required'         => 'O tipo do veículo é obrigatório',

            'price.required'        => 'O preço do veículo é obrigatório',
            'price.integer'         => 'O preço precisa ser um número',

            'image.required'        => 'A imagem do veículo é obrigatória',

            'description'           => 'nullable',

            'contact_name.required' => 'O nome do vendedor é obrigatório',
            'contact_name.string'   => 'O nome do vendedor precisa ser um texto',
            'contact_name.min'      => 'O mínimo é 3 caracteres',

            'contact_phone.required' => 'O telefone do vendedor é obrigatório',
            'contact_phone.string'   => 'O telefone do vendedor precisa ser um texto',

            'contact_mail.required' => 'O e-mail do vendedor é obrigatório',
            'contact_mail.email'   => 'O e-mail do vendedor precisa ser válido',
        ];
    }
}
