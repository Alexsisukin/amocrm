<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 10:25
 */

namespace alexsisukin\AmoCrm\structures;

class TradeUpdate extends Structure
{


    public function __construct($lead)
    {
        $this->updated_at = time();
        $this->parseLead($lead);
    }

    private function parseLead($lead)
    {
        $this->setId($lead['id']);
        $this->setName($lead['name']);
        $this->setStatusId($lead['status_id']);
        $this->setCompanyId($lead['pipeline']['id']);
        $this->setResponsibleUserId(['responsible_user_id']);
        $this->setSale($lead['sale']);
        $this->setTagOld($lead['tags']);
        $this->setContactsId($lead['contacts']);
        $this->setCompanyId($lead['company']);
    }

}