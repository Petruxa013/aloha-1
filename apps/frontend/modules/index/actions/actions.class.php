<?php

/**
 * index actions.
 *
 * @package    Insurance
 * @subpackage index
 * @author     Alexander Manichev aka @astronom <a.manichev@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class indexActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{

	}

	public function executeImageUpload(sfWebRequest $request)
	{
//		$form = new ImageUploadForm();
//
//		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
//		if ($form->isValid())
//        {
//
//        }

		$file = $request->getFiles('file');
		$fileValidator =  new sfValidatorFile(array(
			'required'   => true,
			'mime_types' => 'web_images',
			'path'  => sfConfig::get('sf_upload_dir')
		));

		try {
			/* @var $_file sfValidatedFile */
			$_file = $fileValidator->clean($file);
			$_file->save();
			$filename = str_replace(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR, '', $_file->getSavedName());
			$this->addUploadedImage($filename, $_file->getSavedName());
			return $this->returnJSON(array('filelink' => '/uploads/'.$filename));
		}
		catch(sfValidatorError $e) {
			return $this->returnJSON(array('error' => $e->getMessage()));
		}

	}

	public function executeImageCrop(sfWebRequest $request)
	{
		$image = ImageAttachmentTable::getInstance()->findOneById($request->getPostParameter('file'));
		if($image)
		{
			$params = $request->getPostParameters();

			$crop = new sfImage($image->getUploadPath());
			$crop->crop($params['x1'],$params['y1'],$params['w'],$params['h']);
			$crop->saveAs($image->getCropPath());

			$thumb = new sfImage($image->getCropPath());
			$thumb->resize(384, 400, true, true);
			$thumb->saveAs($image->getResizedPath(304, 400));
			$thumb->resize(138, 171, true, true);
			$thumb->saveAs($image->getResizedPath(138, 171));
			$thumb->resize(64, 68, true, true);
			$thumb->saveAs($image->getResizedPath(64, 68));
			$thumb->resize(45, 73, true, true);
			$thumb->saveAs($image->getResizedPath(45, 73));

			return $this->returnJSON(array('error' => false));
		}
			return $this->returnJSON(array('error' => true));
	}

	private function addUploadedImage($fileName, $filePath)
	{
		$imagesCollection = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'images.json';
		$fileContent = array();
		if(is_file($imagesCollection))
		{
			$fileContent = json_decode(file_get_contents($imagesCollection), true);
		}
		$thumb = new sfImage($filePath);
		$thumb->resize(60, 60, true, true);
		$thumbFilepath = explode(DIRECTORY_SEPARATOR, $filePath);
		$thumbFilepath[count($thumbFilepath)-1] = 's_'.$thumbFilepath[count($thumbFilepath)-1];
		$thumbFilepath = implode(DIRECTORY_SEPARATOR, $thumbFilepath);
		$thumb->saveAs($thumbFilepath);
		array_push($fileContent, array('thumb' => '/uploads/s_'.$fileName, 'image' => '/uploads/'.$fileName));
		file_put_contents($imagesCollection, json_encode($fileContent));
	}

	/**
	 * Метод, отдающий данные в JSON формате
	 * @param Array $output
	 * @return JSON String <sfView::NONE, string>
	 */
	private function returnJSON($output)
	{
		$this->getResponse()->setHttpHeader('Content-type', 'text/html');
		return $this->renderText(stripslashes(json_encode($output)));
	}
}
