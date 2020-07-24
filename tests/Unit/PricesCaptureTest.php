<?php

namespace Tests\Unit;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\PricesCapture;
use App\Exceptions\Handler;

class PricesCaptureTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */



    public function test_download_price_file()
    {


        $this->WithoutExceptionHandling();

        //set the file name
//        $filename = "NewYork-Presbyterian-Hospital-Standard-Charges-2019.xlsx";
//        $downloadpath = "https://www.nyp.org/documents/payingforcare/NewYork-Presbyterian-Hospital-Standard-Charges-2019.xlsx";
        //App::shouldReceive('runningInConsole');
        $filename = "resume.pdf";
        $downloadpath = "harrykim.dev/resume";

        //instantiate prices capture
        $priceCapture = new PricesCapture();
        $priceCapture->setFileName($filename);
        $priceCapture->setDownloadPath($downloadpath);

        //run function that downloads the file and return path
        $downloadedToPath = $priceCapture->downloadFile();

        //check to see if file was downloaded in storage
        $this->assertFileExists($downloadedToPath);
    }
}
