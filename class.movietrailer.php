<?php

class MovieTrailer
{
	private $movieName;
	private $movieYear;
	private $page;
	private $embed;
	private $matches;

	public function __construct($movie, $year)
	{
		$this->movieName = str_replace(' ', '+', $movie);
		$this->movieYear = $year;
		$this->page = file_get_contents('http://www.youtube.com/results?search_query='.$this->movieName.'+'.$this->movieYear.'+trailer&aq=1&hl=en');

		if($this->page)
		{
			if(preg_match('~<a .*?href="/watch\?v=(.*?)".*?</div>~s', $this->page, $this->matches))
			{
				$this->embed = '<iframe id="ytplayer" type="text/html" width="640" height="390"
  src="https://www.youtube.com/embed/'.$this->matches[1].'?autoplay=0" allowfullscreen
  frameborder="0"></iframe>';
				echo $this->embed;
			}
		}
		else
		{
			echo "<b>check internet connection.....</b>";
		}
	}
}
?>