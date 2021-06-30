<?php
namespace LzoMedia\Heineken\Objects;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use LzoMedia\Heineken\Classes\GetAttachment;
use LzoMedia\Heineken\Classes\OutlookEmail;
use Microsoft\Graph\Exception\GraphException;
use Microsoft\Graph\Model\ItemBody;

class EmailObject extends OutlookEmail
{
    protected $id;
    protected $from;
    protected $content;
    protected $attachment;
    protected $date;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from): void
    {
        $this->from = $from->getEmailAddress()->getAddress();
    }

    public function getContent():string
    {
        return $this->content;
    }

    public function setContent(ItemBody $content): void
    {
        $this->content = $content->getContent();
    }

    /**
     * @throws GraphException
     * @throws GuzzleException
     */
    public function getAttachment()
    {
        $attachment = new GetAttachment();
        $decode = $attachment->get($this);
        return $this->attachment = base64_decode($decode->getContent());
    }

    public function setAttachment($attachment): void
    {
        $this->attachment = $attachment;
    }

    public function getDate(): Carbon
    {
        return Carbon::parse($this->date);
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }


}
