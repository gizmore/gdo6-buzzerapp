<?php
namespace GDO\Buzzerapp;

use GDO\Audio\GDT_AudioFile;
use GDO\DB\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_CreatedBy;
use GDO\DB\GDT_DeletedAt;
use GDO\DB\GDT_DeletedBy;
use GDO\File\GDO_File;

final class BUZ_Sample extends GDO
{
	public function gdoColumns()
	{
		$module = Module_Buzzerapp::instance();
		return array(
			GDT_AutoInc::make('sample_id'),
			GDT_AudioFile::make('sample_file')->notNull()->maxsize($module->cfgMaxSize()),
			GDT_CreatedAt::make('sample_created'),
			GDT_CreatedBy::make('sample_creator'),
			GDT_DeletedAt::make('sample_deleted'),
			GDT_DeletedBy::make('sample_deletor'),
		);
	}
	
	/**
	 * @return GDO_File
	 */
	public function getFile() { return $this->getValue('sample_file'); }
	public function getFileID() { return $this->getVar('sample_file'); }
	
}
