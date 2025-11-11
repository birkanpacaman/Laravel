<?php

namespace App\Http\Controllers;

use App\Models\Consulation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class HomePageController extends Controller {
	/**
	 * index
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request): View {
		return view ('index', [ 
				'page_caption' => 'İletişim Formu',
				'form_action' => route ('consulation_store'),
				'form_method' => 'POST',

				'id' => 0,
				'name' => '',
				'email' => '',
				'phone' => '',
				'message' => ''
		]);
	}

	/**
	 * validator_errors
	 *
	 * @return array
	 */
	private static function validator_errors(): array {
		$require = [ 
				'name' => 'required|string|max:150',
				'email' => 'required|string|max:100|unique:consulations,email',
				'phone' => 'required|string|max:50'
		];

		$messages = [ 
				'name.required' => 'Do not leave the your name field blank.',
				'name.max' => 'Please enter a maximum of 250 characters for the your name field.',

				'email.required' => 'Do not leave the email address field blank.',
				'email.max' => 'Please enter a maximum of 150 characters for the email address field.',
				'email.unique' => 'Your email address is already registered.',

				'phone.required' => 'Do not leave the phone number field blank.',
				'phone.max' => 'Please enter a maximum of 50 characters for the phone number field.'
		];

		return array (
				'require' => $require,
				'message' => $messages
		);
	}

	/**
	 * store
	 *
	 * @param Consulation $mmain
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function consulation_store(Consulation $mmain, Request $request) {
		$input_req = $request->all ();

		$input_main = [ 
				'name' => $input_req ['name'],
				'email' => $input_req ['email'],
				'phone' => $input_req ['phone']
		];

		$insert_data = [ 
				'main' => $input_main
		];

		$models = [ 
				'main' => $mmain
		];

		return Helper::store ($models, $input_req, $insert_data, self::validator_errors (), 'Registration successful.');
	}
}
