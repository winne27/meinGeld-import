<?php

namespace winne27\mein-geld;

class CreateImportFile {

    private $header = 'Empfängername;Kontonummer;Bankleitzahl;IBAN;BIC;Verwendungszweck;Betrag;Auftragsart;Textschlüssel;TSErgänzung;Kundenreferenz;GläubigerID;MandatsID;Mandatsdatum;Mandatstyp;Ausführungsdatum;Kommentar';
    private $content;
    private $newline = "\n";
    private $line;

    public function __construct()
    {
        $this->content = $this->header . $this->newline;
    }

    public function openTransaction() {
        $this->line = array (
                            "Empfängername" => '',
                            "Kontonummer" => '',
                            "Bankleitzahl" => '',
                            "IBAN" => '',
                            "BIC" => '',
                            "Verwendungszweck" => '',
                            "Betrag" => '',
                            "Auftragsart" => '',
                            "Textschlüssel" => '',
                            "TSErgänzung" => '',
                            "Kundenreferenz" => '',
                            "GläubigerID" => '',
                            "MandatsID" => '',
                            "Mandatsdatum" => '',
                            "Mandatstyp" => '',
                            "Ausführungsdatum" => '',
                            "Kommentar" => ''
                            );
    }

    public function setValue($index, $value) {
        $this->line[$index] = $value;
    }

    public function closeTransaction() {
        $this->content .= implode(';', $this->line) . $this->newline;
    }

    public function writeFile($file) {
        $fp = fopen($file, 'w');
        fwrite($fp, utf8_decode($this->content));
        fclose($fp);
    }
}
