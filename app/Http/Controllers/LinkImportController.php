<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkImportController extends Controller
{
    /**
     * File to be imported.
     *
     * @var string
     */
    private $csv;

    /**
     * Import contents of csv file into links
     *
     * @return int Number of inserted rows
     */
    public function import()
    {
        // 10 minutes
        set_time_limit(600);

        $testFile = 'import/testData.csv';

        $this->setCsv($testFile);
        $data = $this->csvToArray();

        return $this->insertData($data);
    }

    /**
     * Set full path of csv file if exists
     * @param  $filePath csv file at public location

     * @return string
     */
    public function setCsv($filename)
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \Exception("Csv file does not exists or is not readable.");
        }
        $this->csv = public_path($filename);
    }

    /**
     * Set full path of csv file if exists
     * @param  $delimiter csv file delimiter

     * @return array
     */
    public function csvToArray($delimiter = ',')
    {
        $header = null;
        $data = array();
        if (($handle = fopen($this->csv, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = $this->getHeader($row);
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

    /**
     * Insert data into links
     * @param array Data to be inserted

     * @return int Number of inserted records
     */
    public function insertData($data)
    {
        $inserted = 0;
        foreach ($data as $row) {
            $insert = Link::firstOrCreate($row);
            if ($insert) {
                $inserted++;
            }
        }
        return $inserted;
    }

    /**
     * Get formatted header columns (slugify)
     * @param  array

     * @return array
     */
    private function getHeader($row)
    {
        return array_map(function($column) {
            return str_slug($column, '_');
        }, $row);
    }

}
