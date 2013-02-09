<?

require_once $application_folder."/controllers/base.php";

class Error extends Base
{
	public function index()
	{
		$this->display_page_with_view('error');
	}
}