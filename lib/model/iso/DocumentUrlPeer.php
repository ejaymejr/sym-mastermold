<?php

/**
 * Subclass for performing query and update operations on the 'document_url' table.
 *
 * 
 *
 * @package lib.model.iso
 */ 
class DocumentUrlPeer extends BaseDocumentUrlPeer
{
	public static function CreateLink($list)
	{
		$c = new Criteria();
		$c->add(self::NAME, $list, Criteria::IN);
		$rs = self::doSelect($c);
		$msg = '';
		$txt = '';
		foreach($list as $name):
			foreach($rs as $r):
				$txt = '';
				if ($r->getName() == $name):
					$txt = '<a href="'.$r->getUrl().'">'.$r->getName().'</a> | ';
				endif;
			endforeach;
			if (! $txt):
				$txt .= '<script>';
				$txt .= '</script>';
				$txt .= '<a href="#">'.$name.'</a> | ';
			endif;
			$msg .= $txt;
		endforeach;
		return '<small>'.$msg.'</small>';
	}
}
