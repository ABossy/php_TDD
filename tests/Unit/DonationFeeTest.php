<?php

namespace Tests\Unit;

use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 10;
        $this->assertEquals($expected, $actual);
    }

    public function testAmountCollected()
    {
        // Donation de 100 et commission de 30%
        $donationFees = new DonationFee(100, 30);

        // on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();

        // Le montant récolté doit être de 70
        $expected = 70;
        $this->assertEquals($expected, $actual);
    }

    public function testCommissionException()
    {   
        $this->expectException(\Exception::class);
        // Donation de 100 et commission de 50%
        $donationFees= new DonationFee(100,50);
        
     }

     public function testDonationException()
    {   
        $this->expectException(\Exception::class);
        // Donation de 80 et commission de 10%
        $donationFees= new DonationFee(80,10);
        
     }
   
     public function testFixedAndCommissionFeeAmount()
     {
         // Given
        $donationFees = new DonationFee(100, 20);
        // When
        $actual = $donationFees->getFixedAndCommissionFeeAmount();
        // Then
        $expected = 70;
        $this->assertEquals($expected, $actual);
     }

     public function testMaxFee500()
     {
         // Given
        $donationFees = new DonationFee(10000, 20);
        // When
        $actual = $donationFees->getFixedAndCommissionFeeAmount();
        // Then
        $expected = 500;
        $this->assertEquals($expected, $actual);
     }

     public function testSummary()
     {
         // Given 
        $donationFees = new DonationFee(1000, 20);
        // when 
        $actual = $donationFees-> getSummary();   
        // then
         $expected = array(
             "donation" => 1000,
             "fixedFee" => 50,
             "commission"=> 200,
             "fixeAndCommission"=> 250,
             "amountCollected"=> 750,   
         );
         $this->assertEquals($expected, $actual);
      
     }

     public function testSummary2()
     {
         // Given 
        $donationFees = new DonationFee(10000, 20);
        // when 
        $actual = $donationFees-> getSummary();   
        // then
         $expected = array(
             "donation" => 10000,
             "fixedFee" => 50,
             "commission"=> 2000,
             "fixeAndCommission"=> 500,
             "amountCollected"=> 9500,   
         );
         $this->assertEquals($expected, $actual);
      
     }
}
