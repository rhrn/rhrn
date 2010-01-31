<?php
class TextHelper extends AppHelper {

	function itemLink($links) {
		$lnk = preg_replace('/(http:\/\/[^\s]+).*(\(.*\))/im', '<a target="_blank" href="\1">\2</a>', $links);
		return $this->output($lnk);
	}

}
