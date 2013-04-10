<?php

require_once dirname(__FILE__) . '/../lib/outletGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/outletGeneratorHelper.class.php';

/**
 * outlet actions.
 *
 * @package    aloha
 * @subpackage outlet
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class outletActions extends autoOutletActions
{
	public function executeParseFile(sfWebRequest $request)
	{
		$this->form = new OutletParseFileForm();

	}

	public function executeParseFile_create(sfWebRequest $request)
	{
		$this->form = new OutletParseFileForm();

		$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
		if ($this->form->isValid()) {
			$file = $request->getFiles($this->form->getName());
			$file_tmp = $file['filename']['tmp_name'];

			$fileSlug = explode('.', $file['filename']['name']);
			$fileSlug[0] = SlugifyClass::slugify($fileSlug[0]);
			$fileSlug = implode('.', $fileSlug);

			$filePath = sfConfig::get('sf_upload_dir') . DS . 'outlets' . DS;
			if (!is_dir($filePath))
				mkdir($filePath, 0777, true);

			$file2parse = $filePath . $fileSlug;
			copy($file_tmp, $file2parse);

			$inputFileType = PHPExcel_IOFactory::identify($file2parse);
			/* @var $objReader PHPExcel_Reader_Excel2007 */
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(true);

			$objPHPExcel = $objReader->load($file2parse);

			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, false);

			foreach ($sheetData as $line) {

				$outlet = new Outlet();

				$distributorName = $line[0];
				$distributor = DistributorTable::getInstance()->findOneByName($distributorName, Doctrine::HYDRATE_ARRAY);

				if (!$distributor) {
					$distributor = new Distributor();
					$distributor->setName($distributorName);
					$distributor->save();
				}
				$outlet->setDistributorId($distributor['id']);
				$outlet->setLagalName($line[1]);
				$outlet->setActualName($line[2]);

				$regionName = $line[3];
				$region = RegionTable::getInstance()->findOneByName($regionName, Doctrine::HYDRATE_ARRAY);
				if (!$region) {
					$region = new Region();
					$region->name = $regionName;
					$region->save();
				}

				$outlet->setRegionId($region['id']);

				$cityName = $line[4];
				$city = CityTable::getInstance()->findOneByName($cityName, Doctrine::HYDRATE_ARRAY);
				if (!$city) {
					$city = new City();
					$city->name = $cityName;
					$city->region_id = $region['id'];
					$city->save();
				}

				$outlet->setCityId($city['id']);

				$outlet->setAddress($line[5]);

				$type = mb_strtolower($line[6], 'utf-8');
				if (!array_key_exists($type, Outlet::$types)) {
					$type = array_search($type, Outlet::$types);
				}

				$outlet->setType($type);

				$groupTypeSearch = mb_strtolower(trim($line[7]), 'utf-8');
				if (!array_key_exists($groupTypeSearch, Outlet::$groupTypes)) {
					$groupType = array_search($groupTypeSearch, Outlet::$groupTypes);
					if (!$groupType)
						$groupType = array_search($groupTypeSearch, Outlet::$groupTypesRus);
				} else
					$groupType = $groupTypeSearch;

				$outlet->setGroupType($groupType);

				$outlet->save();
			}

			$this->setTemplate('parseFile');
		}
	}

	public function executeParseFileFix(sfWebRequest $request)
	{
		$this->form = new OutletParseFileForm();

	}

	public function executeParseFileFix_create(sfWebRequest $request)
	{
		$this->form = new OutletParseFileForm();
		$this->notFound = array();

		$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
		if ($this->form->isValid()) {
			$file = $request->getFiles($this->form->getName());
			$file_tmp = $file['filename']['tmp_name'];

			$fileSlug = explode('.', $file['filename']['name']);
			$fileSlug[0] = SlugifyClass::slugify($fileSlug[0]);
			$fileSlug = implode('.', $fileSlug);

			$filePath = sfConfig::get('sf_upload_dir') . DS . 'outlets_fix' . DS;
			if (!is_dir($filePath))
				mkdir($filePath, 0777, true);

			$file2parse = $filePath . $fileSlug;
			copy($file_tmp, $file2parse);

			$inputFileType = PHPExcel_IOFactory::identify($file2parse);
			/* @var $objReader PHPExcel_Reader_Excel2007 */
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(true);

			$objPHPExcel = $objReader->load($file2parse);

			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, false);

			foreach ($sheetData as $line) {

				$params = array();

				$distributorName = $line[0];
				$distributor = DistributorTable::getInstance()->findOneByName($distributorName, Doctrine::HYDRATE_ARRAY);

				if ($distributor) {
					$params['distributor_id'] = $distributor['id'];
				}

				$params['lagal_name'] = $line[1];
				$params['actual_name'] = $line[2];

				$regionName = $line[3];
				$region = RegionTable::getInstance()->findOneByName($regionName, Doctrine::HYDRATE_ARRAY);
				if ($region) {
					$params['region_id'] = $region['id'];
				}

				$cityName = $line[4];
				$city = CityTable::getInstance()->findOneByName($cityName, Doctrine::HYDRATE_ARRAY);
				if ($city) {
					$params['city_id'] = $city['id'];
				}

				$params['address'] = $line[5];

				$type = mb_strtolower($line[6], 'utf-8');
				if (!array_key_exists($type, Outlet::$types)) {
					$type = array_search($type, Outlet::$types);
				}

				$params['type'] = $type;

				$outlet = OutletTable::getInstance()->findOneByArray($params);

				if ($outlet) {

					$groupTypeSearch = mb_strtolower(trim($line[7]), 'utf-8');
					if (!array_key_exists($groupTypeSearch, Outlet::$groupTypes)) {
						$groupType = array_search($groupTypeSearch, Outlet::$groupTypes);
						if (!$groupType)
							$groupType = array_search($groupTypeSearch, Outlet::$groupTypesRus);
					} else
						$groupType = $groupTypeSearch;

					$outlet->setGroupType($groupType);

					$outlet->save();
				}
				else
					$this->notFound[] = $params;

			}

			$this->setTemplate('parseFileFix');
		}
	}
}
