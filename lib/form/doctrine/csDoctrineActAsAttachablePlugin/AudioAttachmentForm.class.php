<?php

/**
 * AudioAttachment form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AudioAttachmentForm extends AttachmentForm
{

	public static $mime_types = array(
		'audio/basic', //mulaw аудио, 8 кГц, 1 канал (RFC 2046)
		'audio/L24', //24bit Linear PCM аудио, 8-48 кГц, 1-N каналов (RFC 3190)
		'audio/mp4', //MP4
		'audio/mpeg', //MP3 или др. MPEG (RFC 3003)
		'audio/mp3', //MP3 или др. MPEG (RFC 3003)
		'audio/ogg', //Ogg Vorbis, Speex, Flac или др. аудио (RFC 5334)
		'audio/vorbis', // Vorbis (RFC 5215)
		'application/ogg',
		'audio/x-ms-wma', //Windows Media Audio[5]
		'audio/x-ms-wax', //Windows Media Audio перенаправление
		'audio/vnd.rn-realaudio', //RealAudio[6]
		'audio/vnd.wave', //WAV(RFC 2361)
		'audio/webm', //WebM
		'audio/wav', //.wav
		'audio/x-wav', //.wav
		'audio/x-m4a', //.mpeg
		'audio/mid', // .mid .rmi
		'audio/x-aiff', // aif aifc aiff
		'audio/x-mpegurl', // m3u
		'audio/x-pn-realaudio', // ra ram
		//			'application/octet-stream', // amr
		'audio/AMR', // amr
		'audio/amr', // amr
		'audio/AMR-WB', // amr
		'video/quicktime', // mov
		'video/x-quicktime', // mov
		'audio/aiff', // mov
		'audio/x-midi', // mov
		'audio/x-wav', // mov
		'audio/x-ms-wma', //wma
		'video/x-ms-asf', // wma
		'audio/x-hx-aac-adts', // aac
		'audio/aac', //aac
		'video/3gpp', // .3gpp .3gp
		'video/3gpp2', // .3gpp2 .3g2
	);

	/**
	 * @see AttachmentForm
	 */
	public function configure()
	{
		parent::configure();
		$this->getWidget('url')->setLabel('Файл');
		$this->getValidator('url')->setOption('max_size', 100 * 1024 * 1024);
		$this->getValidator('url')->setOption('path', $this->getBaseUploadPath());
		$this->getValidator('url')->setOption('mime_types', self::$mime_types);
		$this->getValidator('url')->setOption('mime_type_guessers', array(
		      array('sfValidatorFile', 'guessFromFileBinary'),
		));
		$this->getValidator('url')->setOption('mime_type_guessers', 'guessFromFileBinary');
		$this->getValidator('url')->setMessages(array(
			'max_size' => 'Для загрузки разрешены файлы до 100 мб.',
			'mime_types' => 'Разрешенные форматы файлов: Mp3, Wma, Waw, Mov, Amr (частично), Aif, ogg, 3gp'
		));

	}

	public function updateObject($values = null)
	{
		if (null === $values) {
			$values = $this->values;
		}

		// Если email не указан, то генерируем его автоматически
		if (isset($values['type'])) {
			$values['type'] = 'audio';
		}

		$values = $this->processValues($values);

		$this->doUpdateObject($values);

		// embedded forms
		$this->updateObjectEmbeddedForms($values);

		return $this->getObject();
	}

	protected function doSave($con = NULL)
	{
		$object = parent::doSave($con);

		$worksheet = $this->getObject()->getObject();
		if ($worksheet) {
			$worksheet->setAudioStatus(10);
			$worksheet->save();
		}

		return $object;

	}

}
