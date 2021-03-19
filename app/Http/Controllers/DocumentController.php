<?php

namespace App\Http\Controllers;
use PDF;
use PhpOffice\PhpWord\PhpWord;
//use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use XMLReader;
use ZipArchive;
use Excel;
use App\Imagick;
use LynX39\LaraPdfMerger\Facades\PdfMerger;

use \ConvertApi\ConvertApi;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\View;
use NcJoes\OfficeConverter\OfficeConverter;


use Illuminate\Http\Request;
use Response;


class DocumentController extends Controller
{
     public function convertWordToPDF(Request $request)
    {
       //dd($request);
        if ($request->hasFile('file_upload')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('file_upload')->getClientOriginalExtension();
                    $fileName = time();
                   // dd($fileName);
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('file_upload')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/public/files/files/")."/".$fileName;
                   // dd($thumbnail);

                }

/*                dd($fileName);*/
            /* Set the PDF Engine Renderer Path */
        //$phpWord = new \PhpOffice\PhpWord\PhpWord();
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        //dd($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

       $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007','Word2003');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('files/files/'.$fileName));
//dd($Content);
         //dd($Content);
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        // $PDFWriter->save(public_path(time().'.pdf')); 
   
        $time = time();

        $PDFWriter->save(public_path('files/files/'.$time.'.pdf'), "file");
         //unlink(public_path('files/files/'.$fileName));
        $file = public_path('files/files/'.$time.'.pdf');
     // dd($file);
         $headers = array('Content-Type: application/pdf',);
        return Response::download($file, time().'.pdf',$headers);
  

        echo 'File has been successfully converted';
    }

      public function convertExcelToPDF(Request $request)
    {


         if ($request->hasFile('file_upload2')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('file_upload2')->getClientOriginalExtension();
                    $fileName = time();
                   // dd($fileName);
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('file_upload2')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/public/files/files/")."/".$fileName;
                   // dd($thumbnail);

                }
            /* Set the PDF Engine Renderer Path */
 //       $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
      //  $objReader = PHPExcel_IOFactory::createReader('cars.xls');
        $Content = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path('files/files/'.$fileName)); 
 
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($Content,'Dompdf');

    $time = time();
    $PDFWriter->save(public_path('files/files/'.$time.'.pdf'), "file");
        //$PDFWriter->save(public_path(time().'.pdf'));

         $file = public_path('files/files/'.$time.'.pdf');
     // dd($file);
         $headers = array('Content-Type: application/pdf',);
        return Response::download($file, time().'.pdf',$headers);
        unlink(public_path('files/files/'.$fileName));
        echo 'File has been successfully converted';
    }


    public  function convertJPGToPDF(Request $request)
    {

          if ($request->hasFile('image_pdf')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('image_pdf')->getClientOriginalExtension();
                    $fileName = time();
                   // dd($fileName);
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('image_pdf')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/files/files/")."/".$fileName;
                   // dd($thumbnail);

                }
   
    //   dd($thumbnail);



 $data = ['image' => $thumbnail];


 $html = View::make('templates.conversion.image_to_pdf', compact('thumbnail','fileName'));
//dd($html);
  $randomTime = time();
 $pdfUPN = PDF::loadHTML($html)->stream();
 //dd($pdfUPN);
 $cfiles=public_path('files/files/'.$randomTime.'.pdf');
 //dd($cfiles);
 file_put_contents($cfiles,$pdfUPN);
 // return view('templates.conversion.image_to_pdf', compact('thumbnail'));
 // dd($data);
        $pdf = public_path('files/files/'.$randomTime.'.pdf');
         //dd($pdf);
            /*PDF::loadView('templates.conversion.image_to_pdf', compact('thumbnail','fileName'))->setOptions(['defaultFont' => 'sans-serif']);*/
        // dd($pdf);

        $headers = array('Content-Type: application/pdf',);
        return Response::download($pdf, 'info.pdf',$headers);            
        // return $pdf;


          
			// $file = public_path('files\files\\'.$thumbnail);
   //         // dd($file);
			// $image = new Imagick($file);

			// $image->setImageFormat('pdf');

			// $image->writeImage(public_path(time().'pdf'));
			// $images->save();

			//return "Done";
    }




    public function merge_pdf_to_pdf(Request $request)
    {


        if ($request->hasFile('pdf')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('pdf')->getClientOriginalExtension();
                    $fileName = time();
                   // dd($fileName);
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('pdf')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/files/files/")."/".$fileName;
                   // dd($thumbnail);

                }

                  if ($request->hasFile('pdf1')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('pdf1')->getClientOriginalExtension();
                    $fileName2 = time();
                   // dd($fileName);
                    $fileName2 .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('pdf1')->move($destinationPath,$fileName2))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail1 = asset("/files/files/")."/".$fileName2;
                   // dd($thumbnail);

                }

   //echo $thumbnail;
    //dd($thumbnail1);
    
        $pdfMerger = PDFMerger::init(); 
        //Initialize the merger

        $pdfMerger->addPDF(public_path('files/files/'.$fileName), 'all');
        $pdfMerger->addPDF(public_path('files/files/'.$fileName2), 'all');
        $pdfMerger->merge();
        $time = time();
        $pdfMerger->save(public_path('files/files/'.$time.'.pdf'), "file");
        $file = public_path('files/files/'.$time.'.pdf');

         $headers = array('Content-Type: application/pdf',);
        return Response::download($file, time().'.pdf',$headers);  
        echo "Merge Successfully";
    }





    function split_pdf(Request $request){

             if ($request->hasFile('split-pdf')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('split-pdf')->getClientOriginalExtension();
                    $fileName = time();
                   // dd($fileName);
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('split-pdf')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/files/files/")."/".$fileName;
                   // dd($thumbnail);

                }

            //dd($thumbnail);

            $pdf = new Fpdi();
            //dd($pdf);
            $pageCount = $pdf->setSourceFile(public_path("files/files/".$fileName));
           //  dd($pageCount);
            $file = pathinfo($fileName, PATHINFO_FILENAME);

            // Split each page into a new PDF
            // $pageCount=10;
            $split_from = 1;
            for ($i = 1; $i <= $pageCount; $i++) {
                $newPdf = new Fpdi();
                $newPdf->addPage();
                $directory = public_path()."/files/files/";
                if($i==$split_from){
                    $newPdf->setSourceFile(public_path("files/files/".$fileName));
                    $newPdf->useTemplate($newPdf->importPage($i));                    
                }

                    $newFilename = sprintf('%s/%s_%s.pdf', $directory, $file, $i);
                    $newPdf->output($newFilename, 'F');                    

            }
        }

         public function image_to_pdf()
    {
        return view('templates.conversion.image_to_pdf');
    }



    public function ppt_to_pdf(Request $request)
    { //dd($request);

      if ($request->hasFile('ppt-pdf')) 
                    {

                    $destinationPath = public_path()."/files/files/";
                    $extension =  $request->file('ppt-pdf')->getClientOriginalExtension();
                    $fileName = time();
                   //dd($fileName);
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                   // dd($fileName);
                    if(!$request->file('ppt-pdf')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/files/files/")."/".$fileName;
                   // dd($thumbnail);

                }
                //dd($thumbnail);


        $converter = new OfficeConverter(public_path('files/files/'.$fileName));
         //dd($converter);
          $time = time();
          dd($time);
        $converter->convertTo(public_path('files/files/'.$time.'.pdf')); //generates pdf file in same directory as test-file.docx
        //$converter->convertTo('output-file.html'); //generates html file in same directory as test-file.docx
  
        //to specify output directory, specify it as the second argument to the constructor
        //$converter = new OfficeConverter('test-file.docx', 'path-to-outdir');
       // $converter->save(public_path('file/files/'.$time.'.pdf'));
    }



}
