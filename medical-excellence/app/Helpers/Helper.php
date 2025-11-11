<?php

namespace App\Helpers;

use Throwable;
use Illuminate\Support\Facades\Validator;

class Helper {
	/**
	 * store
	 *
	 * @param array $models
	 * @param array $input_req
	 * @param array $input_data
	 * @param array $validator_errors
	 * @param string $success_message
	 * @return \Illuminate\Http\JsonResponse
	 */
	public static function store(array $models, array $input_req, array $input_data, array $validator_errors, $success_message = 'Registration successful.') {
		try {
			// $input = $request->all ();
			$validator = Validator::make ($input_req, $validator_errors ['require'], $validator_errors ['message']);

			if ($validator->fails ()) {
				// Validator
				return self::responseJsonInsertUpdateError ('Do not leave any required fields blank.', $validator->errors ());
			}

			if (! empty ($models)) {
				// main_table
				if (! empty ($models ["main"])) {
					$models ["main"]::create ($input_data ["main"]);
				}
			}
		}
		catch (Throwable $e) {
			// Throwable
			return self::responseJsonInsertUpdateError ($e->getMessage (), 'Throwable');
		}
		finally {
			unset ($validator);
		}

		// Success
		return self::responseJsonInsertUpdateSuccess ($success_message, 'Success');
	}

	/**
	 * responseJsonInsertUpdateSuccess
	 *
	 * @param string $message
	 * @param string $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	private static function responseJsonInsertUpdateSuccess($message, $data) {
		return response ()->json ([ 
				'success' => 1,
				'data' => $data,
				'message' => self::target_div_success ($message)
		]);
	}

	/**
	 * responseJsonInsertUpdateError
	 *
	 * @param string $message
	 * @param string $errors
	 * @return \Illuminate\Http\JsonResponse
	 */
	private static function responseJsonInsertUpdateError($message, $errors) {
		return response ()->json ([ 
				'message' => self::target_orient_alert_div_warning ($message),
				'errors' => $errors,
				'success' => 9
		]);
	}

	/**
	 * target_div_success
	 *
	 * @param string $param
	 * @return string
	 */
	private static function target_div_success($param) {
		return '<div class="col-lg-12" id="alert_warning">
								<pre class="success control-span col-md-12 col-xs-12">' . $param . '</pre>
						</div>';
	}

	/**
	 * target_orient_alert_div_warning
	 *
	 * @param string $param
	 * @return string
	 */
	private static function target_orient_alert_div_warning($param) {
		return '<div class="col-lg-12" id="alert_warning">
								<pre class="warning control-span col-md-12 col-xs-12">' . $param . '</pre>
						</div>';
	}
}
?>