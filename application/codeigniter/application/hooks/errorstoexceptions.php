<?

class ErrorsToExceptions {

	public function enable()
	{
		set_error_handler('error_to_exception_handler');

		if (defined('ENVIRONMENT') && ENVIRONMENT == 'production')
		{
			return set_exception_handler('redirect_to_error_page');
		}
	}
}

function error_to_exception_handler($errno, $errstr, $errfile, $errline)
{
	throw new Exception($errstr, $errno);
}

function redirect_to_error_page()
{
	redirect('/error');
}