<?php

/**
 * Description of Pdf Model mpdf
 *
 * @author Web Preparations Team
 *
 * @email  webpreparations@gmail.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdf extends CI_Model
{
    // get mobiles list

    function tampil_data()
    {
        return $this->db->get('Mahasiswa');
    }
}
