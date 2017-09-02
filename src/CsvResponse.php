<?php namespace Cltt;

use Symfony\Component\HttpFoundation\Response;

class CsvResponse extends Response
{
    protected $data;

    protected $filename = 'file.csv';

    public function __construct($data = array(), $status = 200, $headers = array())
    {
        parent::__construct('', $status, $headers);

        $this->headers = $headers;

        $this->setData($data);
    }

    public function setData(array $data)
    {
        $output = fopen('file.csv', 'w') or die("Can't open file");

        fputcsv($output, $this->headers);

        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        fclose($output);

//        rewind($output);
//
//        $this->data = '';
//
//        while ($line = fgets($output)) {
//            $this->data .= $line;
//        }
//
//        $this->data .= fgets($output);

//        return $this->update();
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this->update();
    }

    protected function update()
    {
        $this->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', $this->filename));

        if (!$this->headers->has('Content-Type')) {
            $this->headers->set('Content-Type', 'text/csv');
        }

        return $this->setContent($this->data);
    }
}
