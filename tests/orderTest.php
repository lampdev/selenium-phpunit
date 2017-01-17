<?php 
class OrderTest extends PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('https://bodybrands4you.de');
        $this->setBrowser('chrome');
    }

    public function testOrder()
    {
        $this->url('');
        $this->byClassName('emotion-element-0-3')->click();
        $this->byClassName('artbox')->byClassName('inner')->click();
        $this->byId('basketButton')->click();
        $webdriver = $this;
        $this->waitUntil(function() use($webdriver){
            try{
                $webdriver->byPartialLinkText('Warenkorb anzeigen');
                return true;
            }catch (Exception $ex){
                return null;
            }

        });
        $this->byPartialLinkText('Warenkorb anzeigen')->click();
        $this->byClassName('checkout_zur_kasse')->click();
        $this->byName('email')->value('test@gmail.com');
        $this->byName('password')->value('test');
        $this->byName('Submit')->submit();
        $this->byId('sAGB')->click();
        $this->byId('basketButton')->submit();
        $result = $this->byClassName('frontend_checkout_finish');
        $this->assertEquals('Vielen Dank für deine Bestellung bei', $result->text());
        
    }
    public function tearDown()
    {
        $this->stop();
    }
}