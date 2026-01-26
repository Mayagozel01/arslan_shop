<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;
use App\Models\Role;

class SotrudnikController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        $roles = Role::all();
        return view('admin.sotrudnik', compact('users', 'roles'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required_if:role_id,1,2|min:3|max:15|regex:/^[A-ZА-ЯЁ]{1}[a-zа-яё\-]+$/u',
                "middle_name" => 'nullable|min:3|max:20|regex:/^[A-ZА-ЯЁ][a-zа-яА-яё]*$/u',
                "last_name" => 'required_if:role_id,1,2|min:3|max:20|regex:/^[A-ZА-ЯЁ][a-zа-яА-яё]*$/u',
                "username" => 'required|min:6',
                "phone" => 'required|regex:/^\+[0-9]{11,15}$/',
                "email" => 'required|max:255|email|unique:users,email',
                'role_id' => 'required|exists:roles,id',
                'password' => [
                    'required',
                    'max:255',
                    Password::min(6)
                    // ->mixedCase()   // A + a
                    // ->letters()     // хотя бы 1 буква
                    // ->numbers()     // хотя бы 1 цифра
                    // ->symbols(),    // спецсимволы (по желанию)'
                ]
            ],
            [
                'first_name.required' => 'Имя обязательно для заполнения',
                'first_name.regex' => 'Имя должно начинаться с заглавной буквы',
                'last_name.required' => 'Фамилия обязательна',
                'phone.regex' => 'Телефон должен быть в формате +77772223344',
                'email.email' => 'Введите корректный email',
                'email.unique' => 'Этот email уже зарегистрирован',
                'role_id.required' => 'Пожалуйста, выберите роль',
                'role_id.exists' => 'Выбранная роль не существует',
                'password.min' => 'Пароль должен быть минимум 8 символов',
            ]
        );
        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'additional_phone' => $request->additional_phone,
            'address' => $request->address,
            'additional_address' => $request->additional_address,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
            'type' => $request->type

        ]);
        return redirect()->route('admin.sotrudniks.index')->with('success', 'User created successfully');
    }

    public function update(Request $request, User $sotrudnik)
    {
        $request->validate(
            [
                'role_id' => 'required|exists:roles,id',

                'first_name' => [
                    'nullable',
                    Rule::requiredIf(in_array($request->role_id, [1, 2])),
                    'min:3',
                    'max:15',
                    'regex:/^[A-ZА-ЯЁ]{1}[a-zа-яё]+(-[A-ZА-ЯЁ]{1}[a-zа-яё]+)*$/u',
                ],

                'middle_name' => [
                    'nullable',
                    'min:3',
                    'max:20',
                    'regex:/^[A-ZА-ЯЁ]{1}[a-zа-яё]*$/u',
                ],

                'last_name' => [
                    'nullable',
                    Rule::requiredIf(in_array($request->role_id, [1, 2])),
                    'min:3',
                    'max:20',
                    'regex:/^[A-ZА-ЯЁ]{1}[a-zа-яё]*$/u',
                ],

                'username' => [
                    'required',
                    'min:6',
                    Rule::unique('users', 'username')->ignore($sotrudnik->id),
                ],

                'phone' => 'required|regex:/^\+[0-9]{11,15}$/',

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($sotrudnik->id),
                ],

                'password' => [
                    'nullable',
                    'max:255',
                    Password::min(6),
                ],
            ],
            [
                'first_name.required' => 'Имя обязательно для заполнения',
                'first_name.regex' => 'Имя должно начинаться с заглавной буквы и содержать только буквы',
                'middle_name.regex' => 'Отчество должно начинаться с заглавной буквы и содержать только буквы',
                'last_name.required' => 'Фамилия обязательна',
                'last_name.regex' => 'Фамилия должна начинаться с заглавной буквы и содержать только буквы',
                'phone.regex' => 'Телефон должен быть в формате +77772223344',
                'email.email' => 'Введите корректный email',
                'email.unique' => 'Этот email уже зарегистрирован',
                'username.unique' => 'Это имя пользователя уже занято',
                'role_id.required' => 'Пожалуйста, выберите роль',
                'role_id.exists' => 'Выбранная роль не существует',
                'password.min' => 'Пароль должен быть минимум 6 символов',
            ]
        );

        $data = $request->only([
            'first_name',
            'middle_name',
            'last_name',
            'username',
            'phone',
            'additional_phone',
            'address',
            'additional_address',
            'email',
            'role_id',
            'type',
        ]);

        // если пароль ввели — обновляем
        if ($request->filled('password')) {
            $data['password'] = $request->password; // Model casts it to hashed
        }

        $sotrudnik->update($data);

        return redirect()
            ->route('admin.sotrudniks.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy(User $sotrudnik)
    {
        $sotrudnik->delete();
        return redirect()->route('admin.sotrudniks.index')->with('success', 'User deleted successfully');
    }
}
