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
      //Le pourcentage de commission doit être compris entre 0 et 30 %
     // cas contraire la class retournera une ​Exception​ 
    if ($commissionPercentage > 30){
        throw new \Exception("pas ok");
    }
    // Montant de la donation doit etre > 100, cas contraire retourne une Exception.
   if ($donation < 100){
        throw new \Exception("pas ok");
    } 
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;

    }

     // retourner le montant de la commission prélevée par le site
    public function getCommissionAmount()
    {
        return $this->donation * $this->commissionPercentage /100;
         
    }
     // retourner le montant perçu par le porteur du projet 
    public function getAmountCollected()
    {
     return $this->donation - $this->getCommissionAmount();      
       
    }
    //Total frais limité à 5euros (500)
    public function getFixedAndCommissionFeeAmount()
    { 
        $totalFee = $this->getCommissionAmount() + 50;
        if($totalFee > 500){
            return 500;
        } else{
            return $totalFee;
        }
        
    }


}