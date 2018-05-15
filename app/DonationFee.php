<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    private $commissionPercentage;

    public function __construct($donation, $commissionPercentage)
     { 
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;

        //Le pourcentage de commission doit être un être compris entre 0 et 30 %, dans le
     // cas contraire la class retournera une ​Exception​ 
    if ($commissionPercentage > 30){
        throw new \Exception("pas ok");
    }

    }

    public function getCommissionAmount()
    {
       // retourner le montant de la commission prélevée par le site
        return $this->donation * $this->commissionPercentage /100;
         
    }

    public function getAmountCollected()
    {
      // retourner le montant perçu par le porteur du projet 
    // return $this->donation - (($this->donation * $this->commissionPercentage) /100) ;
    return $this->donation - $this->getCommissionAmount();
        
       
    }
}