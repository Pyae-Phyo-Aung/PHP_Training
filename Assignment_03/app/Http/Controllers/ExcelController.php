<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class ExcelController extends Controller
{
    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function studentImport()
    {
        return view('students.import');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */

    public function importData(Request $request)
    {
        $this->validate($request, [
            'uploaded_file' => 'required',
        ]);
        $the_file = $request->file('uploaded_file');

        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $row_limit = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range = range(2, $row_limit);
            $column_range = range('F', $column_limit);
            $startcount = 2;
            $data = array();

            foreach ($row_range as $row) {

                $data[] = [
                    'name' => $sheet->getCell('A' . $row)->getValue(),
                    'major_id' => $sheet->getCell('B' . $row)->getValue(),
                    'phone' => $sheet->getCell('C' . $row)->getValue(),
                    'email' => $sheet->getCell('D' . $row)->getValue(),
                    'address' => $sheet->getCell('E' . $row)->getValue(),
                ];
                $startcount++;
            }
            DB::table('students')->insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('Something wrong in uploading data.');
        }
        return back()->withSuccess('File successfully uploaded.');
    }
    /**
     * @param $customer_data
     */
    public function ExportExcel($customer_data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Student_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }
    /**
     *This function loads the customer data from the database then converts it
     * into an Array that will be exported to Excel
     */
    public function exportData()
    {
        $data = DB::table('students')->orderBy('id', 'DESC')->get();
        $data_array[] = array("name", "major_id", "phone", "email", "address");
        foreach ($data as $data_item) {
            $data_array[] = array(
                'name' => $data_item->name,
                'major_id' => $data_item->major,
                'phone' => $data_item->phone,
                'email' => $data_item->email,
                'address' => $data_item->address,
            );
        }
        $this->ExportExcel($data_array);
    }
    
}
