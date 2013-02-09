<?

class LoudActiveRecordException extends Exception {}

class LoudActiveRecord extends ActiveRecord\Model 
{
	public function save($validate=true)
	{
		if($this->is_invalid())
		{
			$exception = new LoudActiveRecordException("Validation did not pass");
			$exception->model = $this;
			throw $exception;
		}
		return parent::save($validate);
	}
}